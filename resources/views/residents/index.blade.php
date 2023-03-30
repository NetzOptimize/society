@include('navbar')
@extends('layouts.main')
@section('content')

<div class="resident-create mt-4 p-3">
<a href="{{ route('resident.create') }}" class="btn btn-primary">ADD RESIDENT</a>
</div>

<div class="table-resident table-hover table-borderd align-middle p-3">
    <table class="table table-light table-hover table-borderd align-middle">
        <tr class="text-center">
            <th>HOUSE NO.</th>
            <th>USER</th>
            <th>OCCUPANCY TYPE</th>
            <th>DATE OF OCCUPANCY</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        @foreach ($residents as $resident)
            <tr class="text-center">
                @php
                    $address = $resident->house->Block1 . $resident->house->Block2 . $resident->house->house_no;
                @endphp
                <td> {{ $address }}</td>
                <td> {{ $resident->user->name }}</td>
                @if($resident->isOwner)
                    <td>OWNER</td>
                @else
                    <td>TENANT</td>
                @endif
                <td>{{ $resident->datofoccupancy }}</td>
                @if($resident->isOwner)
                    <td><a href="{{ route('resident.edit' ,$resident) }}" class="btn btn-primary">EDIT</a></td>
                @else
                <td> - </td>
                @endif
                <td><form action="{{ route('resident.delete', $resident) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection



