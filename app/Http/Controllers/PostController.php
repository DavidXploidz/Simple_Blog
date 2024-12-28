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
        // Forma simple
        // $posts = Post::get();
        // Forma mas detallada
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // Con una relacion de la tabla pivote
        $posts = Post::with('tags', 'categories')->orderBy('created_at', 'desc')->get();
        return view('Posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $tags = Tag::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
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

    public function show($id)
    {
        $post = Post::find($id);
        return view('Posts.show', [
            'post' => $post
        ]);
    }
}
