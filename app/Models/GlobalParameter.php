<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GlobalParameter extends Model
{
    use HasFactory;
    protected $table = 'global_parameters';
    protected $guarded = [];

    public function global_parameter_type(): BelongsTo
    {
        return $this->belongsTo(GlobalParameterType::class, 'type', 'id');
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
