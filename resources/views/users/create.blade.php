@include('navbar')
@extends('layouts.main')
@section('content')
<div style="height:100vh" class="d-flex flex-column justify-content-center align-items-center align-content-center">
    <form action="{{ route('user.store') }}" method="POST"   class="d-flex flex-column gap-3" style=" width:500px">
        @csrf
        <label>* NAME</label>
        <input type="textbox" name="name" placeholder="enter your name">
        <div class="error">
        @error('name')
            {{ $message }}
        @enderror
        </div>
        <label>* MOBILE 1</label>
        <input type="tel" name="mobile1" placeholder="enter your mobile">
        <div class="error">
        @error('mobile1')
            {{ $message }}
        @enderror
        </div>
        <label> MOBILE 2</label>
        <input type="tel" name="mobile2" placeholder="enter your mobile 2">
        <div class="error">
        @error('mobile2')
            {{ $message }}
        @enderror
        </div>
        <label>* PASSWORD</label>
        <input type="password" name="password" placeholder="enter your password">
        <div class="error">
        @error('password')
            {{ $message }}
        @enderror
        </div>
        <label>* CONFIRM-PASSWORD</label>
        <input type="password" name="confirmPassword" placeholder="enter your password">
        <div class="error">
        @error('confirmPassword')
            {{ $message }}
        @enderror
        </div>
        <label>* USER TYPE</label>
        <select name="usertype_id">
            @foreach($usertypes as $usertype)
                <option value="{{ $usertype->id }} ">{{ $usertype->role }}</option>
            @endforeach
        </select>
        <input type="submit" name="login" value="Add User" class="btn btn-secondary">
    </form>
</div>
@endsection

