<?php

namespace Modules\Mailbox\Http\Controllers;

use Exception;
use Throwable;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\ClientContract;
use Illuminate\Support\Carbon;
use App\Models\Management\Notes;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Mailbox\Entities\Mailbox;
use Modules\Sale\Entities\SalePayment;
use Illuminate\Support\Facades\Storage;
use Modules\Sale\Entities\SaleCustomer;
use App\Models\Hrm\Support\SupportTicket;
use App\Models\Management\ProjectPayment;
use Modules\Booking\Entities\BookingOrder;
use Modules\Mailbox\Exports\MailboxExport;
use Illuminate\Contracts\Support\Renderable;
use Modules\Mailbox\Repositories\MailboxRepository;
use App\Helpers\CoreApp\Traits\ApiReturnFormatTrait;

class NewMailboxController extends Controller
{
    protected $mailboxRepo;
    use ApiReturnFormatTrait;

    public function __construct()
    {
        $this->mailboxRepo = new MailboxRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index(Request $request)
    {
        $data['title'] = _trans('common.Mailbox');

        $data['items'] = Mailbox::query()
            ->with(['createdByUser', 'childrens', 'parent', 'mailboxRecipients' => function ($query) {
                $query->where('email', auth()->user()->email);
            }])
            ->withCount('childrens')
            ->where('parent_id', null)
            ->when($request->filled('status'), function ($query) use ($request) {
                switch ($request->status) {
                    case 'draft':
                        $query->where('status', 'draft');
                        break;
                    case 'trash':
                        $query->onlyTrashed();
                        break;
                    case 'sent':
                        $query->where('status', 'sent');
                        break;
                    case 'important':
                        $query->where('is_important', 1);
                        break;
                    case 'starred':
                        $query->where('is_starred', 1);
                        break;
                }
            }, function ($query) {
                // Default case: Only show received emails when no status is provided
                $query->where('status', 'received');
            })
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('subject', 'like', '%' . $request->search . '%');
            })
            ->orderBy('created_at', 'desc') // Order by the latest first
            ->paginate(20);

