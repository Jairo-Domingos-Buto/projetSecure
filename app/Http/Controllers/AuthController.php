<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

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

        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
