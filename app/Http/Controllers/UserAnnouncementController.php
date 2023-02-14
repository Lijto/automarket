<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class UserAnnouncementController extends Controller
{
    public function index(Announcement $announcement)
    {
        $userId = Auth::id();
        $userAnnouncements = $announcement->userAnnouncements($userId)->get();
        return view('dashboard', compact('userAnnouncements'));
    }
}
