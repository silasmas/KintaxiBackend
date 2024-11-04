<?php

namespace App\Http\Resources;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class Ride extends JsonResource
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
            'ride_status' => $this->ride_status,
            'vehicle_category' => VehicleCategory::make($this->vehicle_category)->toArray($request),
            'vehicle' => Vehicle::make($this->vehicle)->toArray($request),
            'passenger' => !empty($this->passenger_id) ? ModelsUser::where('id', $this->passenger_id)->toArray($request) : null,
            'driver' => !empty($this->driver_id) ? ModelsUser::where('id', $this->driver_id)->toArray($request) : null,
            'distance' => $this->distance,
            'cost' => $this->cost,
            'start_location' => $this->start_location,
            'end_location' => $this->end_location,
            'estimated_duration' => $this->estimated_duration,
            'actual_duration' => $this->actual_duration,
            'waiting_time' => $this->waiting_time,
            'is_scheduled' => $this->is_scheduled,
            'scheduled_time' => $this->scheduled_time,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
