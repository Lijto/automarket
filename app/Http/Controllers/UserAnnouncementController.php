<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\VehiclePhoto;
use http\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserAnnouncementController extends Controller
{
    const USER_ANNOUNCEMENT_LIMIT = 3;

    public function index(Announcement $announcement)
    {
        $userId = Auth::id();
        $userAnnouncements = $announcement->userAnnouncements($userId)->get();
        return view('dashboard', compact('userAnnouncements'));
    }

    public function create()
    {
        if (Announcement::where('user_id', Auth::id())->count() < self::USER_ANNOUNCEMENT_LIMIT) {
            return view('announcements.create');
        }
        return redirect(route('user-announcements.index'))->with(
            'error',
            'Максимально количество объявлений: ' . self::USER_ANNOUNCEMENT_LIMIT
        );
    }

    public function destroy($id, Announcement $announcement, VehiclePhoto $photo)
    {
        $announcement = $announcement->where('user_id', Auth::id())->findOrFail($id);
        $photos = $photo->where('announcement_id', $announcement->id)->get();
        $photoLinks = [];

        foreach ($photos as $photo) {
            $photoLinks[] = $photo->link;
        }

        try {
            DB::beginTransaction();
            $photo->where('announcement_id', $announcement->id)->delete();
            $announcement->delete();
            Storage::delete(array_values($photoLinks));
            DB::commit();
            return redirect(route('user-announcements.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception);
            return $exception;
        }
    }
}
