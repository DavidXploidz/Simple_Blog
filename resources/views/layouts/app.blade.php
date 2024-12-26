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
        <nav class="h-20 border-b-2 shadow-sm bg-gray-200 flex items-center justify-between">
            <a href="">Logo</a>
            <div>
                <a href="">Home</a>
                <a href="">Blogs</a>
                <a href="">Contact</a>
                <a href="">Publicaciones</a>
            </div>
        </nav>
        @yield('content')
    </body>
</html>
