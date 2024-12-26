@extends('layouts.app')

@section('content')
    <x-title :text="'My Posts'"/>
    <div class="container px-4 mx-auto flex">
        <a class="p-2 bg-blue-600 text-white rounded-md ml-auto" href="{{route('post.create')}}">New Post</a>
    </div>
@endsection