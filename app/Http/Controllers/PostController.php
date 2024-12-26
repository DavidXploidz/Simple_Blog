<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('Posts.index');
    }

    public function create()
    {
        return view('Posts.create');
    }

    public function store(Request $request)
    {
        // Validar
        $this->validate($request,[ 
            'title' => 'required|string|max:255', 
            'content' => 'required|string', 
        ]); 
        // Crear 
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'published_date' => Carbon::now(),
            'user_id' => 1,
        ]); 

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }
}
