<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications()->orderByDesc('created_at')->get();
        $notificationCount = Auth::user()->unreadNotifications()->count();

        return view('notifications.index', compact('notifications', 'notificationCount'));
    }

    public function markAsRead(Request $request)
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'Notifications marked as read.');
    }

    public function confirmFriend(Notification $notification)
    {
        $notification->status = 'confirmed';
        $notification->save();

        $friendName = $notification->user->name;
        $message = "You are now friends with $friendName";
        
        return redirect()->back()->with('success', $message);
    }

    public function deleteFriend(Notification $notification)
    {
        $notification->status = 'deleted';
        $notification->save();

        return redirect()->back()->with('success', 'Friend request deleted.');
    }
}



