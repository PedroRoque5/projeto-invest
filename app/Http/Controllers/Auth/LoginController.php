<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'Email ou senha incorretos.',
        ])->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout(); // encerra a sessão
        $request->session()->invalidate(); // invalida sessão
        $request->session()->regenerateToken(); // novo token CSRF

        return redirect('/login'); // redireciona para login
    }
}
