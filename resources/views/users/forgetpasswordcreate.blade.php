@extends('layouts.main')
@section('content')
<form action="{{ route('forgetpassword.store',$user) }}" method="POST">
    @csrf
    <label>New Password</label>
    <input type="password" name="password">
    @error('password')
        {{ $message }}
    @enderror
    <label>Confirm Password</label>
    <input type="password" name="confirmPassword">
    @error('confirmPassword')
        {{ $message }}
    @enderror
    <input type="submit" value="Submit">
</form>
@endsection
