<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Gate;

class UsersController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index() {
        $users = User::paginate(30);
        return view('admin.index', compact('users'));
    }

    public function edit(User $user) {
        $roles = Role::all();
        return view('admin.edit-user', compact('user', 'roles'));
    }

    public function update(Request $request, User $user) {
        
        $user->roles()->sync($request->roles);

        return redirect()->back()->with('success', 'Roles have been updated.');

    }

    public function destroy() {
        if (Gate::denies('admin')) {
            return redirect()->back()->with('error', 'You dont have authorized access for this action.');
        }
    }
}
