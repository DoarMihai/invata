<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //dashboard
        return view('dashboard');
    }

    //path
    public function path()
    {
        return view('path');
    }

    //lesson
    public function lesson()
    {
        return view('lesson');
    }

    //almanach
    public function almanach()
    {
        return view('almanach');
    }

    //almanachItem
    public function almanachItem()
    {
        return view('almanach_item');
    }
}
