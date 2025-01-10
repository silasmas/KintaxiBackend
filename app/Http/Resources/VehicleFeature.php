<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class VehicleFeature extends JsonResource
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
            'vehicle_id' => $this->vehicle_id,
            'icon' => $this->icon,
            'is_clean' => $this->is_clean,
            'has_helmet' => $this->has_helmet,
            'has_airbags' => $this->has_airbags,
            'has_seat_belt' => $this->has_seat_belt,
            'has_ergonomic_seat' => $this->has_ergonomic_seat,
            'has_air_conditioning' => $this->has_air_conditioning,
            'has_suspensions' => $this->has_suspensions,
            'has_soundproofing' => $this->has_soundproofing,
            'has_sufficient_space' => $this->has_sufficient_space,
            'has_quality_equipment' => $this->has_quality_equipment,
            'has_on_board_technologies' => $this->has_on_board_technologies,
            'has_interior_lighting' => $this->has_interior_lighting,
            'has_practical_accessories' => $this->has_practical_accessories,
            'has_driving_assist_system' => $this->has_driving_assist_system,
            'status' => Status::make($this->status),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by
        ];
    }
}
