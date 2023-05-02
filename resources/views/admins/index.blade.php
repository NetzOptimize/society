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
    <div class="hide">
        <div class="refresh-expenses pt-3 pb-3 pe-5 d-flex justify-content-end align-items-center gap-2">
            <input type="search" id="search" placeholder="Search" class="search" />

            <button onclick="printDiv()" class="btn btn-success  d-flex align-items-center">Print</button>
        </div>
    </div>
    <!--  -->
    <div class="reports d-flex justify-content-end  me-5">
    <table class="table w-auto table-bordered ">

        <tr>
            <th class="text-center table-info" colspan="2">Expenses Report</th>
        </tr>

        <tbody>
            <tr class="table-light">
                <td>Date</td>
                <td>{{ date('d-m-Y') }}</td>
            </tr>
            <tr class="table-light">
                <td>Count</td>
                <td> Count</td>
            </tr>
            <tr class="table-light">
                <td>Total Amount</td>
                <td> Sum</td>
            </tr>
        </tbody>
    </table>
</div>

    <!--  -->
    {{-- listing --}}
    <div class="table-expenses ps-5 pe-5  mt-3 table-responsive">
        <div id="printableArea">
            <table class="table table-light table-hover table-bordered">
                <thead>
                    <tr class="table-dark">
                        <th>Payee</th>
                        <th>Amount</th>
                        <th>Payment Mode</th>
                        <th class="d-flex align-items-center ">Date Of Payments <div class="dropdown ms-2 order_by">
                                <a class="btn btn-success btn-sm dropdown-toggle hide" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (request('sort'))
                                    {{ request('sort') }}
                                    @else
                                    Order By
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li class="hide"><a class="dropdown-item" href="?sort=Ascending">Ascending</a></li>
                                    <li class="hide"><a class="dropdown-item" href="?sort=Descending">Descending</a></li>
                                </ul>
                            </div>
                        </th>
                        <th>Comments</th>
                        <th colspan="2">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tr>
                    <tbody>
                        @foreach ($expenses as $expense)
                        <td>{{ $expense->payee }}</td>
                        <td>{{ $expense->amount }}</td>
                        <td>{{ $expense->paymentmode->name }}</td>
                        <td>{{ $expense->dateofpayment }}</td>
                        @if( $expense->comments)
                        <td>{{ $expense->comments }}</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        @else
                        <td>-</td>
                       

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
            setTimeout(function() {
                window.print();
                setTimeout(function() {
                    $(".hide").show();
                }, 2000);
            }, 2000);
        }

    </script>
    @endsection
