<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Announcement extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class);
    }

    public function vehicleType(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function vehicleName(): BelongsTo
    {
        return $this->belongsTo(VehicleName::class);
    }

    public function vehicleModel(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function fuelType(): BelongsTo
    {
        return $this->belongsTo(FuelType::class);
    }

    public function volumeOfEngine(): BelongsTo
    {
        return $this->belongsTo(VolumeOfEngine::class);
    }

    public function transmission(): BelongsTo
    {
        return $this->belongsTo(Transmission::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(VehiclePhoto::class);
    }

    public function allAnnouncements(): Builder
    {
        return $this->with([
            'user:id,name,email',
            'state',
            'town',
            'vehicleType',
            'vehicleName',
            'vehicleModel',
            'fuelType',
            'volumeOfEngine',
            'transmission',
            'color',
            'year',
            'photos'
        ]);
    }

    public function userAnnouncements(int $userId)
    {
        return $this->where('user_id', $userId);
    }
}
