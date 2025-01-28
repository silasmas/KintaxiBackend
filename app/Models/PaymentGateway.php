<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class PaymentGateway extends Model
{
    use HasFactory;

    protected $table = 'payment_gateways';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * ONE-TO-MANY
     * One status for several payment_methods
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * MANY-TO-ONE
     * Several payment_methods for a status
     */
    public function payment_methods()
    {
        return $this->hasMany(PaymentMethod::class, 'payment_gateway_id');
    }
}
