<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlmanachRequest;
use App\Models\Almanach;
use Illuminate\Http\Request;

class AlmanachController extends Controller
{
    public function index()
    {
        $items = Almanach::paginate(15);

        return view('admin.almanach.index', compact('items'));
    }

    public function create()
    {
        return view('admin.almanach.create');
    }

    public function store(AlmanachRequest $request)
    {
        $almanach = Almanach::create($request->only(['name','slug','section','content']));

        return redirect()->route('admin.almanach.edit', $almanach->id)->with('success', 'Almanach created!');
    }

    public function edit(int $id)
    {
        $almanach = Almanach::where('id', $id)->first();

        return view('admin.almanach.edit', compact('almanach'));
    }

    public function update(AlmanachRequest $request, int $id)
    {
        Almanach::where('id', $id)->update($request->only(['name','slug','section','content']));

        return redirect()->back()->with('success', 'Almanach edited!');
    }

    public function destroy(int $id)
    {
        $almanach = Almanach::where('id', $id)->first();
        $almanach->delete();

        return redirect()->back()->with('success', 'Almanach deleted!');
    }
}
