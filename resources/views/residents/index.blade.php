@include('navbar')
@extends('layouts.main')
@section('content')
<a href="{{ route('resident.create') }}" class="btn btn-secondary">ADD RESIDENT</a>
    <table class="table table-light">
        <tr>
            <th>HOUSE NO.</th>
            <th>USER</th>
            <th>OCCUPANCY TYPE</th>
            <th>DATE OF OCCUPANCY</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        @foreach ($residents as $resident)
            <tr>
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
                    <td><a href="{{ route('resident.edit' ,$resident) }}" class="btn btn-secondary">EDIT</a></td>
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
@endsection


