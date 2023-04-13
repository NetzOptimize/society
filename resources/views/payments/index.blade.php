
@extends('layouts.main')
@section('title')
Society Payments
@endsection
@section('content')
    {{-- monthwise filter --}}


    <div class="heading-payment-history bg-light me-5 ms-5  p-4 mt-3 text-center">
        <h3>Payment History</h3>
    </div>

    <div class="d-flex justify-content-center align-items-center  p-4 payment1">
        <div class="paid-month-flex d-flex me-3">
            <div class="dropdown me-2">
                <label class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (request('month') || request('unpaid'))
                        {{ request('month') }}
                        {{ request('unpaid') }}
                    @else
                        Months
                    @endif
                </label>
                <ul class="dropdown-menu">
                    @foreach ($months as $key => $month)
                        <li><a class="dropdown-item"
                                href="{{ route('payments.index') }}?month={{ $key }}">{{ $month }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="dropdown">
                <label class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    @if (request('unpaid'))
                        Unpaid
                    @else
                        Paid
                    @endif
                </label>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('payments.index') }}">Paid</a></li>
                    @if (request('month'))
                        <li><a class="dropdown-item"
                                href="{{ route('payments.index') }}?unpaid={{ request('month') }}">Unpaid</a></li>
                    @endif
                </ul>
            </div>
        </div>

        {{-- datewise filter --}}
        <div class="payment">
            <form action="" method="GET" style="margin:0" id="payment-history-form">
                <label class="ms-3 me-3"><b>Start Date</b></label>
                @if (request('start_date'))
                    <input type="date" name="start_date" value={{ request('start_date') }}>
                @else
                    <input type="date" name="start_date">
                @endif
                <label class="ms-3 me-3"><b>End Date</b></label>
                @if (request('end_date'))
                    <input type="date" name="end_date" value={{ request('end_date') }}>
                @else
                    <input type="date" class="me-3" name="end_date">
                @endif
                <button class="btn btn-success me-3" type="submit">Filter</button>
            </form>
        </div>

        {{-- search bar --}}

        <form action="" method="GET" style="margin:0">
            @if (request('search'))
                <input type="search" name="search" value="{{ request('search') }}" />
            @else
                <input type="search" placeholder="Search By House No." name="search" />
            @endif
        </form>
    </div>

    {{-- refresh button --}}
    <div class="refresh-button pb-4 me-5 d-flex justify-content-end">
        <a href="{{ route('payments.index') }}" class="btn btn-success">Refresh</a>
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

    {{-- listing  --}}
    @php $i=0; @endphp
    <div class="table-payments ps-5 pe-5 pt-2 table-responsive">
        <table class="table table-light table-bordered table-hover ">
            @if($payments->first())
            <tr class="table-dark">
                <th>Serial No</th>
                <th>House No.</th>
                <th>Billing Month</th>
                @if (null == request('unpaid'))
                    <th>Payment Mode</th>
                    <th>Date Of Deposit</th>
                    <th>Amount</th>
                    @if (auth()->user()->usertype_id != 3)
                    <th>Actions</th>
                    <th></th>
                    @endif
                @endif
            </tr>
            <tr>
        @if (request('unpaid'))
            @foreach ($payments as $payment)
                @php
                    $i++;
                @endphp
                <td>@php echo $i; @endphp</td>
                <td>{{ $payment->full_address }}</td>
                <td>{{ request('unpaid') }}</td>
            </tr>
            @endforeach
        @else
            @foreach ($payments as $payment)
                @php
                    $i++;
                @endphp
                <td>@php echo $i; @endphp</td>
                <td>{{ $payment->houses->full_address }}</td>
                @foreach ($months as $key => $month)
                    @if ($key == $payment->billingmonth)
                        <td>{{ $month }}</td>
                    @endif
                @endforeach
                <td>{{ $payment->paymentmode->name }}</td>
                <td>{{ $payment->dateofdeposit }}</td>
                <td>{{ $payment->amount }}</td>
                @if (auth()->user()->usertype_id == 1)
                    <td>
                        <a href="{{ route('payments.edit', $payment) }}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('payments.destroy', $payment->id) }}"class="m-0">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip"
                                title='Delete'>Delete</button>
                        </form>
                    </td>
            @endif
                </tr>
            @endforeach
            @endif
        @else
        <div class="error d-flex justify-content-center " ><b>No Record Found</b></div>
        @endif
        </table>
    </div>
    {{-- delete confirmation --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
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
    </script>
@endsection
