@include('navbar')
@extends('layouts.main')
@section('content')
 
<div class="main container mt-5 w-50 shadow">

<div class="heading-add-user pt-4 pb-2 text-center mt-5 ">
    <h3>Add User</h3>
</div>
<div class="d-flex flex-column justify-content-center align-items-center  align-content-center p-3 pb-3 ">
    <form action="{{ route('user.store') }}" method="POST"   class="d-flex flex-column gap-3" style=" width:500px">
        @csrf
         <input type="textbox" name="name" placeholder="Name"  class="form-control">
        <div class="error">
        @error('name')
            {{ $message }}
        @enderror
        </div>
         <input type="tel" name="mobile1" placeholder="Enter your mobile"  class="form-control">
        <div class="error">
        @error('mobile1')
            {{ $message }}
        @enderror
        </div>

        <input type="tel" name="mobile2" placeholder="Mobile2"  class="form-control">
        <div class="error">
        @error('mobile2')
            {{ $message }}
        @enderror
        </div>

        <input type="password" name="password" placeholder="Password" class="form-control">
        <div class="error">
        @error('password')
            {{ $message }}
        @enderror
        </div>
         <input type="password" name="confirmPassword" placeholder="Confirm password" class="form-control">
        <div class="error">
        @error('confirmPassword')
            {{ $message }}
        @enderror
        </div>
         <select name="usertype_id" class="form-control">
            <option value="">Select User Type</option>
            @foreach($usertypes as $usertype)
                <option value="{{ $usertype->id }} ">{{ $usertype->role }}</option>
            @endforeach
        </select>
        <div class="error">
            @error('usertype_id')
                {{ $message }}
            @enderror
            </div>
        <div class="add-user text-center pb-3">
        <input type="submit" name="login" value="Add User" class="btn btn-dark w-100">
        </div>

    </form>
</div>
</div>
 
@endsection

