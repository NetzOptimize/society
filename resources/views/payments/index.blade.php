@include('navbar')
@extends('layouts.main')
@section('content')
    {{-- monthwise filter --}}
    <div class="d-flex flex-row mb-3 ">
    <div class="dropdown">
        <label class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <form action="" method="GET">
        <label><b>START DATE</b></label>
        @if (request('start_date'))
            <input type="date" name="start_date" value={{ request('start_date') }}>
        @else
            <input type="date" name="start_date">
        @endif
        <label><b>END DATE</b></label>
        @if (request('end_date'))
            <input type="date" name="end_date" value={{ request('end_date') }}>
        @else
            <input type="date" name="end_date">
        @endif
        <button class="btn btn-secondary" type="submit">FILTER</button>
    </form>


    {{-- search bar --}}

    <form action="" method="GET">
        @if (request('search'))
            <input type="search" name="search" value="{{ request('search') }}" />
        @else
            <input type="search" placeholder="Search By House No." name="search" />
        @endif
    </form>
    </div>

    {{-- refresh button--}}

    <a href="{{ route('payment.index') }}" class="btn btn-secondary">REFRESH</a>

    {{-- listing  --}}
    @php $i=0; @endphp
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
@endsection

