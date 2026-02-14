<?php

namespace Modules\Mailbox\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Modules\Mailbox\Entities\Mailbox;
use Illuminate\Contracts\Support\Renderable;
use Modules\Mailbox\Repositories\MailboxRepository;

class MailboxController extends Controller
{
    protected $mailboxRepo;

    public function __construct()
    {
        $this->mailboxRepo = new MailboxRepository;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['title']      = _trans('common.Mailbox');
        $data['mailboxes']  = $this->mailboxRepo->indexData();
        return view('mailbox::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['title'] = _trans('common.New Message');
        return view('mailbox::create', $data);
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
            if ($request->submit_action == "draft") {
                Toastr::success(_trans('response.Mail save as draft'), 'Success');
                return back();
            } else {
                Toastr::success(_trans('response.Mail has been send successfully'), 'Success');
                return redirect()->route('email.box.index');
            }
        } catch (\Throwable $th) {
            Toastr::error(_trans('response.Something went wrong!'), 'Error');
            return redirect()->back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $mailbox    = Mailbox::query()
                    ->where('id', $id)
                    ->first();
        $viewRender = view('mailbox::show', compact('mailbox'))->render();
        return response()->json(array('status' => 1, 'html' => $viewRender));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(Request $request)
    {
        try {
            $this->mailboxRepo->delete($request);
            Toastr::success(_trans('response.Deleted successfully'), 'Success');
            return redirect()->route('mailboxes.index');

        } catch (\Throwable $th) {
            Toastr::error(_trans('response.Something went wrong!'), 'Error');
            return redirect()->back();
        }
    }
}
