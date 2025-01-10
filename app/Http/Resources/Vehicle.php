<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class Vehicle extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'status' => Status::make($this->status),
            'shape' => VehicleShape::make($this->shape),
            'category' => VehicleCategory::make($this->category),
            'model' => $this->model,
            'mark' => $this->mark,
            'color' => $this->color,
            'registration_number' => $this->registration_number,
            'regis_number_expiration' => $this->regis_number_expiration,
            'vin_number' => $this->vin_number,
            'manufacture_year' => $this->manufacture_year,
            'fuel_type' => $this->fuel_type,
            'cylinder_capacity' => $this->cylinder_capacity,
            'engine_power' => $this->engine_power,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by
        ];
    }
}
