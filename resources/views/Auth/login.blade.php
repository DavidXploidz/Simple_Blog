@extends('layouts.app')

@section('content')
    <x-title :text="'Login'"/>
    <form class="max-w-96 mx-auto bg-white p-4 shadow rounded-md flex flex-col gap-5 mb-10" action="{{route('login')}}" method="POST" novalidate >
        @csrf
        <fieldset>
            <x-label :text="'Email'" />
            <input class="p-3 rounded-md border border-gray-300 w-full focus:outline-none @error('email') border-red-500 @enderror" name="email" id="email" type="email" placeholder="What´s your email address?" value="{{old('email')}}" >
            @error('email') 
                <p class="text-red-500 text-sm px-3 py-1">{{$message}}</p> 
            @enderror 
        </fieldset>
        <fieldset>
            <x-label :text="'Password'" />
            <input class="p-3 rounded-md border border-gray-300 w-full focus:outline-none @error('password') border-red-500 @enderror" name="password" id="password" type="password" placeholder="Write your password" >
            @error('password') 
                <p class="text-red-500 text-sm px-3 py-1">{{$message}}</p> 
            @enderror 
        </fieldset>
        @if (session('message'))
            <p class="text-red-500 text-center text-sm px-3 py-1">{{session('message')}}</p> 
        @endif
        <fieldset class="flex">
            <button class="px-2 py-1 bg-blue-600 text-white rounded-md hover:cursor-pointer hover:bg-blue-800 transition-colors ml-auto min-w-24">Login</button>
        </fieldset>
    </form>
@endsection