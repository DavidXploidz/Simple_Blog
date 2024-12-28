@extends('layouts.app')

@section('content')
    <x-title :text="'Create new post'"/>
    <form class="max-w-96 mx-auto bg-white p-4 shadow rounded-md flex flex-col gap-5 mb-10" action="{{route('post.store')}}" method="POST" novalidate >
        @csrf
        <fieldset>
            <x-label :text="'Title'" />
            <input class="p-3 rounded-md border border-gray-300 w-full focus:outline-none @error('title') border-red-500 @enderror" name="title" id="title" type="text" placeholder="Give it a title to your post" value="{{old('title')}}" >
            @error('title') 
                <p class="text-red-500 text-sm px-3 py-1">{{$message}}</p> 
            @enderror 
        </fieldset>
        <fieldset>
            <x-label :text="'Content'" />
            <textarea class="p-3 rounded-md border border-gray-300 w-full focus:outline-none @error('content') border-red-500 @enderror" name="content" id="content" cols="30" rows="5" placeholder="Add more details" value="{{old('content')}}"></textarea>
            @error('content') 
                <p class="text-red-500 text-sm px-3 py-1">{{$message}}</p> 
            @enderror 
        </fieldset>
        <fieldset>
            <x-label :text="'Add Category'" />
            <select class="w-full p-3 bg-gray-100 rounded-md text-slate-500" name="category" id="category">
                @foreach ($categories as $cat)
                <option class="capitalize" value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </fieldset>
        <fieldset>
            <x-label :text="'Add Tag'" />
            <select class="w-full p-3 bg-gray-100 rounded-md text-slate-500" name="tag" id="tag">
                @foreach ($tags as $tag)
                <option class="capitalize" value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </fieldset>
        <fieldset class="flex">
            <button class="px-2 py-1 bg-blue-600 text-white rounded-md hover:cursor-pointer hover:bg-blue-800 transition-colors ml-auto min-w-24">Save</button>
        </fieldset>
    </form>
@endsection