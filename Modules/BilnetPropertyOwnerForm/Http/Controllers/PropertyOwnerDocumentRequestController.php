<?php

namespace Modules\BilnetPropertyOwnerForm\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Modules\BilnetPropertyOwnerForm\Entities\TemporaryPropertyOwner;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Modules\BilnetPropertyOwnerForm\Services\OTPService;
use Modules\Mailbox\Entities\Mailbox;

class PropertyOwnerDocumentRequestController extends Controller
{


    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('bilnetpropertyownerform::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('bilnetpropertyownerform::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */



    public function sendDocumentRequest(Request $request)
    {
        try {
            $token = $request->input('token');
            $request_for = $request->input('request_for');
            $subject = "Request for $request_for";

            // Find the owner based on token
            $owner = TemporaryPropertyOwner::where('token', $token)->first();

            if (!$owner) {
                return Response::json([
                    'success' => false,
                    'message' => 'Owner not found.',
                ], 404);
            }

            // Prepare the message content
            $messageContent = "A request for $request_for came from the phone $owner->phone and email $owner->email. Kindly contact the client as soon as possible.";

            // Create mailbox record
            $this->createMailbox($subject, $messageContent, $owner->email);


            $emails = [env('REQUEST_MAIL_1'), env('REQUEST_MAIL_2')];
            $sendToClientMessage = setting('default_reply_for_request');

            Queue::push(new \App\Jobs\SendPropertyOwnerRequest($emails, $messageContent, $subject, $owner->phone, $sendToClientMessage));

            return Response::json([
                'success' => true,
                'message' => 'Request successfully sent and WhatsApp message delivered.',
            ], 200);
        } catch (\Exception $e) {
            return Response::json([
                'success' => false,
                'message' => 'An error occurred while sending the request.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    private function createMailbox($subject, $messageContent, $senderEmail)
    {
        try {
            Mailbox::create([
                'parent_id' => null,
                'subject' => $subject,
                'message' => $messageContent,
                'status' => 'received',
                'sender_email' => $senderEmail,
            ]);
        } catch (Exception $th) {
            Log::error('Failed to create mailbox: ' . $th->getMessage());
        }
    }



    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('bilnetpropertyownerform::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('bilnetpropertyownerform::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
