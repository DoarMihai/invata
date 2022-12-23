<?php

namespace App\Http\Controllers;

use App\Models\EnrolledPaths;
use App\Models\Path;
use Illuminate\Http\Request;

class PathController extends Controller
{
    public function enroll(string $pathSlug)
    {
        $path = Path::where('slug', $pathSlug)->first();

        $isEnrolled = EnrolledPaths::where('path_id', $path->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        $message = 'Te-ai inscris la cursul `'.$path->name.'`!';

        if (!$isEnrolled) {
            $message = 'Esti deja inscris la cursul `'.$path->name.'`!';
            EnrolledPaths::create([
                'path_id' => $path->id,
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect()->back()->with('success', $message);
    }
}
