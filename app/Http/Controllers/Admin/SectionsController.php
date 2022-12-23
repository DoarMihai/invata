<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Path;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index()
    {
        $sections = Section::with('path')->paginate(15);

        return view('admin.sections.index', compact('sections'));
    }

    public function create()
    {
        $paths = Path::get();

        return view('admin.sections.create', compact('paths'));
    }

    public function store(SectionRequest $request)
    {
        $section = Section::create($request->only(['name', 'order', 'path_id']));

        return redirect()->route('admin.sections.edit', $section->id)->with('success', 'Section created!');
    }

    public function edit(int $id)
    {
        $section = Section::where('id', $id)->first();
        $paths = Path::get();

        return view('admin.sections.edit', compact('section', 'paths'));
    }

    public function update(SectionRequest $request, int $id)
    {
        $section = Section::where('id', $id)->update(
            $request->only(['name', 'order', 'path_id'])
        );

        return redirect()->back()->with('success', 'Section edited!');
    }

    public function destroy(int $id)
    {
        $section = Section::where('id', $id)->first();
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted!');
    }
}
