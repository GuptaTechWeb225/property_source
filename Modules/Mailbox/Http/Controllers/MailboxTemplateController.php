<?php

namespace Modules\Mailbox\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\MailboxTemplateRequest;
use Modules\Mailbox\Entities\MailboxTemplate;
use App\Http\Requests\MailboxTemplateRequestUpdate;
use App\Helpers\CoreApp\Traits\ApiReturnFormatTrait;

class MailboxTemplateController extends Controller
{
    use ApiReturnFormatTrait;

    public function index(Request $request)
    {
        $data['title'] = _trans('common.Template');
        $data['no_data'] = _trans('common.No data found');
        $data['items'] = MailboxTemplate::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $searchTerm = $request->input('search');
                $query->where(function ($subQuery) use ($searchTerm) {
                    $subQuery->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%');
                });
            })
            ->get()
            ->toArray();
        return view('mailbox::template.index', $data);
    }

    public function create()
    {
        $data['title'] = _trans('common.Template');
        $data['buttonText'] =  _trans('common.Save');
        $data['item'] =  new MailboxTemplate();
        return view('mailbox::template.create', $data);
    }

    public function store(MailboxTemplateRequest $request)
    {
        $data = $request->all();
        try {
            $newItem = new MailboxTemplate();
            $newItem->title = $data['title'];
            $newItem->description = @$data['description'];
            $newItem->is_public = @$data['is_public'] && $data['is_public'] = "on" ? 1 : 0;
            $newItem->save();
            Toastr::success(_trans('response.Templated has been saved successfully'), 'Success');
            return redirect('mailbox/template');
        } catch (Exception $th) {
            
            Log::info($th);
            Toastr::success(_trans('response.Something error'), 'Error');
            return back();
        }
    }

    public function update(MailboxTemplateRequestUpdate $request, $id)
    {
        $data = $request->all();
        try {
            $newItem = MailboxTemplate::find($id);
            $newItem->title = $data['title'];
            $newItem->description = @$data['description'];
            $newItem->update();
            Toastr::success(_trans('response.Templated has been saved successfully'), 'Success');
            return redirect('mailbox/template');
        } catch (Exception $th) {
            Log::info($th);
            Toastr::success(_trans('response.Something error'), 'Error');
            return back();
        }
    }
    public function edit($id)
    {
        $data['title'] = _trans('common.Edit');
        $data['buttonText'] = _trans('common.Update');
        $data['item'] = MailboxTemplate::find($id);
        return view('mailbox::template.edit', $data);
    }

    public function delete($document_id)
    {
        $record = MailboxTemplate::find($document_id);
        if (!$record) {
            return response()->json(['success' => false], 404);
        }
        $record->delete();
        return response()->json(['success' => true]);
    }
}
