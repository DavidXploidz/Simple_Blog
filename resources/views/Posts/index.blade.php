@extends('layouts.app')

@section('content')
    <x-title :text="'My Posts'"/>
    <div class="container px-4 mx-auto flex">
        <a class="p-2 bg-blue-600 text-white rounded-md ml-auto" href="{{route('post.create')}}">New Post</a>
    </div>
    @if (session('success'))
        <p class="p-3 bg-sky-200 text-sky-900 text-sm font-semibold text-center max-w-96 mx-auto rounded-md">{{session('success')}}</p>
    @endif
    <div class="container px-4 mx-auto my-10">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach ($posts as $post)
                <article class="p-3 rounded-lg shadow bg-white hover:-translate-y-1.5 transition-transform">
                    <a href="{{route('post.show', $post->id)}}">
                        {{-- <small>{{$post->id}}</small> --}}
                        <h3 class="text-3xl font-semibold text-slate-700">{{$post->title}}</h3>
                        <p class="text-slate-500 line-clamp-3">{{$post->content}}</p>
                        {{-- Tags --}}
                        @foreach ($post->tags as $tag )
                            <p class="font-medium px-2 rounded-full capitalize text-sky-500  inline-flex items-center text-xs">#{{$tag->name}}</p>
                        @endforeach
                        {{-- Categories --}}
                        @foreach ($post->categories as $cat )
                            <p class="font-medium px-2 rounded-full capitalize bg-amber-300 text-slate-800 inline-flex items-center text-xs">{{$cat->name}}</p>
                        @endforeach
                    </a>
                </article>
            @endforeach
        </div>
    </div>
@endsection