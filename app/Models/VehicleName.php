<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleName extends Model
{
    use HasFactory;

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    public function models(): HasMany
    {
        return $this->hasMany(VehicleModel::class);
    }
}
