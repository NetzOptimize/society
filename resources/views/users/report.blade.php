@include('users.navbar')
@extends('layouts.mainWithoutNav')
@section('title')
Society User-Report
@endsection
@section('content')
@php $payments = Auth::user()->payments()->get()->groupby('house_id') @endphp

@foreach ($payments as $pay)
<div class="table-report p-4 table-responsive ms-4 me-4">
    <table class="table  table-bordered">
        <tr  class="bg-dark text-light hide">
            <th>House No.</th>
            <th>Billing Month</th>
            <th>Payment Mode</th>
            <th>Date Of Deposit</th>
            <th>Amount</th>
            <th>Payment Receipt</th>
        </tr>
        @foreach ($pay as $payment)
        <tr class="hide">
            <td>{{ $payment->houses->full_address }}</td>
                @foreach ($months as $key => $month)
                    @if($key == $payment->billingmonth)
                        <td>{{ $temp = $month }}</td>
                    @endif
                @endforeach
                <td>{{ $payment->paymentmode->name }}</td>
                <td>{{ $payment->dateofdeposit}}</td>
                <td>{{ $payment->amount}}</td>
                <div class="modal fade" id="modal{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $payment->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                            </div>
                            <div class="modal-body">
                                Name : {{ ucfirst(Auth()->user()->name) }}<br>
                                Date : {{date("l jS \of F Y") }}<br><br>

                                Billing Month : {{ $temp }}<br>
                                Payment Mode : {{ $payment->paymentmode->name }}<br>
                                Date Of Deposit : {{ $payment->dateofdeposit}}<br>
                                Amount : {{ $payment->amount}}<br>
                                Signature : Not Required<br>
                            </div>
                            <div class="modal-footer">
                                <button onclick="printDiv('my-div{{$payment->id}}')" class="btn btn-dark hide">Print</button>
                                <button type="button" class="btn btn-dark hide" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <td><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal{{ $payment->id }}">
                    view
                </button></td>
            </tr>
            @endforeach
        </table>
    </div>
    @endforeach
</div>
<script>
    function printDiv(divId) {
        $(".hide").hide();
        window.print();
        location.reload(true);
    }
</script>
@endsection
