<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Twat;
use App\Models\User;

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
        return view('home')->with('twats', Twat::orderBy('created_at', 'desc')->paginate(6));
    }

    public function profile($id)
    {
        return view('profile')->with('user', User::find($id));
    }
}
