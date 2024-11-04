<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class PricingRule extends JsonResource
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
            'rule_type' => $this->rule_type,
            'min_value' => $this->min_value,
            'max_value' => $this->max_value,
            'cost' => $this->cost,
            'vehicle_type' => $this->vehicle_type,
            'surge_multiplier' => $this->surge_multiplier,
            'unit' => $this->unit,
            'zone_id' => $this->zone_id,
            'valid_from' => $this->valid_from,
            'valid_to' => $this->valid_to,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by
        ];
    }
}
