<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()&&Auth::user()->role==1) {
            return redirect()->route('admin.user');
        } elseif(Auth::check()&&Auth::user()->role==3) {
            return redirect()->route('funner.profile');
        } elseif(Auth::check()&&Auth::user()->role==2){
            return redirect()->route('juri.event');
        };
    }

    public function home()
    {
        return view('user.index');
    }
    
    public function event()
    {
        return view('user.event');
    }

    public function read()
    {
        return view('user.read');
    }
}
