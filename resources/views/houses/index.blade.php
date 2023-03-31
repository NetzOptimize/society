@include('navbar')
@extends('layouts.main')
@section('content')
<div class="Manage-houses  bg-light text-center">
    <h3 class="mx-auto p-5">Manage Houses</h3>

</div>
<div class="table-manage-house ps-5 pe-5 pt-4">
<table class="table table-light table-hover table-bordered align-middle">
        <tr class="text-center  table-dark">
            <th>Block-1</th>
            <th>Block-2</th>
            <th>HOUSE NO</th>
            <th>ADDRESS</th>
            <th>OWNER NAME</th>
            <th>MOBILE</th>
        </tr>
        @foreach ($houses as $house)
            <tr  class="text-center">
                <td> {{ $house->Block1 }}</td>
                <td> {{ $house->Block2 }}</td>
                <td> {{ $house->house_no }}</td>
                <td> {{ $house->full_address }}</td>
                <td> {{ $house->ownername }}</td>
                <td> {{ $house->mobile }}</td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection
