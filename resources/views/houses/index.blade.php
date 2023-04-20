
@extends('layouts.main')
@section('title')
Society Houses
@endsection
@section('content')
    <div class="Manage-houses  bg-light text-center me-5 ms-5 mt-3">
        <h3 class="mx-auto p-4 "> List Of Houses</h3>
    </div>
    <div class="table-add-user pt-4 table-responsive">
        {{-- search bar --}}
        
        {{-- refresh button --}}
   <div class="refresh-button pb-4 me-5 d-flex justify-content-between">
   <input type="search" placeholder="Search " id="search" style="margin:0" class="ms-5 me-5"/>

   </div>
    <div class="table-manage-house ps-5 pe-5 pt-3  table-responsive">
        <table class="table table-light table-hover table-bordered align-middle">
            <thead>
            <tr class="text-center  table-dark">
                <th>Block-1</th>
                <th>Block-2</th>
                <th>House No</th>
                <th>Address</th>
                <th>House Type</th>
                <th>View Details</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($houses as $house)
                <tr class="text-center">
                    <td> {{ $house->Block1 }}</td>
                    <td> {{ $house->Block2 }}</td>
                    <td> {{ $house->house_no }}</td>
                    <td> {{ $house->full_address }}</td>
                    <td> {{ $house->house_type }}</td>
                    @if($house->house_type == 'house')
                    <td> <a href="{{ route('houses.show', $house) }}" class="btn btn-success">View</a></td>
                    @else
                    <td>N/A</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                var value = $(this).val().toLowerCase();
                $("table tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
