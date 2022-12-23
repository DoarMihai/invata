<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(15);

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(PageRequest $request)
    {
        $page = Page::create($request->only(['name', 'slug', 'content']));

        return redirect()->route('admin.pages.edit', $page->id)->with('success', 'Page created!');
    }

    public function edit(int $id)
    {
        $page = Page::where('id', $id)->first();

        return view('admin.pages.edit', compact('page'));
    }

    public function update(PageRequest $request, int $id)
    {
        Page::where('id', $id)->update($request->only(['name', 'slug', 'content']));

        return redirect()->back()->with('success', 'Page edited!');
    }

    public function destroy(int $id)
    {
        $page = Page::where('id', $id)->first();
        $page->delete();

        return redirect()->back()->with('success', 'Page deleted!');
    }
}
