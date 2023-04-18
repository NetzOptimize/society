@include('users.navbar')
@extends('layouts.mainWithoutNav')
@section('title')
Society User-Report
@endsection
@section('content')
@php $payments = Auth::user()->payments()->get() @endphp

<div class="main">
    <div class="print-btn mt-4 d-flex justify-content-end me-5">
    <button class="btn btn-success me-3">Refresh</button>

        <button class="btn btn-success">Print</button>
    </div>

<div class="table-report p-4 table-responsive ms-4 me-4">
    <table class="table  table-bordered">
        <tr  class="bg-dark text-light">
            <th>Billing Month</th>
            <th>Payment Mode</th>
            <th>Date Of Deposit</th>
            <th>Amount</th>
        </tr>
        <tr>
            @foreach ($payments as $payment)
                <td>{{ $address }}</td>
                @foreach ($months as $key => $month)
                @if($key == $payment->billingmonth)
                    <td>{{ $month }}</td>
                @endif
                @endforeach
                <td>{{ $payment->paymentmode->name }}</td>
                <td>{{ $payment->dateofdeposit}}</td>
                <td>{{ $payment->amount}}</td>
        </tr>
        @endforeach
    </table>
    </div>
    </div>

@endsection
