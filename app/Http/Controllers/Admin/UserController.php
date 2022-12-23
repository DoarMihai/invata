<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '<>', auth()->user()->id)->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function edit(int $id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.users.edit', compact('user'));
    }

    public function update(int $id)
    {

        return redirect()->back()->with('success', 'User edited!');
    }

    public function destroy(int $id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect()->back()->with('success', 'User deleted!');
    }
}
