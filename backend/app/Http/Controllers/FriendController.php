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

        // Create a notification for the friend request
        $notification = new Notification();
        $notification->user_id = $friend->id;
        $notification->type = 'friend_request';
        $notification->save();

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Friend added successfully.');
    }
}