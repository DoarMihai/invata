<?php

namespace App\Http\Controllers;

use App\Models\EnrolledPaths;
use App\Models\Path;
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
        $paths = Path::all();
        $enrolledPaths = EnrolledPaths::with('path')->where('user_id', auth()->user()->id)
            ->get();

        $enrolled = [];

        foreach($enrolledPaths as $path) {
            $enrolled[$path->path_id] = $path;
        }

        return view('dashboard', compact('paths', 'enrolledPaths', 'enrolled'));
    }

    //path
    public function path(string $pathSlug)
    {
        $path = Path::where('slug', $pathSlug)->firstOrFail();

        return view('path', compact('path'));
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
