<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Twat;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $twats = Twat::orderBy('created_at', 'desc')->paginate();
    
        return view('home', compact('user', 'twats'));
    }

    public function profile($id)
    {
        return view('profile')->with('user', User::find($id));
    }
}
