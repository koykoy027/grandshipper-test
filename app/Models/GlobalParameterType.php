<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GlobalParameterType extends Model
{
    use HasFactory;
    protected $table = 'global_parameters_type';
    protected $guarded = [];

    public function global_parameters(): HasMany
    {
        return $this->hasMany(GlobalParameter::class, 'type');
    }

    public function created_by_user_profile() :BelongsTo
    {
        return $this->belongsTo(UserProfile::class, 'created_by', 'id');
    }

    public function updated_by_user_profile() :BelongsTo
    {
        return $this->belongsTo(UserProfile::class, 'updated_by', 'id');
    }
}
