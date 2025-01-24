<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * ONE-TO-MANY
     * One vehicle for several documents
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    /**
     * ONE-TO-MANY
     * One status for several documents
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * ONE-TO-MANY
     * One user for several documents
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
