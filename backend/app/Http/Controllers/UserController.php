<?php

// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;

// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     public function uploadProfilePicture(Request $request)
//     {
//         $request->validate([
//             'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);

//         if ($request->hasFile('profile_picture')) {
//             $image = $request->file('profile_picture');
//             $imageName = time() . '.' . $image->getClientOriginalExtension();

//             // Store the uploaded image in the storage/app/public directory
//             $image->storeAs('public', $imageName);

//             // Update the user's profile_picture column with the image name
//             Auth::user()->update(['profile_picture' => $imageName]);

//             return 'Profile picture uploaded successfully!';
//         }

//         return 'No profile picture selected.';
//     }
// }
