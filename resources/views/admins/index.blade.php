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
    <div class="none">
        <div class="refresh-expenses pt-3 pe-5 d-flex justify-content-end align-items-center gap-2">
            <input type="search" id="search" placeholder="Search" class="search" />

            <button onclick="printDiv()" class="btn btn-success  d-flex align-items-center">Print</button>
        </div>
    </div>

    <!-- table -->
<div class="reports d-flex justify-content-end me-5">
    <table class="table w-auto table-bordered ">

        <tr>
            <th class="text-center table-info" colspan="2">Financial Reports</th>
        </tr>

        <tbody>
            <tr class="table-light">
                <td>Date</td>
                <td>{{ date('d-m-Y') }}</td>
            </tr>
            <tr class="table-light">
                <td>Count</td>
                <td>{{ $count }}</td>
            </tr>
            <tr class="table-light">
                <td>Total Amount</td>
                <td>{{ $sum }}</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- table end -->
    {{-- listing --}}
    <div class="table-expenses ps-5 pe-5 pt-3  mt-3 table-responsive">
        <div id="printableArea">
            <table class="table table-light table-hover table-bordered">
                <thead>
                    <tr class="table-dark">
                        <th>Payee</th>
                        <th>Amount</th>
                        <th>Payment Mode</th>
                        <th class="d-flex align-items-center none ">Date Of Payments <div class="dropdown ms-2 order_by none">
                                <a class="btn btn-success btn-sm dropdown-toggle none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (request('sort'))
                                    {{ request('sort') }}
                                    @else
                                    Order By
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li class="none"><a class="dropdown-item" href="?sort=Ascending">Ascending</a></li>
                                    <li class="none"><a class="dropdown-item" href="?sort=Descending">Descending</a></li>
                                </ul>
                            </div>
                        </th>
                        <th>Comments</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                        @else
                        <td>-</td>
                        @endif
                        <div class="none">
                            @if (auth()->user()->usertype_id == 1)
                            <td class="none">
                                <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-success none">Edit</a>
                            </td>
                            <td class="none">
                                <form method="POST" action="{{ route('expenses.destroy', $expense->id) }}" class="m-0">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm none" data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                            </td>
                            @endif
                        </div>
                    </tbody>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    {{-- delete confirmation --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Do You Want To Delete This?`
                    , icon: "warning"
                    , buttons: true
                    , dangerMode: true
                , })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

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
                }, 400);
            }, 400);

        }

    </script>
    @endsection
