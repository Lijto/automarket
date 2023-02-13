<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Announcement $announcement)
    {
        $announcements = $announcement->allAnnouncements()->get();

        return view('home', compact('announcements'));
    }
}
