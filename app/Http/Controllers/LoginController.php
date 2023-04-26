<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        $credentials = $req->only('mobile1', 'password');

        if (Auth::attempt($credentials))
        {
            return redirect('/');
        }
        return redirect('/')->with('error','Incorrect Password' );
    }

    public function logout(Request $request)
    {

        $request->session()->put('logged_out', true);

        Auth::logout();

        return redirect('/');
    }
}
