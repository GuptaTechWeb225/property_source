<?php

namespace App\Console\Commands;

use App\Models\DuePayment;
use App\Traits\SendMessage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TenantRentExpirationNotice extends Command
{

    use SendMessage;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rent:notice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rent Expiration Notice On Every Months';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $sms_template = Setting('sms_body_content');
            $last_date = Setting('last_payment_day') ? Setting('last_payment_day') : 10 ;
            $fine = Setting('fine_percentage') ? Setting('fine_percentage') : 0 ;
            $due_payments = DuePayment::with(['property:id,name','tenant:id,name,phone'])->where('payment_status','due')->get();
            foreach($due_payments as $payment){
                if($payment->due_amount > 0){
                    $data = [
                        'name' => @$payment->tenant->name,
                        'property_name' => @$payment->property->name,
                        'due_amount' => priceFormat($payment->due_amount),
                        'expire_date' => Carbon::create(date('Y'), date('m'), ($last_date))->format('F j, Y'),
                        'fine' => priceFormat(($payment->due_amount * $fine) / 100 )
                    ];

                    $message_body = str_replace('[name]', @$data['name'], $sms_template);
                    $message_body = str_replace('[property_name]', @$data['property_name'], $message_body);
                    $message_body = str_replace('[due_amount]', @$data['due_amount'], $message_body);
                    $message_body = str_replace('[expire_date]', @$data['expire_date'], $message_body);
                    $message_body = str_replace('[fine]', @$data['fine'], $message_body);
                }

                if(isset($payment->tenant->phone) && $message_body){
                    $this->sendMessage($message_body, $payment->tenant->phone);
                }
            }

        return Command::SUCCESS;

        } catch (\Throwable $th) {
            Log::error('Sms Sending cron Job Error:: '.$th->getMessage());
        }
    }
}
