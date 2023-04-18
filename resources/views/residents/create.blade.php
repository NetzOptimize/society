
@extends('layouts.main')
@section('title')
Society Create Resident
@endsection
@section('content')
<div class="main-resident-create">
<div class="main-create d-flex justify-content-center align-items-center">
<div class="main container shadow  rounded  p-4 w-50" id="create-resident">
<div class="resident-create justify-content-start p-3 rounded" id="get-house">
    <h3 class="d-flex justify-content-start align-items-center gap-2"> <img src="{{asset('keys.jpg')}}" alt="" class="rounded-pill" id="keys"> Get Your House No.</h3>
</div>
<div class="d-flex flex-column justify-content-center align-items-center align-content-center pt-4   ">
    <form action="{{ route('residents.store') }}" method="POST"  class="d-flex flex-column gap-3 fw-bold" id="resident-create-form">
        @csrf
        <input type="text" name="house" value="{{ $id }}" hidden>
        <label>House No.</label>
        <select name="house_id" class="form-select cursor-resident-create">
            @if($id)
                @foreach ($houses as $house)
                    @if($house->id == $id)
                        <option value="{{ $house->id }} " selected>{{ $house->full_address }}</option>
                    @endif
                @endforeach
            @else
                <option value="">Select House Number</option>
                @foreach ($houses as $house)
                    <option value="{{ $house->id }} ">{{ $house->full_address }}</option>
                @endforeach
            @endif
        </select>
        <div class="error">
        @error('house_id')
            {{ $message }}
        @enderror
        </div>
        <label>User</label>
        <select name="user_id" class="form-select cursor-resident-create">
            <option value="">Select User</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }} ">{{ $user->name }} - {{ $user->mobile1 ? $user->mobile1 : 'Not Provided' }}</option>
            @endforeach
        </select>
        <div class="error">
        @error('user_id')
            {{ $message }}
        @enderror
        </div>
        <label>Occupancy Type</label>
        <select name="isOwner" class="form-select cursor-resident-create">
            <option value="1">Owner</option>
            <option value="0">Tenant</option>
        </select>
        <div class="error" >
        @error('isOwner')
            {{ $message }}
        @enderror
        </div>
        <label>Date Of Occupancy</label>
        <input type="date" name="datofoccupancy" value={{now()}} class="form-control" >
        <div class="error">
        @error('datofoccupancy')
            {{ $message }}
        @enderror
        </div>
        <input type="submit" name="login" value="Add Resident" class="btn btn-dark">
    </form>
</div>
</div>
 </div>
@endsection
</div>
