@extends('layouts.app')

@section('content')
    <x-title :text="'Edit Profile'"/>
    <div class="container px-4 mx-auto max-w-3xl sm:px-6 lg:px-8">

    </div>
    <form class="max-w-96 mx-auto bg-white p-4 shadow rounded-md flex flex-col gap-5 mb-10" action="{{ route('profile.update', $user->id) }}" novalidate method="POST">
        @method('PATCH')
        @csrf
        @if (session('success'))
            <div class="bg-sky-500 text-white text-center text-sm px-2 py-1 rounded mb-3">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="bg-red-500 text-white text-center text-sm px-2 py-1 rounded mb-3">{{ session('error') }}</div>
        @endif
        <fieldset>
            <x-label :text="'Name'" />
            <input class="p-3 rounded-md border border-gray-300 w-full focus:outline-none @error('name') border-red-500 @enderror" name="name" id="name" type="text" placeholder="Your name" value="{{$user->name}}" >
            @error('name') 
                <p class="text-red-500 text-sm px-3 py-1">{{$message}}</p> 
            @enderror 
        </fieldset>
        <fieldset>
            <x-label :text="'Bio'" />
            <textarea class="p-3 rounded-md border border-gray-300 w-full focus:outline-none @error('bio') border-red-500 @enderror" name="bio" id="bio" cols="30" rows="3" placeholder="Add your bio">{{$user->bio}}</textarea>
            @error('bio') 
                <p class="text-red-500 text-sm px-3 py-1">{{$message}}</p> 
            @enderror 
        </fieldset>
        <fieldset class="flex">
            <button class="px-2 py-1 bg-blue-600 text-white rounded-md hover:cursor-pointer hover:bg-blue-800 transition-colors ml-auto min-w-24">Save</button>
        </fieldset>
    </form>
@endsection