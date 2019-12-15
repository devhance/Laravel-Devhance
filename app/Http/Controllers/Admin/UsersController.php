<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index() {
        $users = User::paginate(30);
        return view('admin.index', compact('users'));
    }

    public function update() {
        
    }
}
