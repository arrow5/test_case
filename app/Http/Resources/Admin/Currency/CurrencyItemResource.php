<?php

namespace App\Http\Resources\Admin\Currency;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyItemResource extends JsonResource
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
            "name" => $this->name,
            "shortName" => $this->short_name,
            "nameIso" => $this->name_iso,
            "codeIso" => $this->code_iso,
            "symbolIso" => $this->symbol_iso,
            "active" => $this->active,
            "name1" => $this->name1,
            "name2" => $this->name2,
            "name3" => $this->name3,
        ];
    }
}
