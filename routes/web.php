<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAnnouncementController;
use App\Http\Controllers\VehicleDropzonePhotoController;
use App\Http\Controllers\VehicleNameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AnnouncementController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('user-announcements', UserAnnouncementController::class)->except(['show']);
});
Route::group(['as' => 'vehicle.'], function () {
    Route::get('vehicle-names', [VehicleNameController::class, 'index'])->name('names');
    Route::post('vehicle-photos-dropzone', [VehicleDropzonePhotoController::class, 'store'])->name('photos.dropzone.store');
    Route::delete('vehicle-photos-dropzone', [VehicleDropzonePhotoController::class, 'destroy'])->name('photos.dropzone.destroy');
});

require __DIR__ . '/auth.php';
