<?php

namespace Modules\LiveChat\Traits;

use Pusher\Pusher;
use Illuminate\Support\Facades\Log;

trait PusherTrait
{
    function sendMessage($message, $receiver)
    {
        try {
            $app_id          = env('PUSHER_APP_ID');
            $app_key         = env('PUSHER_APP_KEY');
            $app_secret      = env('PUSHER_APP_SECRET');
            $app_cluster     = env('PUSHER_APP_CLUSTER');
            $pusher          = new Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);
            $data['message'] = $message->message;
            $data['image']   = @globalAsset(@$receiver->avatar_id);
            $data['msg']     = encrypt($message->id);
            $pusher->trigger('new-message-' . encrypt($receiver->id), 'my-event', $data);

            return [
                'status'  => true,
                'message' => 'Message sent successfully',
            ];
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return [
                'status'  => false,
                'message' => $th->getMessage(),
            ];
        }
    }
}
