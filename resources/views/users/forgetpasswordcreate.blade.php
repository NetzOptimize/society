@extends('layouts.main')
@section('content')
<form action="{{ route('forgetpassword/store',$user) }}" method="POST">
    @csrf
    <label>New Password</label>
    <input type="password" name="password">
    <label>Confirm Password</label>
    <input type="password" name="confirmpassword">
    <input type="submit" value="Submit">
</form>
@endsection
