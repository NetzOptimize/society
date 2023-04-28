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
<<<<<<< HEAD
    <div class="none">
        <div class="refresh-expenses pt-3 pe-5 d-flex justify-content-end align-items-center gap-2">
            <input type="search" id="search" placeholder="Search" class="search" />
=======
<div class="hide">
    <div class="refresh-expenses pt-3 pe-5 d-flex justify-content-end align-items-center gap-2">
        <input type="search" id="search" placeholder="Search" class="search" />
>>>>>>> parent of bcf1f2a (Merge branch 'staging' of https://github.com/NetzOptimize/society into staging)

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
                        <th class="d-flex align-items-center">
                            Date Of Payments
                            <div class="dropdown ms-2 order_by  none">
                                <a class="btn btn-success btn-sm dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (request('sort'))
                                    {{ request('sort') }}
                                    @else
                                    Order By
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark ">
                                    <li class="none"><a class="dropdown-item" href="?sort=Ascending">Ascending</a></li>
                                    <li class="none"><a class="dropdown-item" href="?sort=Descending">Descending</a></li>
                                </ul>
                            </div>
                        </th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tr>
                        <tbody>
                        @foreach ($expenses as $expense)
                        <td >{{ $expense->payee }}</td>
                        <td >{{ $expense->amount }}</td>
                        <td >{{ $expense->paymentmode->name }}</td>
                        <td >{{ $expense->dateofpayment }}</td>
                        @if( $expense->comments)
                        <td >{{ $expense->comments }}</td>
                        @else
                        <td >-</td>
                        @endif
                    </tbody>
                    </tr>
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
            $(".hide").hide();
<<<<<<< HEAD
            setTimeout(function() {
                window.print();
                setTimeout(function() {
                    $(".hide").show();
                }, 400);
            }, 400);
=======
            window.print();
            $(".hide").show();
>>>>>>> parent of bcf1f2a (Merge branch 'staging' of https://github.com/NetzOptimize/society into staging)
        }

    </script>
    @endsection
