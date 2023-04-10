@extends('layouts.main')
@section('content')


<form action="{{ route('forgetpassword') }}" method="POST">
    @csrf
    <input type="text" name="mobile">
    <input type="submit" value="Forget Password">
</form>
@endsection
