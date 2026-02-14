<?php

namespace Modules\Nestkeeper\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class PropertyListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // SELECT `id`, `user_id`, `property_id`, `advertisement_type`, `booking_amount`, `rent_amount`, `rent_type`, `rent_start_date`, `rent_end_date`, `sell_amount`, `sell_start_date`, `negotiable`, `status`, `approval_status`, `approved_by`, `approved_at`, `created_at`, `updated_at` FROM `advertisements` WHERE 1

        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'image'             => apiAssetPath($this->defaultImage->path),
            'deal_type'         => $this->deal_type== 1?  'Rent':'Buy',
            'type'              => $this->type== 1?  'Commercial':'Residential',
            'completion'        => $this->completion==1?'Completed':'Under Construction',
            'total_unit'        => $this->total_unit,
            'total_occupied'    => $this->total_occupied,
            'total_rent'        => $this->total_rent,
            'total_sell'        => $this->total_sell,
            'address'           => $this->location->address,
            'size'              => $this->size,
            'bedroom'           => $this->bedroom,
            'bathroom'          => $this->bathroom,
            'price'             => $this->deal_type == 1 ? $this->advertisement->where('advertisement_type', $this->deal_type)->pluck('rent_amount')->first() : $this->advertisement->where('advertisement_type', $this->deal_type)->pluck('sell_amount')->first(),
            'property_type_id'  => $this->category->id,
            'property_type_name'  => $this->category->name,


            // 'advertisement'     => $this->advertisement->where('advertisement_type',$this->deal_type)->map(function($data){
            //     return [
            //         'id'                => $data->id,
            //         'booking_amount'    => $data->booking_amount,
            //         'rent_amount'       => $data->rent_amount,
            //         'sell_amount'       => $data->sell_amount,
            //         'rent_start_date'   => $data->rent_start_date,
            //         'sell_start_date'   => $data->sell_start_date,

            //     ];.
            // })
        ];
    }
}
