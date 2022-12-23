<?php

namespace App\Http\Controllers;

class MainPageController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
