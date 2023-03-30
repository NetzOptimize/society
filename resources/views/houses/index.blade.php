@include('navbar')
@extends('layouts.main')
@section('content')

<div class="table-manage-house  p-3">
<table class="table table-light table-hover table-borderd align-middle">
        <tr class="text-center">
            <th>Block-1</th>
            <th>Block-2</th>
            <th>HOUSE NO</th>
            <th>HOUSE TYPE</th>
            <th>DATE OF BUILT</th>
        </tr>
        @foreach ($houses as $house)
            <tr  class="text-center">
                <td> {{ $house->Block1 }}</td>
                <td> {{ $house->Block2 }}</td>
                <td> {{ $house->house_no }}</td>
                <td> {{ $house->house_type }}</td>
                <td> {{ $house->dateofbuilt }}</td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection
