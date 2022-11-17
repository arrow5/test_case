<?php

namespace App\Http\Resources\Admin\CustomerOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerOrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'clientId' => $this->client_id,
            'statusId' => $this->status_id,
            'brandId' => $this->brand_id,
            'currencyId' => $this->currency_id,
            'deliveryTypeId' => $this->delivery_type_id,
            'paymentTypeId' => $this->payment_type_id,
            'paymentStatusId' => $this->payment_status_id,
            'sum' => $this->sum,
        ];
    }
}
