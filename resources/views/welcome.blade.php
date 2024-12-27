@extends('layouts.app')

@section('content')
    <x-title :text="'Recent Posts'"/>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (auth()->check())
        <p>¡Bienvenido, {{ auth()->user()->name }}!</p>
    @else
        <p>Debes iniciar sesión.</p>
    @endif
@endsection