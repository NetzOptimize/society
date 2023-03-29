@extends('layouts.main')
@section('content')
    <div style="height:100vh" class="d-flex flex-column justify-content-center align-items-center align-content-center">
        <form action="{{ route('login.check') }}" method="POST" class="d-flex flex-column gap-3" style=" width:500px" >
            @csrf
            <label>MOBILE</label>
            <input type="tel" name="mobile1" placeholder="enter your mobile">
            <div class="error">
            @error('mobile1')
                {{ $message }}
            @enderror
            </div>
            <label>PASSWORD</label>
            <input type="password" name="password" placeholder="enter your password">
            <div class="error">
            @error('password')
                {{ $message }}
            @enderror
            </div>
            <input type="submit" name="login" value="LOGIN" class="btn btn-info">
        </form>
    </div>
@endsection
