<?php


namespace App\Http\Controllers;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Messaging\CloudMessage;

class PushNotificationController
{

    protected $notification;
    public function __construct()
    {
        $this->notification = Firebase::messaging();
    }

    public function authUser()
    {
        try {
            if (auth()->check()){
                return response()->json(['id' => auth()->user()->id]);
            }else{
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function setToken(Request $request)
    {
        $token = $request->input('device_token');
        $user  = User::find($request->user_id);
        $user->device_token = $token;
        $user->save();
        return response()->json([
            'message' => 'Successfully Updated Device Token'
        ]);
    }



    public function notification(Request $request)
    {
        NotificationService::pushNotification($request->title, $request->body);
    }
}
