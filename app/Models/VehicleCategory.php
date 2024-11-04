<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class VehicleCategory extends Model
{
    use HasFactory;

    protected $table = 'vehicles_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * ONE-TO-MANY
     * One status for several vehicles_categories
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * MANY-TO-ONE
     * Several vehicles for a vehicles_category
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'category_id');
    }

    /**
     * MANY-TO-ONE
     * Several rides for a vehicles_category
     */
    public function rides()
    {
        return $this->hasMany(Ride::class, 'vehicle_category_id');
    }
}
