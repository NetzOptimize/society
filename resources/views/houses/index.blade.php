@include('navbar')
@extends('layouts.main')
@section('content')

    <table class="table table-light">
        <tr>
            <th>Block-1</th>
            <th>Block-2</th>
            <th>HOUSE NO</th>
            <th>HOUSE TYPE</th>
            <th>DATE OF BUILT</th>
        </tr>
        @foreach ($houses as $house)
            <tr>
                <td> {{ $house->Block1 }}</td>
                <td> {{ $house->Block2 }}</td>
                <td> {{ $house->house_no }}</td>
                <td> {{ $house->house_type }}</td>
                <td> {{ $house->dateofbuilt }}</td>
            </tr>
        @endforeach
    </table>
@endsection
