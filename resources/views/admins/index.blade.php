
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

 {{-- <form action="" method="GET" class="searchby-payee d-flex justify-content-end pt-4 pe-5 mt-2">
  
</form>
</div> --}}

{{-- refresh button--}}
<div class="refresh-expenses mt-4 pe-5 d-flex align-items-center justify-content-between ms-5 me-5">
@if (request('search'))
    <input type="search" name="search" value="{{ request('search') }}"  />
    @else
    <div class="searchby-payee d-flex  ">
        <input type="search" placeholder="  Search By Payee" name="search" />
    </div>
    @endif
    <div class="print-refresh d-flex align-items-center">
    <a href="{{ route('expenses.index') }}" class="btn btn-success d-flex align-items-center me-3">Refresh</a>
    <button onclick="printDiv()" class="btn btn-success  d-flex align-items-center">Print</button>
    </div>
   
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
