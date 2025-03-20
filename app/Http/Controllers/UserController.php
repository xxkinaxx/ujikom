<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        $users = User::query()
        ->when($request->input('name'), function ($query, $name) {
            $query->where('name', 'like', '%' . $name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('users.index', compact('users'));
    }
}
