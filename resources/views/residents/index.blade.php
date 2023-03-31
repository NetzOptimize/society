@include('navbar')
@extends('layouts.main')
@section('content')

<div class="heading-resident text-center bg-light me-5 ms-5  rounded mt-3  p-4">
    <h3>List Of Residents</h3>
</div>
<div class="resident-create mt-3 p-3 me-5 d-flex justify-content-end">
<a href="{{ route('resident.create') }}" class="btn btn-success d-flex align-items-center"> Add Resident  <img src="{{'house.png'}}" style="width:20px" alt="" class="ms-2"></a>
</div>

<div class="table-resident table-hover table-bordered align-middle ps-5 pe-5 pt-4">
    <table class="table table-light table-hover table-borderd align-middle">
        <tr class="text-center  table-dark">
            <th>House No.</th>
            <th>User</th>
            <th>Occupancy Type</th>
            <th>Date Of Occupancy</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($residents as $resident)
            <tr class="text-center">
                <td> {{ $resident->house->full_address }}</td>
                <td> {{ $resident->user->name }}</td>
                @if($resident->isOwner)
                    <td>Owner</td>
                @else
                    <td>Tenant</td>
                @endif
                <td>{{ $resident->datofoccupancy }}</td>
                @if($resident->isOwner)
                    <td><a href="{{ route('resident.edit' ,$resident) }}" class="btn btn-success btn-sm">EDIT</a></td>
                @else
                <td> - </td>
                @endif
                <td><form action="{{ route('resident.delete', $resident) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection



