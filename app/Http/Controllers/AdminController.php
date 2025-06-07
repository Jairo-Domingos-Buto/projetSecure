<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function loginAdmin()
    {
        return view('loginAdmin');
    }

public function dashboard()
{
    // Renderiza a view dashboard e inclui a view conteudo como filha
    return view('Admin.dashboard');
}
}
