<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDropzonePhotoRequest;
use Illuminate\Support\Facades\Storage;

class VehicleDropzonePhotoController extends Controller
{
    public function store(StoreDropzonePhotoRequest $request)
    {
        Storage::putFileAs(
            'tmp',
            $request->file('file'),
            $request->file('file')->getClientOriginalName()
        );
        return $request->file('file')->getClientOriginalName();
    }

    public function destroy()
    {
        Storage::delete('tmp/' . \request()->input('name'));
        return response()->json('success deleted!');
    }
}
