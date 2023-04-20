
@extends('layouts.main')
@section('title')
Society Expenses
@endsection
@section('content')

{{-- search bar --}}
<div class="main ">

<div class="houses-list  text-center me-5 ms-5 bg-light p-4  mt-3">
    <h3>Lists Of Expenses</h3>
</div>

<input type="search" id="search" style="margin:50px" placeholder="Search"  />

<div class="refresh-expenses pt-3 pe-5 d-flex justify-content-end">
    <button onclick="printDiv()" class="btn btn-success  d-flex align-items-center m-2">Print</button>
</div>

{{-- listing --}}
<div class="table-expenses ps-5 pe-5 pt-3  mt-3 table-responsive">
    <div id="printableArea">
    <table class="table table-light table-hover table-bordered">
        <thead>
        <tr class="table-dark">
            <th>Payee</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th class="d-flex align-items-center ">Date Of Payments <div class="dropdown ms-2 order_by">
                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (request('sort'))
                        {{ request('sort') }}
                        @else
                        Order By
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="?sort=Ascending">Ascending</a></li>
                        <li><a class="dropdown-item" href="?sort=Descending">Descending</a></li>
                    </ul>
                </div>
            </th>
            <th>Comments</th>
        </tr>
        </thead>
        <tbody>
            <tr>
            @foreach ($expenses as $expense)
            <td class="">{{ $expense->payee }}</td>
            <td class="">{{ $expense->amount }}</td>
            <td class="">{{ $expense->paymentmode->name }}</td>
            <td class="">{{ $expense->dateofpayment }}</td>
            <td class="">{{ $expense->comments }}</td>
        </tr>
        </tbody>
        @endforeach
    </table>
</div>
</div>
<script>

    // for searching
    $(document).ready(function() {
        $("#search").keyup(function() {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
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
