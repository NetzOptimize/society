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

    public function index()
    {
        if(isset($_GET['search']))
        {
            $users = User::search($_GET['search']);
        }
        else
        {
            $users = User::orderBy('usertype_id', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        }

        return view('users.index', compact('users'));
    }


    public function create()
    {
        $usertypes = Usertype::get();

        return view('users.create', compact('usertypes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'mobile1' => 'required|unique:users,mobile1|gt:0|numeric',
            'mobile2' => 'nullable|unique:users|gt:0|numeric',
            'email' => 'nullable|unique:users|email',
            'password' => 'required|min:8',
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

        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(User $user)
    {
        $usertypes = Usertype::get();

        return view('users.edit', compact('usertypes', 'user'));
    }


    public function update(Request $request, User $user)
    {
        $user = User::findOrFail($user->id);

        $attributes = $request->validate([
            'name' => 'required|max:255|min:3',
            'mobile1' => [
                'required',
                'gt:0',
                'numeric',
                Rule::unique('users')->ignore($user),
            ],
            'mobile2' =>  [
                'nullable',
                'gt:0',
                'numeric',
                Rule::unique('users')->ignore($user),
            ],
            'email' =>  [
                'nullable','email'
            ],
            'usertype_id' => 'required'
        ]);

        $password = $request->validate([
            'password' => 'nullable',
            'confirmPassword' => 'same:password',
        ]);

        if($password['password'])
        {
            $user->update([
                'password' => Hash::make( $password['password'])
            ]);
        }

        $user->update($attributes);

        return redirect()->route('users.index')->with('success', 'User Updated Successfully');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->usertype_id == USER::ADMIN)
        {
            $count = User::where('usertype_id',1)->get()->count();
            if($count > 1)
            {
                $user->delete();
                return back()->with('success','Admin Deleted Successfully');
            }
            else
            {
                return back()->with('error','Admin Cant Delete Himself');
            }
        }
        $user->delete();

        return back()->with('success', 'User Deleted Successfully');
    }
    public function home()
    {

        return view('users.home');
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
                'numeric',
                'gt:0',
                Rule::unique('users')->ignore($user),
            ],
            'mobile2' =>  [
                'nullable',
                'numeric',
                'gt:0',
                Rule::unique('users')->ignore($user),
            ],
            'email' =>  [
                'nullable',
                'email',
                Rule::unique('users')->ignore($user),
            ],
        ]);

        $user->update($attributes);

        return redirect()->route('user.home')->with('success', 'Profile Updated Successfully');
    }
    public function report()
    {
        $months = config('global.months');

        return view('users.report',compact('months'));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('users.profile' , compact('user'));
    }
    public function adminProfile()
    {
        $user = Auth::user();

        return view('adminprofile' , compact('user'));
    }

    public function resetPassword(User $user, Request $request)
    {
        $request->validate([

            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|same:newPassword|min:8'
        ]);

        if (Hash::check($request->oldPassword, $user->password))
        {
            $user->update([

                'password' => Hash::make($request->newPassword)
            ]);

            return back()->with('success', 'Password Changed Successfully');
        }
        else
        {
            return back()->with('error', 'Current Password is Incorrect');
        }
    }
    public function forgetpassword(Request $request)
    {
        $user = User::where('mobile1', $request->mobile)->first();

        if($user)
        {
            if($user->email)
            {

                Notification::send($user, new ForgetPassword($user));

                return back()->with('success', 'Please Check Your Mail');
            }
            else
            {

                return back()->with('success', 'Please Contact Admin (XXXX XXX XXX)');

            }
        }
        else
        {
            return back()->with('success', 'Please Enter Registered Number');
        }
    }

    public function forget($id)
    {
        $user= User::where('id',$id)->first();

        return view('users/forgetpasswordcreate', compact('user'));
    }
    public function forgetstore(User $user, Request $req)
    {
        $req->validate([
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password'
        ]);

        $user->update([
            'password' => Hash::make($req->password)
        ]);

        return redirect("/")->with('success', 'Password Changed Successfully');
    }

    public function imagestore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $image_path = $request->file('image')->storeAs('public/image', 'UserImage'.time().'.jpg');

        Auth()->user()->update([
            'user_image' => $image_path
        ]);

        return back()->with('success', 'Image Updated Successfully');
    }

    public function resetcreate(User $user)
    {

        return view('reset',compact('user'));
    }


}
