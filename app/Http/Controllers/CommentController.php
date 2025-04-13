<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    
    {
        dd($request->all());

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        Comment::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);
    
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
    

    public function index()
    {
        // Ambil komentar berdasarkan produk
        $comments = Comment::with(['user', 'product'])->get();
        return view('admin.comment.index', compact('comments'));
    }
}
