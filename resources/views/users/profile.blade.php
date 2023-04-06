@include('navbar')
@extends('layouts.main')
@section('content')

<pre>
Name {{$user->name }}
Mobile1 {{ $user->mobile1}}
Mobile2 {{ $user->mobile2 }}

RESET ACCOUNT PASSWORD
</pre>
<form action="{{ route('user.resetpassword', $user) }}" method="POST">
    @csrf
    <label>Current Password</label>
    <input type="password" name="oldpassword">
    @error('oldpassword')
        {{ $message }}
    @enderror
    <label>New Password</label>
    <input type="password" name="newpassword">
    @error('newpassword')
        {{ $message }}
    @enderror
    <label>Confirm Password</label>
    <input type="password" name="confirmPassword">
    @error('confirmPassword')
        {{ $message }}
    @enderror
    <input type="submit" name="submit" value="Reset Password">
</form>
@endsection
