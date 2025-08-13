<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Ambil semua blog
    public function index()
    {
        return Blog::all()->map(function ($blog) {
        return [
            'id' => $blog->id,
            'title' => $blog->title,
            'content' => $blog->content,
            'image' => $blog->image ? asset('storage/' . $blog->image) : null,
        ];
    });
    }

    // Ambil detail blog
    public function show($id)
    {
        return response()->json(Blog::findOrFail($id));
    }
}
