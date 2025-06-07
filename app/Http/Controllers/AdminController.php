<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('auth.login');
    }

  public function dashboard()
    {
       return view('Admin.dashboard');

    }
}
