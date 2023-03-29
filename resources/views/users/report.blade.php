{{-- @include('users.navbar')
@extends('layouts.main')
@section('content')
{{  $Auth::user()->payments()->get()->toArray() }}
    <table class="table table-light">
        <tr>
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
                <td>{{ $payment->billingmonth}}</td>
                <td>{{ $payment->paymentmode->name }}</td>
                <td>{{ $payment->dateofdeposit}}</td>
                <td>{{ $payment->amount}}</td>
        </tr>
        @endforeach
    </table>
@endsection --}}
