<?php

namespace App\Models;

use App\Http\Requests\Select2SearchRequest;
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

    public function index(Select2SearchRequest $request, VehicleName $name)
    {
        $names = $name->when($request->search, function ($query) use ($request) {
            $query->where('name', 'LIKE', "{$request->search}%");
        })->get();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'data' => $names
            ]);
        }
    }
}

