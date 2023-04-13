
@extends('layouts.main')
@section('title')
Society User-Profile-Edit
@endsection
@section('content')
<div class="d-flex flex-column justify-content-center align-items-center align-content-center pt-4 " >
    <form action="{{ route('user.profile.update', $user) }}" method="POST"  class="d-flex flex-column gap-3" style=" width:500px">
        @csrf
        <label>NAME</label>
        <input type="textbox" name="name" value="{{ $user->name }}" value="{{ old('name') }}" class="form-control">
        <div class="error">
        @error('name')
            {{ $message }}
        @enderror
        </div>
        <label>MOBILE-1</label>
        <input type="tel" name="mobile1" value="{{ $user->mobile1 }}" value="{{ old('mobile1') }}" class="form-control">
        <div class="error">
        @error('mobile1')
            {{ $message }}
        @enderror
        </div>
        <label>MOBILE-2</label>
        <input type="tel" name="mobile2" value="{{ $user->mobile2 }}" value="{{ old('mobile2') }}" class="form-control">
        <div class="error">
        @error('mobile2')
            {{ $message }}
        @enderror
        </div>
        <label>EMAIL</label>
        <input type="email" name="email" value="{{ $user->email }}" value="{{ old('email') }}" class="form-control">
        <div class="error">
        @error('email')
            {{ $message }}
        @enderror
        </div>
        <label>PASSWORD</label>
        <input type="password" name="password" value="{{ $user->password }}" class="form-control">
        <div class="error">
        @error('password')
            {{ $message }}
        @enderror
        </div>
        <label>CONFIRM-PASSWORD</label>
        <input type="password" name="confirmPassword" value="{{ $user->password }}" class="form-control">
        <div class="error">
        @error('confirmPassword')
            {{ $message }}
        @enderror
        </div>
        <label>USER-TYPE</label>
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
        <input type="submit" name="login" value="EDIT PROFILE" class="btn btn-primary">
    </form>
@endsection
