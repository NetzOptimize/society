@include('navbar')
@extends('layouts.main')
@section('content')
    <div class="Manage-houses  bg-light text-center me-5 ms-5 mt-3">
        <h3 class="mx-auto p-4 "> List Of Houses</h3>
    </div>
    <div class="table-manage-house ps-5 pe-5 pt-3">
        <table class="table table-light table-hover table-bordered align-middle">
            <tr class="text-center  table-dark">
                <th>Block-1</th>
                <th>Block-2</th>
                <th>House No</th>
                <th>Address</th>
                <th>House Type</th>
                <th></th>
            </tr>
            @foreach ($houses as $house)
                <tr class="text-center">
                    <td> {{ $house->Block1 }}</td>
                    <td> {{ $house->Block2 }}</td>
                    <td> {{ $house->house_no }}</td>
                    <td> {{ $house->full_address }}</td>
                    <td> {{ $house->house_type }}</td>
                    @if($house->house_type == 'house')
                    <td> <a href="{{ route('house.detail', $house) }}" class="btn btn-success">Detail</a></td>
                    @else
                    <td>N/A</td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
@endsection
