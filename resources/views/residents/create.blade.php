@include('navbar')
@extends('layouts.main')
@section('content')

<div class="main  bg-light container   rounded mt-5 p-4  " >
<div class="resident-create text-center">
    <h3>Get Your House No.</h3>
</div>
<div class="d-flex flex-column justify-content-center align-items-center align-content-center pt-4  pb-4 ">
    <form action="{{ route('resident.store') }}" method="POST"  class="d-flex flex-column gap-3" style=" width:500px">
        @csrf
        <label>House No.</label>
        <select name="house_id" class="form-control">
            <option value="">Select House Number</option>
            @foreach ($houses as $house)
                <option value="{{ $house->id }} ">{{ $house->full_address }}</option>
            @endforeach
        </select>
        <div class="error">
        @error('house_id')
            {{ $message }}
        @enderror
        </div>
        <label>User</label>
        <select name="user_id" class="form-control">
            <option value="">Select User</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }} ">{{ $user->name }}</option>
            @endforeach
        </select>
        <div class="error">
        @error('user_id')
            {{ $message }}
        @enderror
        </div>
        <label>Occupancy Type</label>
        <select name="isOwner" class="form-control">
            <option value="1">Owner</option>
            <option value="0">Tenant</option>
        </select>
        <div class="error" class="form-control" >
        @error('isOwner')
            {{ $message }}
        @enderror
        </div>
        <label>Date Of Occupancy</label>
        <input type="date" name="datofoccupancy" value={{ now() }} class="form-control" >
        <div class="error">
        @error('datofoccupancy')
            {{ $message }}
        @enderror
        </div>
        <input type="submit" name="login" value="Add Resident" class="btn btn-dark">
    </form>
</div>
</div>
@endsection
