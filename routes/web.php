<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/home', function () {
    return view('dashboard', ['type_menu' => 'Dashboard']);
});

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('user', UserController::class);
Route::resource('product', ProductController::class);
Route::resource('comment', CommentController::class);
// Route::post('/product/{id}/comment', [CommentController::class, 'store'])->name('comment.store');
// Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('admin')->group(function () {
    
});
