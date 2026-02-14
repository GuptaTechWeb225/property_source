<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status') == 'read' ? 1 : 0;
        $data['title'] = _trans('common.Notifications');
        $keyword = $request->input('keyword');
        $data['notifications'] = Notification::query()
            ->orderBy('is_read', 'ASC')
            ->latest('created_at')
            ->when(!isSuperAdmin(), function ($q){
                $q->where('receiver_id', auth()->id());
            })
            ->when($request->input('status'), function ($q) use ($request, $status) {
                $q->where('is_read', $status);
            })
            ->when($request->input('sorting') == 'newest', function ($q) use ($request) {
                $q->latest('created_at');
            })
            ->when($request->input('sorting') == 'oldest', function ($q) use ($request) {
                $q->oldest('created_at');
            })
            ->when($request->input('keyword'), function ($q) use ($keyword) {
                $q->where('title', 'like', "%$keyword%")
                    ->orWhere('message', 'like', "%$keyword%");
            })
            ->paginate($request->input('limit', 10));
        return view('backend.notification.index')->with($data);
    }

    public function changeStatus(Request $request, $id)
    {
        try {
            $notification = Notification::find($id);
            $notification->update(['is_read' => $request->input('status') != 1]);
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }

    public function delete($id)
    {
        $notification = Notification::find($id);
        if ($notification->delete()) :
            $success[0] = "Deleted Successfully";
            $success[1] = "Success";
            $success[2] = "Deleted";
        else :
            $success[0] = "Something went wrong, please try again.";
            $success[1] = 'error';
            $success[2] = "oops";
        endif;
        return response()->json($success);
    }


    public function allread()
    {
        try {
            Notification::where('is_read', 0)->update(['is_read' => 1]);
            return redirect()->back()->with('success', _trans('common.Notification status changed successfully!'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }

    public function alldelete()
    {
        try {
            Notification::truncate();
            return redirect()->back()->with('success', _trans('common.Notification deleted successfully!'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function selectedItemAction(Request $request)
    {
        try {
            $message = $request->input('status') == 'read' ? 'Status changed' : 'Deleted';

            if ($request->input('status') == 'delete') {
                Notification::whereIn('id', $request->input('notification_ids'))->delete();
            }
            if ($request->input('status') == 'read') {
                Notification::whereIn('id', $request->input('notification_ids'))->update(['is_read' => 1]);
            }
            return redirect()->back()->with('success', _trans("common.Notification $message successfully!"));
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function show($id)
    {
        $data['title'] = _trans('common.Notification');
        $data['notification'] = Notification::find($id);
        $data['notification']->is_read = 1;
        $data['notification']->save();
        return view('backend.notification.show')->with($data);
    }

}
