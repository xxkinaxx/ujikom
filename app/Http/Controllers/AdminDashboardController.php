<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('admin.dashboard', compact('product'));
    }
}
