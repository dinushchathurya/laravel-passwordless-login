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

    /* function to register user */
    public function register(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users',
        ]);

        $token = Str::random(30);

        $user = new User;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->email_verified = '0';
        $user->token = $token;
        $user->save();

        Mail::to($input['email'])->send(new RegisterMail($token));

        return redirect()->back()->with(
            'success', 
            'Verification mail sent, please check your inbox.'
        );
    }
    
}
