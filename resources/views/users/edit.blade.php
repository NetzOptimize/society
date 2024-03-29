
@extends('layouts.main')
@section('title')
Society Edit User
@endsection
@section('content')
<div class="main-edit">

<div  class="d-flex flex-column justify-content-center align-items-center container shadow w-50" id="edit">
<div class="heading-edit mt-3 d-flex justify-content-start w-100 rounded" id="heading-edit">
    <h3 id="user-heading" class="p-3 rounded">
        <img src="{{asset('resume.png')}}" id="edit_img" alt="">
        Edit Your Profile
    </h3>
</div>

    <form action="{{ route('users.update', $user) }}" method="POST"  class="d-flex flex-column pt-4 gap-3 pb-4 fw-bold" id="edit-user">
        @csrf
        @method('PUT')
        <label>NAME</label>
        <input type="textbox" name="name"  value="{{ old('name', $user->name) }}" class="form-control">
        <div class="error">
        @error('name')
            {{ $message }}
        @enderror
        </div>
        <label>MOBILE-1</label>
        <input type="tel" name="mobile1"  value="{{ old('mobile1', $user->mobile1) }}" class="form-control">
        <div class="error">
        @error('mobile1')
            {{ $message }}
        @enderror
        </div>
        <label>MOBILE-2</label>
        <input type="tel" name="mobile2"  value="{{ old('mobile2', $user->mobile2 ) }}" class="form-control">
        <div class="error">
        @error('mobile2')
            {{ $message }}
        @enderror
        </div>
        <label>EMAIL</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email)}}">
        <div class="error">
        @error('email')
            {{ $message }}
        @enderror
        </div>
        <label>PASSWORD</label>
        <input type="password" name="password"  class="form-control">
        <div class="error">
        @error('password')
            {{ $message }}
        @enderror
        </div>
        <label>CONFIRM-PASSWORD</label>
         <input type="password" name="confirmPassword"  class="form-control">
        <div class="error">
        @error('confirmPassword')
            {{ $message }}
        @enderror
        </div>
        <label>USER-TYPE</label>
        <select name="usertype_id" class="form-control user-type1">
            @foreach ($usertypes as $usertype)
                @if ($user->usertype_id == $usertype->id)
                    <option value="{{ $usertype->id }}" selected>{{ $usertype->role }}</option>
                @else
                    <option value="{{ $usertype->id }} ">{{ $usertype->role }}</option>
                @endif
            @endforeach
        </select>
        <div class="error">
        @error('usertype_id')
            {{ $message }}
        @enderror
        </div>
        <input type="submit" name="login" value="Edit User" class="btn btn-dark ">
    </form>
@endsection
</div>
