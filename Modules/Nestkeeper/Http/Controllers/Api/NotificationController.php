<?php

namespace Modules\Nestkeeper\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;

class NotificationController extends Controller
{
    use ApiReturnFormatTrait;
    public function index()
    {
        $data['messages'] = 'Notification List';
        $one_hour_ago = date('Y-m-d H:i:s', strtotime('-1 hour'));
        $two_hour_ago = date('Y-m-d H:i:s', strtotime('-2 hour'));
        $three_hour_ago = date('Y-m-d H:i:s', strtotime('-3 hour'));
        $dateTime = date('Y-m-d H:i:s');
        // how many  days and hour ago
        $timeDifference = strtotime($dateTime) - strtotime($one_hour_ago);
        $timeDifference = $timeDifference / 60;
        $timeDifference = round($timeDifference);
        $timeDifference = $timeDifference . ' minutes ago';


        $timeDifference2 = strtotime($dateTime) - strtotime($two_hour_ago);
        $timeDifference2 = $timeDifference2 / 60;
        $timeDifference2 = round($timeDifference2);
        $timeDifference2 = $timeDifference2 . ' minutes ago';

        $timeDifference3 = strtotime($dateTime) - strtotime($three_hour_ago);
        $timeDifference3 = $timeDifference3 / 60;
        $timeDifference3 = round($timeDifference3);
        $timeDifference3 = $timeDifference3 . ' minutes ago';


        $data['items'] = [
            [
                'id' => 1,
                'title' => 'Item delivered',
                'description' => 'This notification is sent to confirm that the user\'s item has been delivered to their address.',
                'created_at' => date('d M, Y h:i A', strtotime($one_hour_ago)),
                'time_difference' => $timeDifference,
            ],
            [
                'id' => 2,
                'title' => 'Successful login',
                'description' => 'This notification is sent to confirm that the user has successfully logged into their account.',
                'created_at' => date('d M, Y h:i A', strtotime($two_hour_ago)),
                'time_difference' => $timeDifference2,
            ],
            [
                'id' => 3,
                'title' => 'Password reset link sent',
                'description' => 'This notification is sent to confirm that the user\'s password reset link has been sent to their email.',
                'created_at' => date('d M, Y h:i A', strtotime($three_hour_ago)),
                'time_difference' => $timeDifference3,
            ]
        ];

        $response = $this->responseWithSuccess($data['messages'], $data, 200);
        // this response create a json file and write the data in it
        return $response;
    }


}


