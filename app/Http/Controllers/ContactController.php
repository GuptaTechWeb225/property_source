<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;

class ContactController extends Controller
{
    public function contact()
    {
        $data['title']       = _trans('common.Contact');
        $data['information'] = Setting::pluck('value', 'name')->toArray();


        return view('frontend.contact', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = _trans('common.get_in_touch');
        $data['contacts'] = Contact::select('id', 'reason', 'f_name', 'l_name', 'email', 'status', 'created_at')->get();
        return view('backend.contacts.index', compact('data'));
    }


    public function view($id)
    {
        $data['title'] = "Read Message";
        $data['contact'] = Contact::where('id', $id)->first();
        $data['contact']->status = 1;
        $data['contact']->save();

        return view('backend.contacts.view', compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        try {
            $ContactStore                      = new Contact;
            $ContactStore->reason              = $request->reason;
            $ContactStore->f_name              = $request->f_name;
            $ContactStore->l_name              = $request->l_name;;
            $ContactStore->email               = $request->email;
            $ContactStore->phone_number        = $request->phone_number;
            $ContactStore->order_no            = $request->order_no;
            $ContactStore->message             = $request->message;
            $ContactStore->save();

            return redirect()->back();
        } catch (\Throwable $th) {
            return false;
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        try {
            // Delete the contact
            $contact = contact::where('id', $id);
            $contact->delete();

            // Return success response
            return response()->json([
                'message' => 'Deleted successfully.',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            // Return error response
            return response()->json([
                'message' => 'Something went wrong, please try again.',
                'status' => 'error',
            ]);
        }
    }
}
