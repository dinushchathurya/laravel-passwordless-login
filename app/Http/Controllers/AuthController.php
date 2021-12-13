<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\Mail\LoginMail;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'dashboard']);
        $this->middleware('auth')->only(['logout', 'dashboard']);
    }

    /* function show register form */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

}
