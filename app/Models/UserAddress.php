<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends Model
{
    use HasFactory;
    protected $table = "users_addressess";
    protected $guarded = [];

    public function global_parameters(): BelongsTo
    {
        return $this->belongsTo(GlobalParameter::class, 'type', 'code')
            ->whereHas('global_parameter_type', function ($query) {
                $query->where('id', 4);
            });
    }

    public function api_philippines_region(): BelongsTo
    {
        return $this->belongsTo(ApiPhilippinesRegion::class, 'region', 'region_code');
    }

    public function api_philippines_province(): BelongsTo
    {
        return $this->belongsTo(ApiPhilippinesProvince::class, 'province', 'province_code');
    }
    public function api_philippines_city(): BelongsTo
    {
        return $this->belongsTo(ApiPhilippinesCity::class, 'city', 'city_code');
    }
    public function api_philippines_barangay(): BelongsTo
    {
        return $this->belongsTo(ApiPhilippinesBarangay::class, 'barangay', 'barangay_code');
    }
}
