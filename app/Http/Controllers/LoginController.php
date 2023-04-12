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
            $user = User::where('mobile1', $req['mobile1'])->first();
            if($user->usertype_id == User::ADMIN)
            {
                return redirect('home')->with('success', 'Welcome Admin');
            }
            elseif($user->usertype_id == User::RESIDENT)
            {
                return redirect()->route('user.home')
                ->with('success', 'Welcome Resident');
            }
            else
            {
                return redirect('home')
                ->with('success', 'Welcome Moderator');
            }
        }
        return redirect('/')->with('error','Incorrect Password' );
    }

    public function logout()
    {

        Auth::logout();

        return redirect('/');
    }
}
