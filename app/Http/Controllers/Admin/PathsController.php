<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PathRequest;
use App\Models\Path;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PathsController extends Controller
{
    public function index()
    {
        $paths = Path::paginate(15);

        return view('admin.paths.index', compact('paths'));
    }

    public function create()
    {
        return view('admin.paths.create');
    }

    public function store(PathRequest $request)
    {
        $data = $request->only(['name']);
        $data['slug'] = Str::slug($data['name']);

        $path = Path::create($data);

        return redirect()->route('admin.paths.edit', $path->id)->with('success', 'Path saved!');
    }

    public function edit(int $id)
    {
        $path = Path::where('id', $id)->first();

        return view('admin.paths.edit', compact('path'));
    }

    public function update(PathRequest $request, int $id)
    {
        $path = Path::where('id', $id)->first();

        $path->name = $request->get('name');
        $path->slug = Str::slug($request->get('name'));
        $path->save();

        return redirect()->back()->with('success', 'Path updated!');
    }

    public function destroy(int $id)
    {
        $path = Path::where('id', $id)->first();
        $path->delete();

        return redirect()->back()->with('success', 'Path deleted!');
    }
}
