<?php

namespace App\Http\Resources\Admin\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
