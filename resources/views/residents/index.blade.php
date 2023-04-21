
@extends('layouts.main')
@section('title')
Society Residents
@endsection
@section('content')
    <div class="heading-resident text-center bg-light me-5 ms-5  rounded mt-3  p-4">
        <h3>List Of Residents</h3>
    </div>
    @if (auth()->user()->usertype_id != 3)
        <div class="resident-create mt-3 p-3 me-5 d-flex justify-content-end">
            <a href="{{ route('residents.create',0) }}" class="btn btn-success d-flex align-items-center"> Add Resident <img
                    src="{{ 'house.png' }}" style="width:20px" alt="" class="ms-2"></a>

        </div>
    @endif


    {{-- refresh button --}}
<!-- <div class="refresh-button pb-3 pt-3 ms-5 me-5 d-flex justify-content-between">
<div class="print-refresh d-flex align-items-center">
<a href="{{ route('residents.index') }}" class="btn btn-success  d-flex align-items-center ">Refresh</a>
    <button onclick="printDiv()" class="btn btn-success  d-flex align-items-center ms-2">Print</button> -->


     {{-- search bar --}}
     <!-- <input type="search" id="search"   placeholder="Search" style="margin:50px"/> -->

<div class="refresh-button pb-4 me-5 d-flex justify-content-end gap-2">
<input type="search" id="search" placeholder="Search" class="search"/>

<button onclick="printDiv()" class="btn btn-success  d-flex align-items-center">Print</button>
</div>

</div>
    <div class="table-resident table-hover table-bordered align-middle ps-5 pe-5 pt-3 table-responsive">
        <div id="printableArea">
        <table class="table table-light table-hover table-bordered align-middle">
            <thead>
            <tr class="table-dark">
                <th>House No.</th>
                <th>User</th>
                <th>Mobile1</th>
                <th>Mobile2</th>
                <th>Occupancy Type</th>
                <th>Date Of Occupancy</th>
                <th>Detail</th>
                @if (auth()->user()->usertype_id != 3)
                    <th>Edit</th>
                    <th>Delete</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @if ($residents->first())
                @foreach ($residents as $resident)

                    <tr class="">
                        <td> {{ $resident->house->full_address }}</td>
                        @php
                            try {
                                $username = $resident->user->name;
                            } catch (\Exception $e) {
                                $username = 'N/A';
                            }
                        @endphp
                        <td>{{ $username }}</td>
                        @if($resident->user->mobile1)
                            <td>{{  $resident->user->mobile1}}</td>
                            @else
                            <td >Not Provided</td>
                        @endif
                        @if($resident->user->mobile2)
                        <td>{{  $resident->user->mobile2}}</td>
                        @else
                        <td >Not Provided</td>
                        @endif
                        @if ($resident->isOwner)
                            <td>Owner</td>
                        @else
                            <td>Tenant</td>
                        @endif
                        <td>{{ $resident->datofoccupancy }}</td>
                        <td> <a href="{{ route('houses.show', $resident->house) }}" class="btn btn-success">View</a></td>
                        @if (auth()->user()->usertype_id != 3)
                            <td><a href="{{ route('residents.edit', $resident) }}" class="btn btn-success">Edit</a></td>
                            <td>
                                <form method="POST" class="m-0" action="{{ route('residents.destroy', $resident) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn  btn-xs btn-danger btn-flat show_confirm"
                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
    //for searching
    $(document).ready(function() {
        $("#search").keyup(function() {
            var value = $(this).val().toLowerCase();

            $("table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    //  delete confirmation
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Do You Want To Delete This?`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

// for data printing
    function printDiv() {
        var printableArea = document.getElementById('printableArea').innerHTML;
        var printWindow = window.open('', '', 'height=0,width=0');
        printWindow.document.write('<html><head><title>Print Page</title></head><body>');
        printWindow.document.write(printableArea);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
        printWindow.close();
    }

    </script>
@endsection
