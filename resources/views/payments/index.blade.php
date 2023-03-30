@include('navbar')
@extends('layouts.main')
@section('content')
    {{-- monthwise filter --}}





    <div class="d-flex justify-content-center align-items-center  p-5">
    <div class="dropdown">
        <label class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <button class="btn btn-primary me-3" type="submit">FILTER</button>
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

    {{-- refresh button--}}
<div class="refresh-button p-3">    
    <a href="{{ route('payment.index') }}" class="btn btn-primary">REFRESH</a>
</div>

    {{-- listing  --}}
    @php $i=0; @endphp
    <div class="table-payments p-3"> 
    <table class="table table-light">
        <tr>
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
                    $address = $payment->houses->Block1 . $payment->houses->Block2 . $payment->houses->house_no;
                @endphp
                <td>@php echo $i; @endphp</td>
                <td>{{ $address }}</td>
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

