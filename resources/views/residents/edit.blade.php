@include('navbar')
@extends('layouts.main')
@section('content')
<div  class="d-flex flex-column shadow w-50 container justify-content-center align-items-center align-content-center" id="resident-edit">
<div class="edit-resident pt-4">
    <h3 class=" d-flex align-items-center gap-2"> <img src="{{asset('house-add.png')}}" alt="" style="height:60px; width:60px;"> Edit Your Resident</h3>
</div>
    <div style="height:70vh" class="d-flex flex-column justify-content-center align-items-center align-content-center">
        <form action="{{ route('resident.update', $resident) }}" method="POST" class="d-flex flex-column gap-3"
            style=" width:500px">
            @csrf
            <label>House No.</label>
            <select name="house_id" class="form-control">
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
            <select name="user_id" class="form-control">
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
            <label>Occupancy Type</label>
            <select name="isOwner" class="form-control">
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
            <label>DATE OF OCCUPANCY</label>
            <input type="date" name="datofoccupancy" class="form-control"
                value="{{ date('Y-m-d', strtotime($resident->datofoccupancy)) }}">
            <div class="error">
                @error('datofoccupancy')
                    {{ $message }}
                @enderror
            </div>
            <input type="submit" name="login" value="EDIT RESIDENT" class="btn btn-primary">
        </form>
    </div>
@endsection
