<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'constructor_id' => $this->constructor_id,
            'vehicle_model' => $this->vehicle_model,
            'color' => $this->color,
            'vin' => $this->vin,
            'in_service' => $this->in_service,
            'updated_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
