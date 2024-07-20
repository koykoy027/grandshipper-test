<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => $this->global_parameters->name ?? null,
            'region' => $this->api_philippines_region->region_name ?? null,
            'province' => $this->api_philippines_province->province_name ?? null,
            'city' => $this->api_philippines_city->city_name ?? null,
            'barangay' => $this->api_philippines_barangay->barangay_name ?? null,
            'zip_code' => $this->zip_code ?? null,
            'address' => $this->address ?? null,
        ];
    }
}
