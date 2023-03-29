@include('navbar')
@extends('layouts.main')
@section('content')
    <table class="table table-light">
        <tr>
            <th>PAYEE</th>
            <th>AMOUNT</th>
            <th>PAYMENT MODE</th>
            <th>DATE OF PAYMENT</th>
            <th>COMMENTS</th>
        </tr>
        <tr>
            @foreach ($expenses as $expense)
                <td>{{ $expense->payee }}</td>
                <td>{{ $expense->amount}}</td>
                <td>{{ $expense->paymentmode->name }}</td>
                <td>{{ $expense->dateofpayment}}</td>
                <td>{{ $expense->comments}}</td>
        </tr>
        @endforeach
    </table>
@endsection
