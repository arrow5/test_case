<?php

namespace App\Http\Resources\Admin\CustomerOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerOrderResource extends JsonResource
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
            'client' => $this->client->fullName,
            'status' => $this->status->name,
            'deliveryType' => $this->deliveryType->name,
            'paymentType' => $this->paymentType->name,
            'sum' => $this->sum,
        ];
    }
}
