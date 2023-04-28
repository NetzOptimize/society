
@include('users.navbar')
@extends('layouts.mainWithoutNav')
@section('title')
Society User-Profile-Edit
@endsection
@section('content')
<div class="d-flex flex-column justify-content-center align-items-center align-content-center justify-content-center w-100" id="main-user" >


    <form action="{{ route('user.profile.update', $user) }}" method="POST"  class="d-flex flex-column gap-3 shadow p-4 bg-white rounded w-50" id="user-form">
        @csrf
        <div class="user-hedaing">
    <h3>Edit Profile</h3>
</div>
        <label>Name:</label>
        <input type="textbox" name="name" value="{{ $user->name }}" value="{{ old('name') }}" class="form-control">
        <div class="error">
        @error('name')
            {{ $message }}
        @enderror
        </div>
        <label>Mobile-1:</label>
        <input type="tel" name="mobile1" value="{{ $user->mobile1 }}" value="{{ old('mobile1') }}" class="form-control">
        <div class="error">
        @error('mobile1')
            {{ $message }}
        @enderror
        </div>
        <label>Mobile-2:</label>
        <input type="tel" name="mobile2" value="{{ $user->mobile2 }}" value="{{ old('mobile2') }}" class="form-control">
        <div class="error">
        @error('mobile2')
            {{ $message }}
        @enderror
        </div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" value="{{ old('email') }}" class="form-control">
        <div class="error">
        @error('email')
            {{ $message }}
        @enderror
        </div>
        <label>User-Type:</label>
        <select name="usertype_id"  class="form-control">
            @foreach ($usertypes as $usertype)
                @if ($user->usertype_id == $usertype->id)
                    <option value="{{ $usertype->id }}" selected  readonly>{{ $usertype->role }}</option>
                @endif
            @endforeach
        </select>
        <div class="error">
        @error('usertype_id')
            {{ $message }}
        @enderror
        </div>
        <input type="submit" name="login" value="Save Changes" class="btn btn-dark">
    </form>
@endsection
