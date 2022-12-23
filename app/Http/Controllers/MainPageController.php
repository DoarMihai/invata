<?php

namespace App\Http\Controllers;

use App\Models\Path;

class MainPageController extends Controller
{
    public function index()
    {
        $paths = Path::get();

        return view('home', compact('paths'));
    }
}
