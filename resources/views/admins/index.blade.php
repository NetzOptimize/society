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
     {{-- datewise filter --}}
     <div class="payment none">
        <form action="" method="GET" style="margin:0" id="payment-history-form">
            <label class="ms-3 me-3 text-center"><b>Start Date</b></label>
            @if (request('start_date'))
            <input type="date" name="start_date" value={{ request('start_date') }}>
            @else
            <input type="date" name="start_date" class="start-date">
            @endif
            <label class="ms-3 me-3 text-center"><b>End Date</b></label>
            @if (request('end_date'))
            <input type="date" name="end_date" value={{ request('end_date') }}>
            @else
            <input type="date" class="me-3" name="end_date" id="end-date">
            @endif
            <button class="btn btn-success me-3" type="submit" id="filter">Filter</button>
        </form>
    </div>

    {{-- refresh button --}}

    <div class="refresh-button pb-4 me-5 d-flex justify-content-end">
        <a href="{{ route('expenses.index') }}" class="btn btn-success d-flex align-items-center me-2">Refresh</a>
    </div>

</div>
<!-- table -->
    <!-- table -->
    <div class="reports d-flex justify-content-end mt-3 me-5">
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
    @php $i=0; @endphp
    <div class="table-expenses ps-5 pe-5 pt-3   table-responsive">
        <div id="printableArea">
            <table class="table table-light table-hover table-bordered data">
                <thead>
                    <tr class="table-dark">
                        <th>Serial no.</th>
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
                        <th>Done By</th>
                        <th colspan="2">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tr>
                    <tbody>
                        @foreach ($expenses as $expense)
                        @php
                        $i++;
                        @endphp
                        <td>@php echo $i; @endphp</td>
                        <td>{{ $expense->payee }}</td>
                        <td>{{ $expense->amount }}</td>
                        <td>{{ $expense->paymentmode->name }}</td>
                        <td>{{ $expense->dateofpayment }}</td>
                        @if( $expense->comments)
                        <td>{{ $expense->comments }}</td>
                        @else
                        <td>-</td>
                        @endif
                        <td class="done">{{ $expense->doneby ? $expense->doneby->value('name'): null }}
                            @php $image = $expense->doneby ? $expense->doneby->value('user_image') : null ;@endphp
                            @if($image)
                                <img src="{{  asset('storage/'.$image) }}">
                            @endif
                         </td>
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
                $(".data tbody tr").filter(function() {
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
