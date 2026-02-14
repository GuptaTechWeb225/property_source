<?php

namespace App\Services;

class DuePaymentService
{

    public function addDuePayment($property_id, $sourceModel, $tenant_id, $landlord_id, $amount, $paid_amount, $due_amount, $payment_status = 'due')
    {
        try {
            return $sourceModel->duePayment()->create([
                'property_id' => $property_id,
                'tenant_id' => $tenant_id,
                'landlord_id' => $landlord_id ?? 1,
                'amount' => $amount,
                'paid_amount' => $paid_amount,
                'due_amount' => $due_amount,
                'payment_status' => $payment_status,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
            ]);
        }catch (\Exception $exception){
            throw $exception;
        }
    }
}
