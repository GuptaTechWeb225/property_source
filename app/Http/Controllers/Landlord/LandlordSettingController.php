<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Traits\CommonHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandlordSettingController extends Controller
{

    use CommonHelperTrait;

    public function updateProfile(Request $request)
    {
        $data['title'] = 'Settings';
        $data['user'] = Auth::user();

        if ($request->method() == 'POST') {
            $this->validate($request, [
                'name' =>'required',
                'email' =>'required|email',
                'phone' =>'required',
                'address' =>'required',
            ]);

            $user = auth()->user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            if ($request->hasFile('image')) {
                $user->image_id = $this->UploadImageUpdate($request->image, 'backend/uploads/users', $user->image_id);
            }
            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully');
        }
        return view('landlord.setting')->with($data);
    }
}
