<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    
    public function profile()
    {
        return view('auth.profile');
    }

   
}
