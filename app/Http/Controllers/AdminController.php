<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

  public function home()
    {
       return view('home');

    }
}
