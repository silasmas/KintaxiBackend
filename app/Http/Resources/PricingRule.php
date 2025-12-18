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
            'rule_type_STRING' => !empty($this->rule_type) ? __('miscellaneous.admin.pricing.data.rule_type.'. $this->rule_type) : null,
            'min_value' => $this->min_value,
            'max_value' => $this->max_value,
            'cost' => $this->cost,
            'vehicle_category' => $this->vehicle_category,
            'surge_multiplier' => $this->surge_multiplier,
            'unit' => $this->unit,
            'unit_STRING' => !empty($this->unit) ? __('miscellaneous.admin.pricing.data.unit.'. $this->unit) : null,
            'zone_id' => $this->zone_id,
            'valid_from' => $this->valid_from,
            'valid_to' => $this->valid_to,
            'is_default' => $this->is_default,
            'is_default_STRING' => $this->is_default == 1 ? __('miscellaneous.yes') : __('miscellaneous.no'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by
        ];
    }
}
