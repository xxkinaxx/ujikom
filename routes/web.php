<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/home', function () {
    return view('dashboard', ['type_menu' => 'Dashboard']);
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin-dashboard', function () {
    return view('admin.dashboard', ['type_menu' => 'Dashboard']);
});

Route::resource('user', UserController::class);