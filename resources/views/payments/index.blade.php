@include('navbar')
@extends('layouts.main')
@section('content')
    {{-- monthwise filter --}}



<div class="heading-payment-history bg-light  p-4 mt-3 text-center">
    <h3>Payment History</h3>
</div>

    <div class="d-flex justify-content-center align-items-center  p-4">
    <div class="dropdown">
        <label class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            @if (request('month'))
                {{ request('month') }}
            @else
                MONTH-WISE-FILTER
            @endif
        </label>
        <ul class="dropdown-menu">
            @foreach ($months as $key => $month)
                <li><a class="dropdown-item"
                        href="{{ route('payment.index') }}?month={{ $key }}">{{ $month }}</a></li>
            @endforeach
        </ul>
    </div>

    {{-- datewise filter --}}
    <div class="payment">
    <form action="" method="GET" style="margin:0">
        <label  class="ms-3 me-3"><b>START DATE</b></label>
        @if (request('start_date'))
            <input type="date" name="start_date" value={{ request('start_date') }}>
        @else
            <input type="date" name="start_date">
        @endif
        <label  class="ms-3 me-3"><b>END DATE</b></label>
        @if (request('end_date'))
            <input type="date"  name="end_date" value={{ request('end_date') }}>
        @else
            <input type="date" class="me-3" name="end_date">
        @endif
        <button class="btn btn-success me-3" type="submit">FILTER</button>
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

    DATE :{{ date('d-m-Y') }}
    COUNT : {{$count }}
    TOTAL AMOUNT :{{ $sum}}

    {{-- refresh button--}}
<div class="refresh-button p-3 d-flex justify-content-end">
    <a href="{{ route('payment.index') }}" class="btn btn-success">REFRESH</a>
</div>

    {{-- listing  --}}
    @php $i=0; @endphp
    <div class="table-payments ps-5 pe-5 pt-2">
    <table class="table table-light table-bordered table-hover">
        <tr class="table-dark">
            <th>SERIAL NO</th>
            <th>HOUSE No.</th>
            <th>BILLING MONTH</th>
            <th>PAYMENT MODE</th>
            <th>DATE OF DEPOSIT</th>
            <th>AMOUNT</th>
        </tr>
        <tr>
            @foreach ($payments as $payment)
                @php
                    $i++;
                @endphp
                <td>@php echo $i; @endphp</td>
                <td>{{ $payment->houses->full_address }}</td>
                @foreach ($months as $key => $month)
                @if($key == $payment->billingmonth)
                    <td>{{ $month }}</td>
                @endif
                @endforeach
                <td>{{ $payment->paymentmode->name }}</td>
                <td>{{ $payment->dateofdeposit }}</td>
                <td>{{ $payment->amount }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

