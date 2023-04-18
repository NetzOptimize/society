
@extends('layouts.main')
@section('title')
Society Edit Resident
@endsection
@section('content')
<div class="resident-edit">
<div  class="d-flex flex-column shadow w-50 container justify-content-center align-items-center align-content-center pb-3" id="resident-edit">
<div class="edit-resident mt-3 w-100 rounded">
    <h3 class="gap-2 p-3 rounded" id="resident-heading"> <img src="{{asset('house-add.png')}}" alt="" style="height:60px; width:60px;"> Edit Your Resident</h3>
</div>
    <div  class="d-flex flex-column justify-content-center align-items-center align-content-center edit1">
        <form action="{{ route('residents.update', $resident) }}" method="POST" class="d-flex flex-column gap-3 mt-3 pb-3 fw-bold"
            id="edit-resident-form">
            @csrf
            @method('PUT')
            <label>House No.</label>
            <select name="house_id" class="form-select cursor-resident">
                <option value="">Select House Number</option>
                @foreach ($houses as $house)
                    @if ($house->id == $resident->house_id)
                        <option value="{{ $house->id }}" selected>{{ $house->full_address }}</option>
                    @else
                        <option value="{{ $house->id }} ">{{ $house->full_address }}</option>
                    @endif
                @endforeach
            </select>
            <div class="error">
                @error('house_id')
                    {{ $message }}
                @enderror
            </div>

            <label>User</label>
            <select name="user_id" class="form-select cursor-resident">
                <option></option>
                @foreach ($users as $user)
                    @if ($user->id == $resident->user_id)
                        <option value="{{ $user->id }}" selected>{{ $user->name }} - {{ $user->mobile1 ? $user->mobile1 : 'Not Provided' }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->mobile1 ? $user->mobile1 : 'Not Provided' }}</option>
                    @endif
                @endforeach
            </select>
            <div class="error">
                @error('user_id')
                    {{ $message }}
                @enderror
            </div>
            <label>Occupancy Type</label>
            <select name="isOwner" class="form-select cursor-resident">
                @foreach ($occupancyTypes as $key => $occupancytype)
                    @if ($key == $resident->isOwner)
                        <option value="{{ $key }}" selected>{{ $occupancytype }}</option>
                    @else
                        <option value="{{ $key }}">{{ $occupancytype }}</option>
                    @endif
                @endforeach
            </select>
            <div class="error">
                @error('isOwner')
                    {{ $message }}
                @enderror
            </div>
            <label>Date Of Occupancy</label>
            <input type="date" name="datofoccupancy" class="form-control"
                value="{{ date('Y-m-d', strtotime($resident->datofoccupancy)) }}">
            <div class="error">
                @error('datofoccupancy')
                    {{ $message }}
                @enderror
            </div>
            <input type="submit" name="login" value="EDIT RESIDENT" class="btn btn-dark">
        </form>
    </div>
@endsection
</div>
