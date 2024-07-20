<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GlobalParameterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->code,
            // 'type' => $this->global_parameter_type->name ?? null,
            'name' => $this->name ?? null,
            'description' => $this->description ?? null,
            'is_active' => $this->is_active ?? null,
            'created_by' => [
                'id' => $this->created_by_user_profile->id ?? null,
                'firstname' => $this->created_by_user_profile->firstname ?? null,
                'middlename' => $this->created_by_user_profile->middlename ?? null,
                'lastname' => $this->created_by_user_profile->lastname ?? null,
            ],

            'updated_by' => [
                'id' => $this->updated_by_user_profile->id ?? null,
                'firstname' => $this->updated_by_user_profile->firstname ?? null,
                'middlename' => $this->updated_by_user_profile->middlename ?? null,
                'lastname' => $this->updated_by_user_profile->lastname ?? null,
            ],
        ];
    }
}
