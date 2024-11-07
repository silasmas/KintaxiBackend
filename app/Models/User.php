<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Check if a user has one of the roles
     */
    public function hasRole(array $roleIds)
    {
        return in_array($this->role_id, $roleIds);
    }

    /**
     * ONE-TO-MANY
     * One users_role for several users
     */
    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }

    /**
     * ONE-TO-MANY
     * One status for several users
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * ONE-TO-MANY
     * One country for several users
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * MANY-TO-ONE
     * Several vehicles for a user
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'user_id');
    }
}
