<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Society;
use App\Models\Usertype;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function home()
    {

        return view('users.home');
    }

    public function index()
    {
        $users = User::where('id','!=',1)->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $usertypes = Usertype::get();

        return view('users.create', compact('usertypes'));
    }
    public function store(Request $request){

       $request->validate([
            'name' => 'required|max:255|min:3',
            'mobile1' => 'required|unique:users,mobile1',
            'mobile2' => 'nullable|unique:users',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
            'usertype_id' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'mobile1' => $request->mobile1,
            'mobile2' => $request->mobile2,
            'usertype_id' =>  $request->usertype_id,
        ]);

        return redirect()->route('user.index')->with('success', 'user created successfully');

    }

    public function edit(User $user)
    {
        $usertypes = Usertype::get();

        return view('users.edit', compact('usertypes', 'user'));
    }

    public function update(Request $request,User $user)
    {
        $user = User::findOrFail($user->id);

        $attributes = $request->validate([
            'name' => 'required|max:255|min:3',
            'mobile1' => [
                'required',
                'nullable',
                'digits:10',
                Rule::unique('users')->ignore($user),
            ],
            'mobile2' =>  [
                'nullable',
                'digits:10',
                Rule::unique('users')->ignore($user),
            ],
            'usertype_id' => 'required'
        ]);

        $user->update($attributes);

        return redirect()->route('user.index')->with('success', 'user updated successfully');

    }

    public function delete(User $user)
    {

        $user->delete();

        return back()->with('success', 'user deleted successfully');
    }

    public function profile()
    {
        $usertypes = Usertype::get();

        $user = Auth::user();

        return view('users.profileEdit', compact('user', 'usertypes'));
    }

    public function profileupdate(Request $request, User $user)
    {

        $user = User::findOrFail($user->id);

        $attributes = $request->validate([
            'name' => 'required|max:255|min:3',
            'mobile1' => [
                'required',
                'nullable',
                'digits:10',
                Rule::unique('users')->ignore($user),
            ],
            'mobile2' =>  [
                'nullable',
                'digits:10',
                Rule::unique('users')->ignore($user),
            ],
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        $user->update($attributes);

        return redirect()->route('user.home')->with('success', 'profile updated successfully');
    }
    public function report()
    {
        $months = [
            'init'=> 'INITIAL PAYMENT', '2023-01-01' => 'January', '2023-02-01'=> 'February', '2023-03-01' => 'March', '2023-04-01'=> 'April', '2023-05-01' => 'May', '2023-06-01' => 'June', '2023-07-01' =>'July', '2023-08-01' => 'August', '2023-09-01' => 'September', '2023-10-01' => 'October', '2023-11-01' => 'November', '2023-12-01' => 'December'
        ];

        return view('users.report',compact('months'));
    }

}

