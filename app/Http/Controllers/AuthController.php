<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // Tentativa de login
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Verifica se é admin
            if ($user->role !== 'admin') {
                Auth::logout();
                return back()->withErrors(['email' => 'Apenas administradores podem acessar.']);
            }

            return redirect()->intended('/home');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.'])->withInput($request->except('password'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
