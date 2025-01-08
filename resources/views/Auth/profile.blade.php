@extends('layouts.app')

@section('content')
    <x-title :text="'Profile'"/>
    <div class="container px-4 mx-auto max-w-3xl sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-4 bg-wite rounded-lg shadow-md p-4">
            <img class="justify-self-center aspect-auto" width="220" height="220" src="{{asset('images/user_default.png')}}" alt="user image">
            <div>
                <p class="text-lg text-slate-700 font-bold">{{$user->name}}</p>
                @auth
                    <a href="{{route('profile.edit', $user->id)}}" class="bg-sky-500 text-white rounded-md font-medium py-1 px-3 my-3 text-sm hover:bg-sky-600 transition-colors inline-block">Edit Profile</a>
                @endauth
                <div class="font-semibold text-slate-700">
                    <p>{{$user->posts->count()}} posts</p>
                </div>
                <div>
                    @if ($user->bio)
                        <p class="text-sm text-gray-500 mt-3">{{$user->bio}}</p>
                    @else
                        <p class="text-sm text-gray-500 mt-3">No bio yet!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection