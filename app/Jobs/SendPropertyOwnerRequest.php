<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class SendPropertyOwnerRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $emails, $messageContent, $subject, $clientPhone, $sendToClientMessage;

    /**
     * Create a new job instance.
     *
     * @param array $emails
     * @param string $messageContent
     * @param string $subject
     * @param string $clientPhone
     * @param string $sendToClientMessage
     */
    public function __construct($emails, $messageContent, $subject, $clientPhone, $sendToClientMessage)
    {
        $this->emails = $emails;
        $this->messageContent = $messageContent;
        $this->subject = $subject;
        $this->clientPhone = $clientPhone;
        $this->sendToClientMessage = $sendToClientMessage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            // Send email notifications
            $this->sendEmailNotifications($this->emails, $this->messageContent, $this->subject);

            // Check environment before sending SMS and WhatsApp messages
            if (App::environment('production')) {
                $this->sendWhatsAppMessage($this->messageContent);
                $this->sendSms($this->clientPhone, $this->sendToClientMessage);
            }

            Log::info("Successfully notified property owner request.");
        } catch (Exception $e) {
            Log::error("Failed to notify property owner request: " . $e->getMessage());
        }
    }

    /**
     * Send SMS using Twilio.
     *
     * @param string $phoneNumber
     * @param string $message
     * @return void
     */
    private function sendSms($phoneNumber, $message)
    {
        try {
            $twilio = $this->getTwilioClient();
            $twilio->messages->create(
                $phoneNumber,
                [
                    'from' => env('TWILIO_PHONE_NUMBER'),
                    'body' => $message,
                ]
            );

            Log::info("SMS sent to $phoneNumber.");
        } catch (Exception $e) {
            Log::error("Failed to send SMS to $phoneNumber: " . $e->getMessage());
        }
    }

    /**
     * Send WhatsApp message using Twilio.
     *
     * @param string $messageContent
     * @return void
     */
    private function sendWhatsAppMessage($messageContent)
    {
        try {
            $twilio = $this->getTwilioClient();
            $twilio->messages->create(
                env('TWILIO_WHATSAPP_NUMBER_TO'),
                [
                    'from' => env('TWILIO_WHATSAPP_NUMBER_FROM'),
                    'body' => $messageContent,
                ]
            );

            Log::info("WhatsApp message sent.");
        } catch (Exception $e) {
            Log::error("Failed to send WhatsApp message: " . $e->getMessage());
        }
    }

    /**
     * Send email notifications.
     *
     * @param array $emails
     * @param string $messageContent
     * @param string $subject
     * @return void
     */
    private function sendEmailNotifications($emails, $messageContent, $subject)
    {
        foreach ($emails as $email) {
            try {
                Mail::raw(
                    $messageContent,
                    function ($mail) use ($email, $subject) {
                        $mail->to($email)->subject($subject);
                    }
                );

                Log::info("Email sent to $email.");
            } catch (Exception $e) {
                Log::error("Failed to send email to $email: " . $e->getMessage());
            }
        }
    }

    /**
     * Get an instance of the Twilio Client.
     *
     * @return Client
     */
    private function getTwilioClient()
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');

        if (!$sid || !$token) {
            throw new Exception("Twilio credentials are not set.");
        }

        return new Client($sid, $token);
    }
}
