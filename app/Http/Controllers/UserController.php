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
use Illuminate\Support\Facades\Notification;
use App\Notifications\ForgetPassword;

class UserController extends Controller
{

    public function home()
    {

        return view('users.home');
    }

    public function index()
    {
        $users = User::orderBy('usertype_id', 'asc')
        ->orderBy('name', 'asc')
        ->get();

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
            'email' => 'nullable|unique:users',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
            'usertype_id' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'mobile1' => $request->mobile1,
            'mobile2' => $request->mobile2,
            'email' => $request->email,
            'usertype_id' =>  $request->usertype_id,
        ]);

        return redirect()->route('user.index')->with('success', 'User Created Successfully');

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
                Rule::unique('users')->ignore($user),
            ],
            'mobile2' =>  [
                'nullable',
                Rule::unique('users')->ignore($user),
            ],
            'email' =>  [
                'nullable',
            ],
            'usertype_id' => 'required'
        ]);


        $user->update($attributes);

        return redirect()->route('user.index')->with('success', 'User Updated Successfully');

    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if($user->usertype_id ==1)
        {
            $count = User::where('usertype_id',1)->get()->count();
            if($count > 1)
            {
                $user->delete();
            }
            else
            {
                return back()->with('success','Admin Cant Delete Himself');
            }
        }
        $user->delete();

        return back()->with('success', 'User Deleted Successfully');
    }

    public function profileEdit()
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
                Rule::unique('users')->ignore($user),
            ],
            'mobile2' =>  [
                'nullable',
                Rule::unique('users')->ignore($user),
            ],
            'email' =>  [
                'nullable',
                Rule::unique('users')->ignore($user),
            ],
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        $user->update($attributes);

        return redirect()->route('user.home')->with('success', 'Profile Updated Successfully');
    }
    public function report()
    {
        $months = [
            'init'=> 'INITIAL PAYMENT', '2023-01-01' => 'January', '2023-02-01'=> 'February', '2023-03-01' => 'March', '2023-04-01'=> 'April', '2023-05-01' => 'May', '2023-06-01' => 'June', '2023-07-01' =>'July', '2023-08-01' => 'August', '2023-09-01' => 'September', '2023-10-01' => 'October', '2023-11-01' => 'November', '2023-12-01' => 'December'
        ];

        return view('users.report',compact('months'));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('users.profile' , compact('user'));
    }

    public function resetPassword(User $user, Request $request)
    {
        $request->validate([

            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword'
        ]);

        if (Hash::check($request->oldpassword, $user->password))
        {
            $user->update([

                'password' => Hash::make($request->newpassword)
            ]);

            return back()->with('success', 'Password Changed Successfully');
        }
        else
        {
            return back()->with('success', 'Current Password is Incorrect');
        }
    }

}

