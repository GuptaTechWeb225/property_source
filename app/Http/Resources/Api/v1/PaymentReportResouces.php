<?php


namespace App\Http\Resources\Api\v1;


use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentReportResouces extends ResourceCollection
{
    public function toArray($request)
    {
        $current_page = $this->currentPage();
        $total_pages = $this->lastPage();
        $base_url = \request()->url();

        return [
            'list' => $this->collection->map(function ($data) {
                return [
                    'id' => $data->id,
                    'invoice_no' => $data->invoice_no,
                    'date' => $data->date,
                    'property' => $data->orderDetail->property->name,
                    'tenant' => $data->orderDetail->order->tenant->name,
                    'trx_no' => $data->trx_no,
                    'payment_method' => $data->payment_method,
                    'amount' => priceFormat($data->amount),
                ];
            }),
            'links' => [
                "first" => $base_url . "?page=1",
                "last" => $base_url . "?page=" . $total_pages,
                "prev" => $current_page > 1 ? $base_url . "?page=" . ($current_page - 1) : null,
                "next" => $current_page < $total_pages ? $base_url . "?page=" . ($current_page + 1) : null,
            ],
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
            ],
        ];
    }
}
