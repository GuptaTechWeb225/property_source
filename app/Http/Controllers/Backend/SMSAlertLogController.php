<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class SMSAlertLogController extends Controller
{
    public function index()
    {
        $data['title'] = _trans('common.SMS Alert Logs');
        return view('backend.sms-alert-logs.index', compact('data'));
    }
}
