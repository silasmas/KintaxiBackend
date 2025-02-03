<?php

namespace App\Http\Resources;

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
            'distance' => $this->distance,
            'cost' => $this->cost,
            'estimated_cost' => $this->estimated_cost,
            'payment_method' => $this->payment_method,
            'commission' => $this->commission,
            'start_location' => !empty($this->start_location) ? json_decode($this->start_location) : null,
            'end_location' => !empty($this->end_location) ? json_decode($this->end_location) : null,
            'pickup_location' => !empty($this->pickup_location) ? json_decode($this->pickup_location) : null,
            'pickup_data' => !empty($this->pickup_data) ? json_decode($this->pickup_data) : null,
            'driver_location' => !empty($this->driver_location) ? json_decode($this->driver_location) : null,
            'estimated_duration' => $this->estimated_duration,
            'actual_duration' => $this->actual_duration,
            'waiting_time' => $this->waiting_time,
            'is_scheduled' => $this->is_scheduled,
            'scheduled_time' => $this->scheduled_time,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'vehicle_category_id' => $this->vehicle_category_id,
            'vehicle_id' => $this->vehicle_id,
            'passenger_id' => $this->passenger_id,
            'driver_id' => $this->driver_id,
        ];
    }
}
