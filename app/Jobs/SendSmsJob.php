<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\SMSLog;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;




class SendSmsJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $log;

    /**
     * Create a new job instance.
     *
     * @param array $log
     */
    public function __construct($log)
    {
        $this->log = $log;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $log = $this->log;

        // Twilio credentials
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);

        try {
            // Send SMS
            if (App::environment('production')) {
                $twilio->messages->create(
                    $log['phone'], // Recipient phone number
                    [
                        'from' => env('TWILIO_PHONE_NUMBER'), // Twilio phone number
                        'body' => $log['message'],
                    ]
                );
            }

            // Update the log as sent
            SMSLog::where('id', $log['id'])->update(['is_sent' => true]);
        } catch (\Exception $e) {
            Log::error("Failed to send SMS to {$log['phone']}: {$e->getMessage()}");
        }
    }
}
