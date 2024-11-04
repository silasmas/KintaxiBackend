<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_methods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * ONE-TO-MANY
     * One payment_gateway for several payment_methods
     */
    public function payment_gateway()
    {
        return $this->belongsTo(PaymentGateway::class, 'payment_gateway_id');
    }

    /**
     * MANY-TO-ONE
     * Several payments for a payment_method
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_method_id');
    }
}
