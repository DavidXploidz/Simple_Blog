@extends('layouts.app')

@section('content')
    <div class="container px-4 mx-auto">
        <x-title :text="$post->title" />
        <div class="grid md:grid-cols-2 divide-x divide-gray-300 gap-5 bg-white rounded-lg shadow p-4 max-w-3xl mx-auto min-h-40 mb-10">
            {{-- Info blog --}}
            <div>
                <h2 class="text-3xl text-semibold text-slate-800 mb-3 font-medium">{{$post->title}}</h2>
                <p class="text-lg text-gray-600 mb-3">{{$post->content}}</p>
                {{-- Tags --}}
                @foreach ($post->tags as $tag )
                    <p class="font-medium px-2 rounded-full capitalize text-sky-500  inline-flex items-center text-xs">#{{$tag->name}}</p>
                @endforeach
                {{-- Categories --}}
                @foreach ($post->categories as $cat )
                    <p class="font-medium px-2 rounded-full capitalize bg-amber-300 text-slate-800 inline-flex items-center text-xs">{{$cat->name}}</p>
                @endforeach
            </div>
            {{-- Seccion Comentarios --}}
            <div class="flex flex-col pl-4">
                <h3 class="text-xl text-slate-600 text-center mb-3">Comments</h3>
                {{-- List Comments --}}
                <ul class="mb-4 flex flex-col gap-3">
                    @foreach ($post->comments as $comment )
                        <li class="text-gray-600 flex items-start gap-3">
                            <img width="30" height="30" src="{{ asset('images/user_default.png') }}" alt="User default">
                            <div class="flex flex-col gap-1 flex-1">
                                <span class="text-slate-700 font-medium">{{$comment->content}}</span>
                                <div class="flex justify-between">
                                    <span class="text-xs text-gray-400">{{$comment->user->name}}</span>
                                    <span class="text-xs text-gray-400">{{$comment->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if (session('success'))
                    <div class="bg-green-500 text-white text-center text-sm px-2 py-1 rounded">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="bg-red-500 text-white text-center text-sm px-2 py-1 rounded">{{ session('error') }}</div>
                @endif
                <form class="flex flex-col flex-1 gap-3" action="{{route('comment.store', $post->id)}}" method="POST" novalidate>
                    @csrf
                    <textarea class="bg-gray-100 text-slate-700 rounded-lg shadow p-3 w-full mt-auto border border-gray-200 focus:outline-none @error('content') border-red-500 @enderror" name="content" id="content" cols="30" rows="2" placeholder="Let a comment..." value="{{old('content')}}"></textarea>
                    @error('content') 
                        <p class="text-red-500 text-xs px-3 py-1">{{$message}}</p> 
                    @enderror 
                    <button class="bg-sky-500 text-white rounded-md px-2 py-1 ml-auto">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection