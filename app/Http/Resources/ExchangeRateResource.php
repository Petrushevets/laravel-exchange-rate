<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExchangeRateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'r030' => $this->r030,
            'txt' => $this->txt,
            'rate' => rtrim($this->rate, 0),
            'cc' => $this->cc,
            'exchangedate' => $this->exchangedate->format('d-m-Y'),
        ];
    }
}
