<?php

namespace App\Http\Controllers;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = [
            [
                'title' => 'Monthly Staff Meeting',
                'date' => '25 September 2026',
                'category' => 'Meeting',
                'message' => 'All staff are required to attend the monthly staff meeting at 10:00 AM in the main meeting room.',
            ],
            [
                'title' => 'Office Maintenance',
                'date' => '28 September 2026',
                'category' => 'Notice',
                'message' => 'Scheduled maintenance will be carried out in the office from 3:00 PM onwards.',
            ],
            [
                'title' => 'Staff Appreciation Day',
                'date' => '5 October 2026',
                'category' => 'Event',
                'message' => 'Join us for Staff Appreciation Day. More information will be announced soon.',
            ],
        ];

        return view('announcements.index', compact('announcements'));
    }
}
