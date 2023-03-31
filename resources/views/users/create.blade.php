@include('navbar')
@extends('layouts.main')
@section('content')

<div class="heading-add-user p-4 bg-light text-center mt-4">
    <h3>Add User</h3>
</div>
<div class="d-flex flex-column justify-content-center align-items-center align-content-center p-5">
    <form action="{{ route('user.store') }}" method="POST"   class="d-flex flex-column gap-3" style=" width:500px">
        @csrf
         <input type="textbox" name="name" placeholder="Name"  class="form-control">
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
            @foreach($usertypes as $usertype)
                <option value="{{ $usertype->id }} ">{{ $usertype->role }}</option>
            @endforeach
        </select>
        <div class="add-user text-center">
        <input type="submit" name="login" value="Add User" class="btn btn-primary">
        </div>
    
    </form>
</div> 
@endsection

