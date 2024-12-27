<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('Auth.login');
    }

    public function register_view()
    {
        return view('Auth.register');
    }

    public function login_store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Si no se autentica
        if(!auth()->attempt($request->only('email','password'))){
            return back()->with('message', 'Email or password are incorrect!');
        }

        return redirect()->route('welcome')->with('success', 'Welcome Back!');

    }

    public function register_store(Request $request)
    {
        // Validar
        $this->validate($request,[ 
            'name' => 'required|string|max:50', 
            'email' => 'required|unique:users|email', 
            'password' => 'required|min:8',
        ]); 
        // Crear 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); 
        // Autenticar un usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('welcome')->with('success', 'Welcome!');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

}
