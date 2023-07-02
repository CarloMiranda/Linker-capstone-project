<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Twat;
use Illuminate\Support\Facades\Storage;

use Auth;

class TwatController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'content' => 'nullable',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $twat = new Twat;
        $twat->content = $request->input('content', '');
        $twat->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . "." . $image->getClientOriginalExtension();

            // Save image in storage
            Storage::putFileAs('public/images', $image, $name);

            $twat->image_path = $name;
        } else {
            return redirect()->route('home')->withErrors(['image' => 'Please select an image to upload.']);
        }

        $twat->save();
        return redirect()->back()->with('success', 'Post created successfully.');
    }


    public function delete($id){
        $twat = Twat::find($id);

        if($twat->image_path != NULL){
            Storage::delete('/public/images/'.$twat->image_path);
        }

        if(Auth::user()->id == $twat->user->id){
            $twat->delete();
            return redirect()->route('home')->with('success', " deleted!");
        }else{
            return redirect()->route('home');
        }
    }       
}