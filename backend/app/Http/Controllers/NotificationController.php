<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->unreadNotifications;
        $notificationCount = $notifications->count();

        return view('notifications.index', compact('notifications', 'notificationCount'));
    }

    public function markAsRead(Request $request)
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'Notifications marked as read.');
    }
}