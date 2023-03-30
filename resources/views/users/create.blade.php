@include('navbar')
@extends('layouts.main')
@section('content')
<div class="d-flex flex-column justify-content-center align-items-center align-content-center p-5">
    <form action="{{ route('user.store') }}" method="POST"   class="d-flex flex-column gap-3" style=" width:500px">
        @csrf
        <label>* NAME</label>
        <input type="textbox" name="name" placeholder="Enter your name"  class="form-control">
        <div class="error">
        @error('name')
            {{ $message }}
        @enderror
        </div>
        <label>EMAIL</label>
        <input type="email" name="email" placeholder="Enter your email"  class="form-control">
        <div class="error">
        @error('email')
            {{ $message }}
        @enderror
        </div>
        <label>* MOBILE 1</label>
        <input type="tel" name="mobile1" placeholder="Enter your mobile"  class="form-control">
        <div class="error">
        @error('mobile1')
            {{ $message }}
        @enderror
        </div>
        <label> MOBILE 2</label>
        <input type="tel" name="mobile2" placeholder="Enter your mobile 2"  class="form-control">
        <div class="error">
        @error('mobile2')
            {{ $message }}
        @enderror
        </div>
        <label>* PASSWORD</label>
        <input type="password" name="password" placeholder="Enter your password" class="form-control">
        <div class="error">
        @error('password')
            {{ $message }}
        @enderror
        </div>
        <label>* CONFIRM-PASSWORD</label>
        <input type="password" name="confirmPassword" placeholder="Enter your Confirm password" class="form-control">
        <div class="error">
        @error('confirmPassword')
            {{ $message }}
        @enderror
        </div>
        <label>* USER TYPE</label>
        <select name="usertype_id" class="form-control">
            @foreach($usertypes as $usertype)
                <option value="{{ $usertype->id }} ">{{ $usertype->role }}</option>
            @endforeach
        </select>
        <div class="add-user">
        <input type="submit" name="login" value="Add User" class="btn btn-secondary">
        </div>
    
    </form>
</div> 
@endsection

