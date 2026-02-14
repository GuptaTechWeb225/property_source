<?php

namespace App\Traits;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

trait SendMessage
{
     function sendMessage($message, $recipients)
    {
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $twilio = new Client($sid, $token);

        return $twilio->messages
            ->create($recipients, // to
                [
                    "body" => $message,
                    "from" => $twilio_number
                ]
            );
    }
}
