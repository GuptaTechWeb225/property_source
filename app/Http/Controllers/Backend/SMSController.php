<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SMSLog;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Modules\BilnetPropertyOwnerForm\Services\OTPService;
use Yoeunes\Toastr\Facades\Toastr;

class SMSController extends Controller
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }


    public function index()
    {
        $data['title'] = _trans('common.SMS Logs');

        $data['items'] = SMSLog::query()
            ->orderBy('created_at', 'desc') // Order by the latest first
            ->paginate(20);

        return view('backend.sms.index', $data);
    }

    public function create()
    {
        $data['title'] = _trans('common.Send SMS');
        $data['users'] = User::where('status', 1)
            ->whereNotNull('phone')
            ->pluck('name', 'phone');


        return view('backend.sms.create', $data);
    }
    public function send(Request $request)
    {
        try {
            // Validate the incoming request
            $validated = $request->validate([
                'message' => 'required|string',
                'recipients' => 'required|array',
                'recipients.*' => 'required|string|regex:/^\+?[1-9]\d{1,14}$/', // Validate phone numbers
            ]);

            $message = $validated['message'];
            $recipients = $validated['recipients'];
            $currentUser = Auth::id();

            $smsLogs = [];

            foreach ($recipients as $phone) {
                $user = User::where('phone', $phone)->first();

                $smsLogs[] = [
                    'name' => $user ? $user->name : $phone,
                    'phone' => $phone,
                    'message' => $message,
                    'is_sent' => false,
                    'send_to' => $user ? $user->id : null,
                    'send_by' => $currentUser,
                ];
            }

            // Insert logs into the database
            SMSLog::insert($smsLogs);
            $insertedLogs = SMSLog::whereIn('phone', array_column($smsLogs, 'phone'))->get();

            // Dispatch a job to process the SMS sending
            foreach ($insertedLogs as $log) {
                Queue::push(new \App\Jobs\SendSmsJob($log));
            }

            Toastr::success('Messages are being processed.');
            return redirect()->route('sms.index');
        } catch (Exception $th) {
            Toastr::error('Something went wrong!');
            Log::error($th->getMessage());
            return redirect()->route('sms.create');
        }
    }
}
