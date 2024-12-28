<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Posts.index');
    }

    public function create()
    {
        $tags = Tag::get();
        $categories = Category::get();
        return view('Posts.create', [
            'tags' => $tags,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
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
            'user_id' => auth()->user()->id,
        ]); 

        // Asignar tags a la tabla pivote
        $post->tags()->attach($request->tag);

        // Asignar categorías a la tabla pivote
        $post->categories()->attach($request->category);

        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }
}
