<?php

namespace Modules\Marsland\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Marsland\Entities\Contact;

class ContactController extends Controller
{

    public function contactUs()
    {
        return view('marsland::pages.contact_us');
    }
    public function contactStore(Request $request)
    {
        $request->validate([
            'reason' => 'required' ,
            'f_name' => 'required' ,
            'l_name' => 'required' ,
            'email' => 'required' ,
            'phone_number' => 'required' ,
            'message' => 'required' ,
        ]);
        try {
            $data = $request->except('_token');
            Contact::create($data);
            return redirect()->back()->with('success', _trans('alert.Contact successfully stored!'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }
}
