<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * ONE-TO-MANY
     * One status for several vehicles
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * ONE-TO-MANY
     * One user for several vehicles
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * ONE-TO-MANY
     * One vehicles_shape for several vehicles
     */
    public function shape()
    {
        return $this->belongsTo(VehicleShape::class, 'shape_id');
    }

    /**
     * ONE-TO-MANY
     * One vehicles_category for several vehicles
     */
    public function category()
    {
        return $this->belongsTo(VehicleCategory::class, 'category_id');
    }

    /**
     * MANY-TO-ONE
     * Several rides for a vehicle
     */
    public function rides()
    {
        return $this->hasMany(Ride::class, 'vehicle_id');
    }

    /**
     * MANY-TO-ONE
     * Several vehicles_features for a vehicle
     */
    public function vehicles_features()
    {
        return $this->hasMany(VehicleFeature::class, 'vehicle_id');
    }

    /**
     * MANY-TO-ONE
     * Several files for a vehicle
     */
    public function files()
    {
        return $this->hasMany(File::class, 'vehicle_id');
    }
}
