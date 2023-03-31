@include('navbar')
@extends('layouts.main')
@section('content')
<div class="d-flex flex-column justify-content-center align-items-center align-content-center p-5">
    <form action="{{ route('resident.store') }}" method="POST"  class="d-flex flex-column gap-3" style=" width:500px">
        @csrf
        <label>HOUSE NO.</label>
        <select name="house_id" class="form-control">
            <option value="">Select House Number</option>
            @foreach ($houses as $house)
                @php
                    $address = $house->Block1 . $house->Block2 . $house->house_no;
                @endphp
                <option value="{{ $house->id }} ">{{ $address }}</option>
            @endforeach
        </select>
        <div class="error">
        @error('house_id')
            {{ $message }}
        @enderror
        </div>
        <label>USER</label>
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
        <label>OCCUPANCY TYPE</label>
        <select name="isOwner" class="form-control">
                <option  value="">Select Occupancy Type</option>
                <option value="1">OWNER</option>
                <option value="0">TENANT</option>
        </select>
        <div class="error" class="form-control" >
        @error('isOwner')
            {{ $message }}
        @enderror
        </div>
        <label>DATE OF OCCUPANCY</label>
        <input type="date" name="datofoccupancy" class="form-control">
        <div class="error">
        @error('datofoccupancy')
            {{ $message }}
        @enderror
        </div>
        <input type="submit" name="login" value="ADD RESIDENT" class="btn btn-dark">
    </form>
</div>
@endsection
