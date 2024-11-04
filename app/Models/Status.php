<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * MANY-TO-ONE
     * Several users for a status
     */
    public function users()
    {
        return $this->hasMany(User::class, 'status_id');
    }

    /**
     * MANY-TO-ONE
     * Several payment_gateways for a status
     */
    public function payment_gateways()
    {
        return $this->hasMany(PaymentGateway::class, 'status_id');
    }

    /**
     * MANY-TO-ONE
     * Several vehicles for a status
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'status_id');
    }

    /**
     * MANY-TO-ONE
     * Several vehicles_categories for a status
     */
    public function vehicles_categories()
    {
        return $this->hasMany(VehicleCategory::class, 'status_id');
    }

    /**
     * MANY-TO-ONE
     * Several reviews for a status
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'status_id');
    }

    /**
     * MANY-TO-ONE
     * Several notifications for a status
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'status_id');
    }

    /**
     * MANY-TO-ONE
     * Several files for a status
     */
    public function files()
    {
        return $this->hasMany(File::class, 'status_id');
    }
}
