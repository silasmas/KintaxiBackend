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
            'vehicle_category' => VehicleCategory::make($this->vehicle_category),
            'vehicle' => Vehicle::make($this->vehicle),
            // 'passenger' => !empty($this->passenger_id) ? ModelsUser::where('id', $this->passenger_id)->first() : null,
            // 'driver' => !empty($this->driver_id) ? ModelsUser::where('id', $this->driver_id)->first() : null,
            'distance' => $this->distance,
            'cost' => $this->cost,
            'estimated_cost' => $this->estimated_cost,
            'payment_method' => $this->payment_method,
            'commission' => $this->commission,
            'start_location' => $this->start_location,
            'end_location' => $this->end_location,
            'pickup_location' => $this->pickup_location,
            'pickup_data' => $this->pickup_data,
            'driver_location' => $this->driver_location,
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
