<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-50">
        <div class="bg-gray-200 h-20 border-b-2 shadow-sm flex items-center">
            <nav class="flex items-center justify-between w-full container mx-auto px-4">
                <a href="">Logo</a>
                <div class="flex items-center gap-5">
                    <a href="{{route('welcome')}}">Home</a>
                    <a href="">Blogs</a>
                    <a href="">Contact</a>
                    <a href="{{route('post.index')}}">My Posts</a>
                </div>
            </nav>
        </div>
        @yield('content')
    </body>
</html>
