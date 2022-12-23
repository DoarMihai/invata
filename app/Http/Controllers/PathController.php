<?php

namespace App\Http\Controllers;

use App\Models\EnrolledPaths;
use App\Models\Lesson;
use App\Models\Path;
use Illuminate\Http\Request;

class PathController extends Controller
{
    public function show(string $pathSlug)
    {
        $path = Path::where('slug', $pathSlug)->firstOrFail();
        $lessons = Lesson::where('path_id', $path->id)->get();

        return view('path.show', compact('path', 'lessons'));
    }

    public function enroll(string $pathSlug)
    {
        $path = Path::where('slug', $pathSlug)->first();

        $isEnrolled = EnrolledPaths::where('path_id', $path->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        $message = 'Esti deja inscris la cursul `'.$path->name.'`!';

        if (!$isEnrolled) {
            $message = 'Te-ai inscris la cursul `'.$path->name.'`!';
            EnrolledPaths::create([
                'path_id' => $path->id,
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    public function lesson(string $pathSlug, string $lessonSlug)
    {
        $path = Path::where('slug', $pathSlug)->first();

        $pathLessons = Lesson::where('path_id', $path->id)
            ->orderBy('id', 'ASC')
            ->get();

        $lesson = Lesson::where('slug', $lessonSlug)->first();

        // mark the lesson as last seen by user
        $enrolledPaths = EnrolledPaths::where('path_id', $path->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        $enrolledPaths->last_lesson_id = $lesson->id;
        $enrolledPaths->save();

        $previousLesson = Lesson::where('id', $lesson->id - 1)->first();
        $nextLesson = Lesson::where('id', $lesson->id + 1)->first();

        return view('path.lesson', compact('path', 'lesson', 'pathLessons', 'previousLesson', 'nextLesson'));
    }
}
