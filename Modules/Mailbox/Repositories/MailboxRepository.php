<?php

namespace Modules\Mailbox\Repositories;

use Illuminate\Support\Str;
use App\Models\Advertisement;
use App\Models\Property\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Modules\Mailbox\Jobs\MailboxJob;
use Modules\Mailbox\Entities\Mailbox;
use Modules\Mailbox\Mail\MailboxMail;
use Modules\Mailbox\Entities\MailboxCC;
use App\Helpers\CoreApp\Traits\FileHandler;
use Modules\Mailbox\Entities\MailboxRecipient;
use Modules\Mailbox\Entities\MailboxAttachment;

class MailboxRepository
{
    public $mailbox;

    use FileHandler;

    public function indexData()
    {
        return  Mailbox::query()
            ->with(['mailboxRecipients' => function ($q) {
                $q->with('emailUser:id,name,email,avatar_id')->select('mailbox_id', 'email');
            }])
            ->latest('id')
            ->paginate(10);
    }

    public function store($request)
    {

        DB::transaction(function () use ($request) {

            if ($request->reply == "reply") {
                $parentMailbox = Mailbox::with(['mailboxRecipients', 'mailboxCC'])->find($request->mail_box_id);

                $mailbox = Mailbox::create([
                    'subject'       => $parentMailbox->subject,
                    'message'       => $request->message,
                    'status'        => $request->submit_action,
                    'created_by'    => auth()->id(),
                    'parent_id'     => @$parentMailbox->id,
                ]);



                if ($parentMailbox->status != 'received' && empty($parentMailbox->sender_email)) {
                    Mailbox::where('id', $request->mail_box_id)->update(['is_read' => 0]);
                }


                $recipients = [];
                $cc = [];

                if ($parentMailbox->status == 'received' && !empty($parentMailbox->sender_email)) {
                    array_push($recipients, $parentMailbox->sender_email);
                }

                foreach (@$parentMailbox->mailboxRecipients ?? [] as $recipient) {
                    $recipients[] = $recipient->email;
                    MailboxRecipient::create([
                        'email' => @$recipient->email ?? $parentMailbox->sender_email,
                        'mailbox_id' => $mailbox->id
                    ]);
                }

                foreach (@$parentMailbox->mailboxCC ?? [] as $ccItem) {
                    $cc[] = $ccItem->email;
                    MailboxCC::create([
                        'email' => $ccItem->email,
                        'mailbox_id' => $request->mail_box_id,
                    ]);
                }

                foreach (@$request->attachments ?? [] as $attachment) {
                    MailboxAttachment::create([
                        'path' => $this->uploadMailboxAttachment($attachment, 'mailbox/attachments'),
                        'mailbox_id' => $mailbox->id
                    ]);
                }

                if ($request->submit_action == 'sent') {
                    $data = $request->only(['message']);
                    $data['subject'] = $parentMailbox->subject;
                    $data['recipients'] = $recipients;
                    $data['cc'] = $cc;

                    if (@$this->mailbox->mailboxAttachments != null) {
                        $data['attachment_paths'] = count(@$this->mailbox->mailboxAttachments) ? @$this->mailbox->mailboxAttachments->pluck('path')->toArray() : [];
                    }

                    Mail::to($recipients)->cc($cc)->send(new MailboxMail($data));
                }
            } else {
                DB::transaction(function () use ($request) {
                    $this->mailbox      = Mailbox::create([
                        'subject'       => $request->subject,
                        'message'       => $request->message,
                        'status'        => 'sent',
                        'created_by'    => auth()->id(),
                    ]);

                    $this->storeMailboxRecipients($request);
                    if ($request->input('cc')) {
                        $this->storeMailboxCC($request);
                    }
                    $this->storeMailboxAttachments($request);
                    $data = $request->only(['recipients', 'cc', 'subject', 'message', 'attachments', 'attachment_paths']);
                    $data['attachment_paths'] = count(@$this->mailbox->mailboxAttachments) ? @$this->mailbox->mailboxAttachments->pluck('path')->toArray() : [];

                    Mail::to($data['recipients'])->cc($data['cc'] ?? [])->send(new MailboxMail($data));
                });
            }
        });
    }

    public function storeMailboxRecipients($request)
    {
        foreach ($request->recipients ?? [] as $email) {
            $this->mailbox->mailboxRecipients()->create([
                'email' => $email
            ]);
        }
    }

    public function storeMailboxCC($request)
    {
        foreach ($request->cc ?? [] as $email) {
            $this->mailbox->mailboxCC()->create([
                'email' => $email
            ]);
        }
    }

    public function storeMailboxAttachments($request)
    {
        foreach ($request->attachments ?? [] as $attachment) {
            $this->mailbox->mailboxAttachments()->create([
                'path' => $this->uploadMailboxAttachment($attachment, 'mailbox/attachments')
            ]);
        }
    }

    public function delete($request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->mailbox_ids ?? [] as $id) {
                $mailbox = Mailbox::find($id);
                $mailbox->mailboxRecipients()->delete();
                $mailbox->mailboxCC()->delete();
                $this->deleteMailboxAttachments($mailbox->mailboxAttachments);
                $mailbox->delete();
            }
        });
    }

    protected function deleteMailboxAttachments($attachments)
    {
        foreach ($attachments ?? [] as $attachment) {
            $this->deleteFile($attachment->path);
            $attachment->delete();
        }
    }
}
