<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class Ride extends Model
{
    use HasFactory;

    protected $table = 'rides';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * ONE-TO-MANY
     * One vehicle_category for several users
     */
    public function vehicle_category()
    {
        return $this->belongsTo(VehicleCategory::class, 'vehicle_category_id');
    }

    /**
     * ONE-TO-MANY
     * One vehicle for several users
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    /**
     * MANY-TO-ONE
     * Several payments for a ride
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'ride_id');
    }

    /**
     * MANY-TO-ONE
     * Several reviews for a ride
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'ride_id');
    }
}