        return view('mailbox::box.index', $data);
    }


    public function print()
    {
        $data['items'] = Mailbox::query()
            ->with(['childrens', 'parent'])
            ->with('createdByUser')
            ->withCount('childrens')
            ->where('parent_id', null)
            ->get();
        return view('mailbox::box.print', $data);
    }
    public function liveSearch(Request $request)
    {
        $filterStatus = $request->input('filter_status');
        $search = $request->input('search');

        $results = Mailbox::query()
            ->with('createdByUser')
            ->whereNot('status', 'trash')
            ->where('created_by', auth()->user()->id)

            ->when($search, function ($query) use ($search) {
                return $query->where('subject', 'like', '%' . $search . '%');
            })
            ->when($filterStatus, function ($query) use ($filterStatus) {
                switch ($filterStatus) {
                    case 'draft':
                        return $query->where('status', 'draft');
                    case 'sent':
                        return $query->where(function ($query) {
                            $query->where('status', 'sent')
                                ->where('parent_id', NULL);
                        });
                    case 'starred':
                        return $query->where(function ($query) {
                            $query->where('is_starred', 1);
                        });
                    case 'important':
                        return $query->where(function ($query) {
                            $query->where('is_important', 1);
                        });
                    case 'trash':
                        return $query->where('status', 'trash');
                    default:
                        return $query;
                }
            })
            ->get();
        return response()->json($results);
    }

    public function show($id)
    {
        $data['title']      = _trans('common.Details');
        $data['mailbox']    = Mailbox::with([
            'mailboxRecipients',
            'parent',
            'mailboxCC',
            'mailboxAttachments',
            'childrens' => function ($query) {
                $query->with('mailboxRecipients', 'mailboxCC');
            }
        ])
            ->where('id', $id)
            ->first();
        $data['users']      = User::where('status', 1)->pluck('name', 'email');

        if ($data['mailbox']) {
            $data['mailbox']->is_read = 1;
            $data['mailbox']->save();
        }

        return view('mailbox::box.show', $data);
    }

    public function trashDataIndex(Request $request)
    {
        $search = $request->input('search');
        $paginate = $request->paginationData;
        $data['title']      = _trans('common.Mailbox');
        $data['items'] = Mailbox::with(['mailboxRecipients' => function ($q) {
            $q->with('emailUser:id,name,email,avatar_id')->select('mailbox_id', 'email');
        }])
            ->where('status', '=', 'trash')
            ->when($search, function ($query) use ($search) {
                return $query->where('subject', 'like', '%' . $search . '%');
            })
            ->paginate($paginate);
        return view('mailbox::box.trash', $data);
    }


    public function manageImportant(Request $request)
    {
        if ($request->ajax()) {
            $item = Mailbox::find($request->item_id);

            if (!$item) {
                return response()->json(['status' => 0, 'message' => _trans('common.Item not found!')]);
            }

            try {
                $is_important = $request->item_type === "important" ? 1 : 0;
                $item->update(['is_important' => $is_important]);

                $message = $is_important ? _trans('common.Important set successfully') : _trans('common.Important removed successfully');
                return response()->json(['status' => 1, 'message' => $message]);
            } catch (Exception $ex) {
                return response()->json(['status' => 0, 'message' => _trans('common.Something went wrong!')]);
            }
        }
    }


    public function manageStarred(Request $request)
    {
        if ($request->ajax()) {
            $item = Mailbox::find($request->item_id);

            if (!$item) {
                return response()->json(['status' => 0, 'message' => _trans('common.Item not found!')]);
            }

            try {
                $is_starred = $request->item_type === "starred" ? 1 : 0;
                $item->update(['is_starred' => $is_starred]);

                $message = $is_starred ? _trans('common.Starred successfully') : _trans('common.Star removed successfully');
                return response()->json(['status' => 1, 'message' => $message]);
            } catch (Exception $ex) {
                return response()->json(['status' => 0, 'message' => _trans('common.Something went wrong!')]);
            }
        }
    }

    public function loadEmailTools($data_ids)
    {
        $data['ids'] = explode(',', $data_ids);
        return view('mailbox::mail.tools', $data);
    }

    public function create()
    {
        $data['title'] = _trans('common.Compose Mail');
        $data['users'] = User::where('status', 1)->pluck('name', 'email');

        return view('mailbox::box.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $this->mailboxRepo->store($request);
            return redirect()->route('email.box.index')->with('success', _trans('alert.Mail has been send successfully'));
        } catch (\Throwable $th) {
            return redirect()->route('email.box.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }

    public function exportToExcel(Request $request)
    {
        $currentDate = date('Y-m-d H:i:s');
        $data = Mailbox::where('sourceable_type', $request->input('sourceable_type'))->get();
        if ($data->isEmpty()) {
            Toastr::error(_trans('response.No data found!'), 'Error');
            return back();
        }
        return Excel::download(new MailboxExport($data), Carbon::parse($currentDate)->format('Y-m-d H:i:s') . '_mailbox.csv');
    }

    public function filterMailbox(Request $request)
    {
        $recipient_type = $request->input('recipient_type');
        $results = Mailbox::where('recipient_type', $recipient_type)->get();
        return response()->json($results);
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        try {
            $item = Mailbox::find($id);
            $item->childrens()->delete();
            $item->delete();
            return response()->json(['success' => true]);
        } catch (Exception $th) {
            Log::info($th);
            return response()->json(['success' => false]);
        }
    }

    public function trashDataRemove($id)
    {
        try {
            $mailbox = Mailbox::onlyTrashed()->findOrFail($id);
            @$mailbox->mailboxRecipients()->delete();
            @$mailbox->mailboxCC()->delete();
            if ($mailbox->childrens->isNotEmpty()) {
                $mailbox->childrens()->forceDelete();
            }
            $mailbox->forceDelete();
            Toastr::success(_trans('response.Deleted successfully'), 'Success');
            return redirect()->route('mailboxes.index');
        } catch (Throwable $th) {
            Log::info($th);
            Toastr::error(_trans('response.Something went wrong!'), 'Error');
            return redirect()->back();
        }
    }


    public function groupUpdateStarred(Request $request, $isStarred = true)
    {
        $mailbox_ids = explode(',', $request->ids);

        try {
            Mailbox::whereIn('id', $mailbox_ids)->update(['is_starred' => $isStarred ? 1 : 0]);

            $message = $isStarred ? _trans('common.Starred successfully') : _trans('common.Star removed successfully');
            return response()->json(['status' => 1, 'message' => $message]);
        } catch (Exception $ex) {
            return response()->json(['status' => 0, 'message' => _trans('common.Something went wrong!')]);
        }
    }

    public function groupStarred(Request $request)
    {
        return $this->groupUpdateStarred($request, true);
    }

    public function groupNotStarred(Request $request)
    {
        return $this->groupUpdateStarred($request, false);
    }

    public function groupUpdateBookmarked(Request $request, $isBookmarked = true)
    {
        $mailbox_ids = explode(',', $request->ids);

        try {
            Mailbox::whereIn('id', $mailbox_ids)->update(['is_important' => $isBookmarked ? 1 : 0]);

            $message = $isBookmarked ? _trans('common.Important set successfully') : _trans('common.Important removed successfully');
            return response()->json(['status' => 1, 'message' => $message]);
        } catch (Exception $ex) {
            return response()->json(['status' => 0, 'message' => _trans('common.Something went wrong!')]);
        }
    }

    public function groupBookmarked(Request $request)
    {
        return $this->groupUpdateBookmarked($request, true);
    }

    public function groupNotBookmarked(Request $request)
    {
        return $this->groupUpdateBookmarked($request, false);
    }

    public function groupUpdateRead(Request $request, $isRead = true)
    {
        $mailbox_ids = explode(',', $request->ids);

        try {
            Mailbox::whereIn('id', $mailbox_ids)->update(['is_read' => $isRead ? 1 : 0]);

            $message = $isRead ? _trans('common.Mails mark as read successfully') : _trans('common.Mails mark as unread successfully');
            return response()->json(['status' => 1, 'message' => $message]);
        } catch (Exception $ex) {
            return response()->json(['status' => 0, 'message' => _trans('common.Something went wrong!')]);
        }
    }
    public function groupRead(Request $request)
    {
        return $this->groupUpdateRead($request, true);
    }

    public function groupNotRead(Request $request)
    {
        return $this->groupUpdateRead($request, false);
    }

    public function groupTrash(Request $request)
    {
        $mailbox_ids = explode(',', $request->ids);

        try {
            $mailboxes = Mailbox::whereIn('id', $mailbox_ids)->get();

            foreach ($mailboxes as $mailbox) {
                $mailbox->childrens()->delete();
                $mailbox->delete();
            }

            return response()->json(['status' => 1, 'message' => _trans('common.Mails has been deleted successfully')]);
        } catch (Exception $ex) {
            return response()->json(['status' => 0, 'message' => _trans('common.Something went wrong!')]);
        }
    }

    public function duplicateFileTest()
    {
        $originalFilePath = 'shared_documents/duplicate_file.jpg';
        $newFilePath = 'shared_documents/new_duplicate_file.jpg';

        if (Storage::disk('local')->exists($originalFilePath)) {
            // Duplicate the file
            Storage::copy($originalFilePath, $newFilePath);
            return back()->with('success', 'File duplicated successfully.');
        } else {
            return back()->with('error', 'Original file not found.');
        }
    }

    private function fetchRecords($model, $columns)
    {
        if (request()->ajax()) {
            $records = $model::get($columns);
            return response()->json($records);
        }
    }

    public function draftReply($id)
    {
        $data['title']      = _trans('common.Draft Mail');
        $data['mailbox']    = Mailbox::find($id);
        $data['users']      = User::where('status', 1)->pluck('name', 'email');

        return view('mailbox::box.draft', $data);
    }
}
