<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;

class NotificationService
{

    public static function notify($sender, $receiver, $title, $message)
    {

        try {
            Notification::create([
                'title' => $title,
                'message' => $message,
                'sender_id' => $sender,
                'receiver_id' => $receiver,
                'is_read' => false,
                'read_at' => now(),
                'created_by' => \auth()->id()
            ]);
            self::pushNotification($title, $message, $receiver);

        } catch (\Exception $th) {
            return false;
        }
    }


    public static  function pushNotification($title, $message, $reciever)
    {
        $FcmToken = Auth::user()->device_token;

        if (!empty($reciever)){
            $FcmToken  = User::find($reciever)->device_token;
        }

        if (!empty($FcmToken)){
            $message = CloudMessage::fromArray([
                'token' => $FcmToken,
                'notification' => [
                    'title' => $title,
                    'body' => $message
                ],
            ]);

            Firebase::messaging()->send($message);
        }
    }
}
