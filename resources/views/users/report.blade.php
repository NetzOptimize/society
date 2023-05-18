@include('users.navbar')
@extends('layouts.mainWithoutNav')
@section('title')
Society User-Report
@endsection
@section('content')
@php $payments = Auth::user()->houses()->with('payments')->get() @endphp

<div class="main ">
<div class="main-report ">
@foreach ($payments as $pay)

<div class="text-center  mt-5" style="font-size: 22px; font-weight: bold; color: #333333; text-decoration: ;">House {{ $pay->full_address }}</div>
    @if($pay->payments->first())
    <div class="table-report p-1 table-responsive ms-4 me-4">
        <table class="table  table-bordered">
            <tr class="bg-dark text-light hide">
                <th>Billing Month</th>
                <th>Payment Mode</th>
                <th>Date Of Deposit</th>
                <th>Amount</th>
                <th>Payment Receipt</th>
            </tr>
                        @foreach($pay->payments as $data)
                        <tr class="hide">
                            @foreach ($months as $key => $month)
                            @if($key == $data->billingmonth)
                            <td>{{ $temp = $month }}</td>
                            @endif
                            @endforeach
                            <td>{{ $data->paymentmode->name }}</td>
                            <td>{{ $data->dateofdeposit}}</td>
                            <td>{{ $data->amount}}</td>
                            <div class="modal fade" id="modal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                                    </div>
                                    <div class="modal-body">
                                        Name : {{ ucfirst(Auth()->user()->name) }}<br>
                                        Date : {{date("l jS \of F Y") }}<br><br>

                                        Billing Month : {{ $temp }}<br>
                                        Payment Mode : {{ $data->paymentmode->name }}<br>
                                        Date Of Deposit : {{ $data->dateofdeposit}}<br>
                                        Amount : {{ $data->amount}}<br>
                                        Signature : Not Required<br>
                                    </div>
                                    <div class="modal-footer">
                                        <button onclick="printDiv('my-div{{$data->id}}')" class="btn btn-dark hide">Print</button>
                                        <button type="button" class="btn btn-dark hide" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                </div>
                <td><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal{{ $data->id }}">
                        view
                    </button></td>
                </tr>
                @endforeach
                @else
                    <div class="error text-center" style="font-weight: bold;">No payment records</div>

                    @endif
                </table>
            </div>

        @endforeach
</div>
</div>
<script>
    function printDiv(divId) {
        $(".hide").hide();
        window.print();
        location.reload(true);
    }

</script>
@endsection
