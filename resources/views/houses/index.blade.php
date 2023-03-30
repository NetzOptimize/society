@include('navbar')
@extends('layouts.main')
@section('content')

    <table class="table table-light">
        <tr>
            <th>Block-1</th>
            <th>Block-2</th>
            <th>HOUSE NO</th>
            <th>ADDRESS</th>
            <th>OWNER NAME</th>
            <th>MOBILE</th>
        </tr>
        @foreach ($houses as $house)
            <tr>
                <td> {{ $house->Block1 }}</td>
                <td> {{ $house->Block2 }}</td>
                <td> {{ $house->house_no }}</td>
                <td> {{ $house->full_address }}</td>
                <td> {{ $house->ownername }}</td>
                <td> {{ $house->mobile }}</td>
            </tr>
        @endforeach
    </table>
@endsection
