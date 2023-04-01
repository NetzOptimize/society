@include('navbar')
@extends('layouts.main')
@section('content')

<div  class="d-flex flex-column shadow w-50 container justify-content-center align-items-center align-content-center" id="resident-edit">
<div class="edit-resident pt-4">
    <h3 class=" d-flex align-items-center gap-2"> <img src="{{asset('house-add.png')}}" alt="" style="height:60px; width:60px;"> Edit Your Resident</h3>
</div>
    <form action="{{ route('resident.update', $resident)}}" method="POST"  class="d-flex flex-column gap-3 w-50 pb-4" >
        @csrf
        <label>House</label>
        <input type="textbox" value="{{ $address }}" class="form-control" readonly >
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
        <input type="textbox" name=isOwner value="OWNER" class="form-control" readonly>
        <label>Date Of Occupancy</label>
        <input type="date" name="datofoccupancy" class="form-control" value="{{ $resident->datofoccupancy}}">
        <div class="error">
        @error('datofoccupancy')
            {{ $message }}
        @enderror
        </div>
        <input type="submit" name="login" value="EDIT RESIDENT" class="btn btn-dark">
    </form>
</div>
@endsection
