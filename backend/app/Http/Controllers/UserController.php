<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function uploadProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the uploaded image in the storage/app/public directory
            $image->storeAs('public', $imageName);

            // Update the authenticated user's profile_picture column with the image name
            Auth::user()->update(['profile_picture' => $imageName]);

            return redirect()->back()->with('success', 'Profile picture uploaded successfully!');
        }

        return redirect()->back()->with('error', 'No profile picture selected.');
    }

    public function uploadWallpaperPicture(Request $request)
    {
        $request->validate([
            'wallpaper_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('wallpaper_picture')) {
            $image = $request->file('wallpaper_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the uploaded image in the storage/app/public directory
            $image->storeAs('public', $imageName);

            // Update the authenticated user's wallpaper_picture column with the image name
            Auth::user()->update(['wallpaper_picture' => $imageName]);

            return redirect()->back()->with('success', 'Wallpaper updated!');
        }

        return redirect()->back()->with('error', 'No wallpaper selected.');
    }

    public function uploadBackgroundPhoto(Request $request)
    {
        $request->validate([
            'background_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $user = new User;

        if ($request->hasFile('background_photo')) {
            $image = $request->file('background_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the uploaded image in the storage/app/public directory
            $image->storeAs('public', $imageName);

            // Update the authenticated user's background_photo column with the image name
            Auth::user()->update(['background_photo' => $imageName]);

            return redirect()->back()->with('success', 'Background Wallpaper updated!');

            $user->background_photo = $imageName;
        }

        return redirect()->back()->with('error', 'No Background wallpaper selected.');
    }

    public function delete($id){
        $user = User::find($id);

        if($user->background_photo != NULL){
            Storage::delete('/public/'.$user->background_photo);
        }
        return redirect()->back()->with('success', " Deleted!");
    }       

    // public function uploadBackgroundPhoto(Request $request)
    // {
    //     $request->validate([
    //         'background_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $user = new User;

    //     if ($request->hasFile('background_photo')) {
    //         $image = $request->file('background_photo');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();

    //         // Store the uploaded image in the storage/app/public directory
    //         Storage::disk('public')->putFileAs('background_photos', $image, $imageName);

    //         // Update the authenticated user's background_photo column with the image name
    //         $user->background_photo = $imageName;
    //         $user->save();

    //         return redirect()->back()->with('success', 'Background Wallpaper updated!');
    //     }

    //     return redirect()->back()->with('error', 'No Background wallpaper selected.');
    // }

    // public function delete($id){
    //     $user = User::find($id);

    //     if($user->background_photo != NULL){
    //         Storage::disk('public')->delete('background_photos/'.$user->background_photo);
    //     }
    //     return redirect()->back()->with('success', " Deleted!");
    // }       
}