@include('navbar')
@extends('layouts.main')
@section('content')
<div style="height:100vh" class="d-flex flex-column justify-content-center align-items-center align-content-center">

    <form action="{{ route('resident.update', $resident) }}" method="POST"  class="d-flex flex-column gap-3" style=" width:500px">
        @csrf
        <label>HOUSE</label>
        <input type="textbox" value="{{ $address }}" readonly>

        <label>USER</label>
        <select name="user_id">
            <option></option>
            @foreach ($users as $user)
                @if ($user->id == $resident->user_id)
                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                @else
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>
        <div class="error">
        @error('user_id')
            {{ $message }}
        @enderror
        </div>
        <label>OCCUPANCY TYPE</label>
        <input type="textbox" name=isOwner value="OWNER" readonly>

        <label>DATE OF OCCUPANCY</label>
        <input type="date" name="datofoccupancy" value="{{ $resident->datofoccupancy}}">
        <div class="error">
        @error('datofoccupancy')
            {{ $message }}
        @enderror
        </div>
        <input type="submit" name="login" value="EDIT RESIDENT" class="btn btn-secondary">
    </form>
</div>
@endsection
