@extends('layouts.app')

@section('content')
    <x-title :text="'My Posts'"/>
    <div class="container px-4 mx-auto flex">
        <a class="p-2 bg-blue-600 text-white rounded-md ml-auto" href="{{route('post.create')}}">New Post</a>
    </div>
    @if (session('success'))
        <p class="p-3 bg-sky-200 text-sky-900 text-sm font-semibold text-center max-w-96 mx-auto rounded-md">{{session('success')}}</p>
    @endif
    <div class="container px-4 mx-auto">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($posts as $post)
                <article>
                    <a href="{{route('post.show', $post->id)}}">
                        <small>{{$post->id}}</small>
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->content}}</p>
                        {{-- Tags --}}
                        @foreach ($post->tags as $tag )
                            <p>{{$tag->name}}</p>
                        @endforeach
                        {{-- Categories --}}
                        @foreach ($post->categories as $cat )
                            <p>{{$cat->name}}</p>
                        @endforeach
                    </a>
                </article>
            @endforeach
        </div>
    </div>
@endsection