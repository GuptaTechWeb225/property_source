<?php

namespace App\Services;

class TransactionService
{
    public function storeTransaction($account_id,$sourceModel, $type, $reference_no = null, $payment_method, $trx_no = null, $amount = 0, $attachment_id = null, $bank_info = null)
    {
       return $sourceModel->transactions()->create([
            'account_id' => $account_id,
            'date' => date('Y-m-d'),
            'type' => $type,
            'reference_no' => $reference_no,
            'payment_method' => $payment_method,
            'trx_no' => $trx_no,
            'amount' => $amount,
            'attachment_id' => $attachment_id,
            'bank_info' => $bank_info,
            'created_by' => auth()->id(),
        ]);
    }
}
