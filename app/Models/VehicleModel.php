<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleModel extends Model
{
    use HasFactory;

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(VehicleName::class);
    }
}
