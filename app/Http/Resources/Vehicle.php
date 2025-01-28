<?php

namespace App\Http\Resources;

use App\Models\File as ModelsFile;
use App\Models\VehicleFeature as ModelsVehicleFeature;
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
        $vehicle_features_request = ModelsVehicleFeature::where('vehicle_id', $this->id)->first();
        $vehicle_features = new VehicleFeature($vehicle_features_request);
        $vehicle_images = ModelsFile::where('vehicle_id', $this->id)->get();

        return [
            'id' => $this->id,
            'status' => Status::make($this->status),
            'shape' => VehicleShape::make($this->shape),
            'category' => VehicleCategory::make($this->category),
            'user' => User::make($this->user),
            'model' => $this->model,
            'mark' => $this->mark,
            'color' => $this->color,
            'registration_number' => $this->registration_number,
            'vin_number' => $this->vin_number,
            'manufacture_year' => $this->manufacture_year,
            'fuel_type' => $this->fuel_type,
            'cylinder_capacity' => !empty($this->cylinder_capacity) ? (int) $this->cylinder_capacity : null,
            'engine_power' => !empty($this->engine_power) ? (int) $this->engine_power : null,
            'nb_places' => $this->nb_places,
            'vehicle_features' => $vehicle_features,
            'vehicle_images' => $vehicle_images,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by
        ];
    }
}
