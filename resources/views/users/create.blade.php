@include('navbar')
@extends('layouts.main')
@section('content')

<div class="d-flex justify-content-center align-items-center " id="add-user-position">
<div class="main container w-50 shadow" id="add-user">

<div class="heading-add-user pt-3 pb-2 text-center ">
    <div class="add-user-image d-flex justify-content-start align-items-center p-3 rounded" id="add-user-logo">
        <div class="add-user-image1">        <img src="{{asset('addimg.png')}}" style="height:70px; width:70px" alt="">
</div>
    <h3>Add User</h3>
</div>
<div class="d-flex flex-column justify-content-center align-items-center p-3 pb-3 ">
    <form action="{{ route('user.store') }}" method="POST"   class="d-flex flex-column gap-3" id="user-create" >
        @csrf
          <input type="textbox" name="name" placeholder="Name"  class="form-control" value={{ old('name')}}>
        <div class="error">
        @error('name')
            {{ $message }}
        @enderror
        </div>
          <input type="tel" name="mobile1" placeholder="Enter your mobile"  class="form-control" value={{ old('mobile1')}}>
        <div class="error">
        @error('mobile1')
            {{ $message }}
        @enderror
        </div>

        <input type="tel" name="mobile2" placeholder="Mobile2"  class="form-control" value={{ old('mobile2')}}>
        <div class="error">
        @error('mobile2')
            {{ $message }}
        @enderror
        </div>
        <input type="email" name="email" placeholder="Email"  class="form-control" value={{ old('email')}}>
        <div class="error">
        @error('email')
            {{ $message }}
        @enderror
        </div>
        <input type="password" name="password" placeholder="Password" class="form-control" value={{ old('password')}}>
        <div class="error">
        @error('password')
            {{ $message }}
        @enderror
        </div>
         <input type="password" name="confirmPassword" placeholder="Confirm password" class="form-control" value={{ old('confirmPassword')}}>
        <div class="error">
        @error('confirmPassword')
            {{ $message }}
        @enderror
        </div>
         <select name="usertype_id" class="form-control user-cursor" value={{ old('usertype_id')}}>
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
</div>
@endsection

