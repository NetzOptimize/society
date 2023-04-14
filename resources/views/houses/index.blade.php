
@extends('layouts.main')
@section('title')
Society Houses
@endsection
@section('content')
    <div class="Manage-houses  bg-light text-center me-5 ms-5 mt-3">
        <h3 class="mx-auto p-4 "> List Of Houses</h3>
    </div>
    <div class="table-add-user ps-5 pe-5 pt-5 table-responsive">
        {{-- search bar --}}

        <form action="" method="GET" style="margin:0">
           @if (request('search'))
               <input type="search" name="search" value="{{ request('search') }}" />
           @else
               <input type="search" placeholder="Search By Address" name="search" />
           @endif
       </form>
        {{-- refresh button --}}
   <div class="refresh-button pb-4 me-5 d-flex justify-content-end">
       <a href="{{ route('houses.index') }}" class="btn btn-success">Refresh</a>
   </div>
    <div class="table-manage-house ps-5 pe-5 pt-3  table-responsive">
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
                    <td> <a href="{{ route('houses.show', $house) }}" class="btn btn-success">Detail</a></td>
                    @else
                    <td>N/A</td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
@endsection
