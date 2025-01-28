<?php

namespace App\Http\Resources;

use App\Models\Country as ModelsCountry;
use App\Models\Document as ModelsDocument;
use App\Models\Vehicle as ModelsVehicle;
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
        $user_country = !empty($this->country_code) ? ModelsCountry::where('code', $this->country_code)->first() : null;
        $user_id_card_request = ModelsDocument::where([['user_id', $this->id], ['type', 'id_card']])->first();
        $user_id_card = new Document($user_id_card_request);
        $user_driving_license_request = ModelsDocument::where([['user_id', $this->id], ['type', 'driving_license']])->first();
        $user_driving_license = new Document($user_driving_license_request);
        $user_vehicle_registration_request = ModelsDocument::where([['user_id', $this->id], ['type', 'vehicle_registration']])->first();
        $user_vehicle_registration = new Document($user_vehicle_registration_request);
        $user_vehicle_insurance_request = ModelsDocument::where([['user_id', $this->id], ['type', 'vehicle_insurance']])->first();
        $user_vehicle_insurance = new Document($user_vehicle_insurance_request);
        $user_vehicles_request = ModelsVehicle::where('user_id', $this->id)->orderByDesc('created_at')->get();
        $user_vehicles_resource = Vehicle::collection($user_vehicles_request);
        $user_vehicles = $user_vehicles_resource->toArray($request);

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
            'country' => !empty($user_country) ? $user_country->toArray($request) : null,
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
            'avatar_url' => !empty($this->avatar_url) ? (isFromAWS($this->avatar_url)? $this->avatar_url : getWebURL() . '/storage/' . $this->avatar_url) : getWebURL() . '/assets/img/user.png',
            'session_socket_io' => $this->session_socket_io,
            'fcm_token' => $this->fcm_token,
            'rate' => $this->rate,
            'activation_otp' => $this->activation_otp,
            'role' => UserRole::make($this->role),
            'status' => Status::make($this->status),
            'user_id_card' => $user_id_card,
            'user_driving_license' => $user_driving_license,
            'user_vehicle_registration' => $user_vehicle_registration,
            'user_vehicle_insurance' => $user_vehicle_insurance,
            'user_vehicles' => $user_vehicles,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
