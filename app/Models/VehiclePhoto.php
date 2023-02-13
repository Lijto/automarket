<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehiclePhoto extends Model
{
    use HasFactory;

    public function announcement(): BelongsTo
    {
        return $this->belongsTo(Announcement::class);
    }
}
