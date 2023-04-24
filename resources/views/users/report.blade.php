@include('users.navbar')
@extends('layouts.mainWithoutNav')
@section('title')
Society User-Report
@endsection
@section('content')
@php $payments = Auth::user()->payments()->get() @endphp


<div class="table-report p-4 table-responsive ms-4 me-4">
    <table class="table  table-bordered">
        <tr  class="bg-dark text-light">
            <th>Billing Month</th>
            <th>Payment Mode</th>
            <th>Date Of Deposit</th>
            <th>Amount</th>
            <th>Payment Receipt</th>
        </tr>
        @foreach ($payments as $payment)
            <tr>
                @foreach ($months as $key => $month)
                    @if($key == $payment->billingmonth)
                        <td>{{ $temp = $month }}</td>
                    @endif
                @endforeach
                <td>{{ $payment->paymentmode->name }}</td>
                <td>{{ $payment->dateofdeposit}}</td>
                <td>{{ $payment->amount}}</td>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop{{$payment->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Payment Receipt</h1>
                            </div>
                            <div class="modal-body" id="my-div{{$payment->id}}">
                                Name : {{ Auth()->user()->name }}<br>
                                Date : {{date("l jS \of F Y") }}<br><br>

                                Billing Month : {{ $temp }}<br>
                                Payment Mode : {{ $payment->paymentmode->name }}<br>
                                Date Of Deposit : {{ $payment->dateofdeposit}}<br>
                                Amount : {{ $payment->amount}}<br>
                                Signature : Not Required<br>
                            </div>
                            <div class="modal-footer">
                                <button onclick="printDiv('my-div{{$payment->id}}')" class="btn btn-dark hide">Print</button>
                                <a type="button" class="btn btn-dark hide" href="{{  route('user.report') }}">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
                <td><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$payment->id}}">
                  View
                </button></td>
            </tr>
        @endforeach
    </table>
</div>
<script>
    function printDiv(divId) {
        $(".hide").hide();
        window.print();
        location.reload(true);
    }
</script>
@endsection
