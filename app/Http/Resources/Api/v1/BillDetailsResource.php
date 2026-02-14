<?php


namespace App\Http\Resources\Api\v1;


use Illuminate\Http\Resources\Json\JsonResource;

class BillDetailsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
          'id' => @$this->id,
          'property' => @$this->property->name,
          'tenant' => @$this->tenant->name,
          'due_date' => date('Y-m-d',strtotime(@$this->orderDetail->end_date."-10 day")),
          'amount' => @$this->orderDetail->total_amount,
        ];
    }
}
