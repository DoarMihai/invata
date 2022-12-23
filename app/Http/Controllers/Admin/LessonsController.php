<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use App\Models\Path;
use App\Models\Section;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('path', 'section')->paginate(15);

        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $paths = Path::get();
        $sections = Section::get();

        return view('admin.lessons.create',compact('paths', 'sections'));
    }

    public function store(LessonRequest $request)
    {
        $lesson = Lesson::create($request->only(['name','slug','content','path_id','section_id',]));

        return redirect()->route('admin.lessons.edit', $lesson->id)->with('success', 'Lesson created!');
    }

    public function edit(int $id)
    {
        $lesson = Lesson::where('id', $id)->first();
        $paths = Path::get();
        $sections = Section::get();

        return view('admin.lessons.edit', compact('lesson', 'paths', 'sections'));
    }

    public function update(LessonRequest $request, int $id)
    {
        Lesson::where('id', $id)->update($request->only(['name','slug','content','path_id','section_id',]));


        return redirect()->back()->with('success', 'Lesson edited!');
    }

    public function destroy(int $id)
    {
        $lesson = Lesson::where('id', $id)->first();
        $lesson->deleted();

        return redirect()->back()->with('success', 'Lesson deleted!');
    }
}
