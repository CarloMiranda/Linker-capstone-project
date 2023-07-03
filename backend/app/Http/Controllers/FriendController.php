<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class FriendController extends Controller
{
    public function addFriend($id)
    {
        // Find the user to be added as a friend
        $friend = User::findOrFail($id);
    
        // Add the friend relationship
        Auth::user()->addFriend($friend);
    
        // Create a notification for the recipient user
        $message = "You have received a friend request from " . Auth::user()->name;
        $friend->notifications()->create([
            'message' => $message,
            'read' => false,
        ]);
    
        // Redirect back or return a response
        return redirect()->back()->with('success', 'Friend added successfully.');
    }

    public function confirmFriend(Request $request, $id)
    {
        // Retrieve the notification
        $notification = Notification::findOrFail($id);

        // Update the notification status
        $notification->status = 'confirmed';
        $notification->save();

        return redirect()->back()->with('success', 'Friend request confirmed.');
    }

    public function deleteFriend(Request $request, $id)
    {
        // Retrieve the notification
        $notification = Notification::findOrFail($id);

        // Update the notification status
        $notification->status = 'deleted';
        $notification->save();

        return redirect()->back()->with('success', 'Friend request deleted.');
    }
}

