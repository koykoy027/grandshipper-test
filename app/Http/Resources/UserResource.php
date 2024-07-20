<?php

namespace App\Http\Resources;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email ?? null,
            'suffix' => $this->user_profile->suffix ?? null,
            'firstname' => $this->user_profile->firstname ?? null,
            'middlename' => $this->user_profile->middlename ?? null,
            'lastname' => $this->user_profile->lastname ?? null,
            'gender' => $this->user_profile->global_parameter_gender->name ?? null,
            'civil_status' => $this->user_profile->global_parameter_civil_status->name ?? null,
            'religion' => $this->user_profile->global_parameter_religion->name ?? null,
            'role' => $this->user_profile->role ?? null,
            'job_description' => $this->user_profile->job_description ?? null,
            'is_admin' => $this->user_profile->is_admin ?? null,
            'is_required_to_change_password' => $this->user_profile->is_required_to_change_password ?? null,
            'is_otp_enabled' => $this->user_profile->is_otp_enabled ?? null,
            'is_active' => $this->user_profile->is_active ?? null,
            'addresses' => UserAddressResource::collection($this->user_address),

            
        ];
    }
}
