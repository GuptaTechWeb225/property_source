<div class="d-flex flex-column">
    <div class="d-flex align-items-center gap-2 border-b">
        <a href="javascript:void(0)" onclick="hideDetails()">
            <i class="las la-arrow-left fs-4"></i>
        </a>
        <h4 class="text-primary fw-semibold">{{ $mailbox->subject }}</h4>
    </div>
    <hr>
    <div class="d-flex flex-column gap-3" id="emailBody">
        <div class="d-flex align-items-center justify-content-between gap-2">
            @if (count(@$mailbox->mailboxRecipients) > 1)
                <div class="d-flex align-items-center gap-2">
                    @foreach ($mailbox->mailboxRecipients ?? [] as $recipient)
                        <img src="{{ uploaded_asset(@$recipient->emailUser->avatar_id) }}" class="staff-profile-image-small {{ !$loop->first ? 'next-image' : '' }}" data-bs-toggle="tooltip" data-bs-title="{{ @$recipient->emailUser->name . ' (' . @$recipient->email . ')' }}">
                    @endforeach
                </div>
            @else
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ uploaded_asset(@$mailbox->mailboxRecipients[0]->emailUser->avatar_id) }}" class="staff-profile-image-small">
                    <div class="d-flex flex-column">
                        <small><b class="text-dark">{{ @$mailbox->mailboxRecipients[0]->emailUser->name }}</b></small>
                        <small>{{ @$mailbox->mailboxRecipients[0]->email }}</small>
                    </div>
                </div>
            @endif
            <small class="me-2">{{ date('M d, Y', strtotime($mailbox->created_at)) . ' (' . $mailbox->created_at->diffForHumans() . ')' }}</small>
        </div>
        <div>
            <small class="fw-bold">CC: </small> 
            @foreach ($mailbox->mailboxCC ?? [] as $cc)
                <small>{{ $cc->email }}{{ !$loop->last ? ', ' : ' ' }}</small>
            @endforeach
        </div>
        <div>
            <?= $mailbox->message ?>
        </div>
        @if (count($mailbox->mailboxAttachments))
            <p class="fw-semibold border-bottom pb-1 mt-3">Attachment</p>
            <div class="d-flex flex-wrap gap-2 text-capitalize fw-semibold">
                @foreach ($mailbox->mailboxAttachments as $attachment)
                    <small>
                        <a 
                            class="d-flex align-items-center gap-1 bg-light px-2 py-1 rounded" 
                            href="{{ asset($attachment->path) }}" 
                            download=""
                        >
                            <i class="las la-paperclip"></i>
                            {{ _trans('common.attachment') }} {{ $loop->iteration }}
                        </a>
                    </small>
                @endforeach
            </div>
        @endif
    </div>
</div>