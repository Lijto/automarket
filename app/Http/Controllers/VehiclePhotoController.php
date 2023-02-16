<?php

namespace App\Http\Controllers;

use App\Models\VehiclePhoto;
use Illuminate\Http\Request;

class VehiclePhotoController extends Controller
{
    public function deleteUserAnnouncementPhoto()
    {
        $vehiclePhoto = new VehiclePhoto();
        $userVehiclePhoto = $vehiclePhoto->findOrFail(\request('id'));
        $userVehiclePhoto->deleteAnnouncementPhoto();
        return redirect()->back();
    }
}
