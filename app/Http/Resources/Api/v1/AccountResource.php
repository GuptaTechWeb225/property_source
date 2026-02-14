<?php


namespace App\Http\Resources\Api\v1;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AccountResource extends ResourceCollection
{

    public function toArray($request)
    {
        return $this->collection->map(function ($account) {
            return [
                'id' => $account->id,
                'name' => $account->name,
                'balance' => $account->balance,
                'account_no' => $account->account_no,
            ];
        });
    }
}
