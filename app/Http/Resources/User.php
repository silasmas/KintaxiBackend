<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class User extends JsonResource
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
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'surname' => $this->surname,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'country_id' => $this->country_id,
            'city' => $this->city,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'p_o_box' => $this->p_o_box,
            'password' => $this->password,
            'belongs_to' => $this->belongs_to,
            'email_verified_at' => $this->email_verified_at,
            'phone_verified_at' => $this->phone_verified_at,
            'remember_token' => $this->remember_token,
            'api_token' => $this->api_token,
            'avatar_url' => $this->avatar_url,
            'session_socket_io' => $this->session_socket_io,
            'fcm_token' => $this->fcm_token,
            'rate' => $this->rate,
            'activation_otp' => $this->activation_otp,
            'role' => UserRole::make($this->role)->toArray($request),
            'status' => Status::make($this->status)->toArray($request),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
