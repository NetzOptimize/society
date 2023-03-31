@include('users.navbar')
@extends('layouts.main')
@section('content')
@php $payments = Auth::user()->payments()->get() @endphp
<div class="table-report p-4">
    <table class="table table-light table-hover">
        <tr  table-active>
            <th>HOUSE No.</th>
            <th>BILLING MONTH</th>
            <th>PAYMENT MODE</th>
            <th>DATE OF DEPOSIT</th>
            <th>AMOUNT</th>
        </tr>
        <tr>
            @foreach ($payments as $payment)
            @php
                $address =$payment->houses->Block1.$payment->houses->Block2.$payment->houses->house_no
            @endphp
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
@endsection
