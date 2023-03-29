@include('navbar')
@extends('layouts.main')
@section('content')
<div style="height:100vh" class="d-flex flex-column justify-content-center align-items-center align-content-center">
    <form action="{{ route('user.update', $user) }}" method="POST"  class="d-flex flex-column gap-3" style=" width:500px">
        @csrf
        <label>NAME</label>
        <input type="textbox" name="name" value="{{ $user->name }}" value="{{ old('name') }}">
        <div class="error">
        @error('name')
            {{ $message }}
        @enderror
        </div>
        <label>EMAIL</label>
        <input type="email" name="email" value="{{ $user->email }}" value="{{ old('email') }}">
        <div class="error">
        @error('email')
            {{ $message }}
        @enderror
        </div>
        <label>MOBILE-1</label>
        <input type="tel" name="mobile1" value="{{ $user->mobile1 }}" value="{{ old('mobile1') }}">
        <div class="error">
        @error('mobile1')
            {{ $message }}
        @enderror
        </div>
        <label>MOBILE-2</label>
        <input type="tel" name="mobile2" value="{{ $user->mobile2 }}" value="{{ old('mobile2') }}">
        <div class="error">
        @error('mobile2')
            {{ $message }}
        @enderror
        </div>

        <label>USER-TYPE</label>
        <select name="usertype_id">
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
        <input type="submit" name="login" value="EDIT USER" class="btn btn-secondary">
    </form>
@endsection
