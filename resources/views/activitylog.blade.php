@extends('layouts.main')
@section('title')
Society User-Profile
@endsection
@section('content')
<div class="main">
<div class="activiy-log-heading text-center mt-3 mb-3 ">
    <h2 class="p-4 bg-light ms-5 me-5">Activity-Log History</h2>

    </div>
<div class="activty-log w-100 d-flex justify-content-center table-responsive ">

<table class=" ms-5 me-5 table-bordered w-100   ">
    <thead>
    <tr class="bg-dark text-light">
        <th>Date</th>
        <th>Done By</th>
        <th>Action</th>
        <th>Module</th>
        <th>Summary</th>
        <th>Edited at</th>
        {{-- <th>Delete</th> --}}

    </tr>
    </thead>
    @foreach($activities as $activity)
    <tbody>
    <tr>
        @php
        $timestamp = time();
        $date = date('d-m-Y', $timestamp);

        @endphp
        <td>{{ $date }}</td>
        @if ($activity->user)
        <td>{{ ucfirst($activity->user->name) }} <br><small class="text-muted">{{ $activity->user->mobile1 }}</small></td>
        @else
        <td>N/A</td>
        @endif
        <td>{{ $activity->action }}</td>
        <td>{{ $activity->module->name }}</td>
        @if($activity->module_id==1)

        <!-- Modal -->
        <div class="modal fade" id="modal{{ $activity->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $activity->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                    </div>
                    <div class="modal-body">
                       @if(!empty( $activity->payment))
                        Billing Month: {{ $activity->payment->billingmonth }}<br>
                        Amount:{{  $activity->payment->amount }}<br>
                        Date of deposit:{{  $activity->payment->dateofdeposit }}<br>
                        Comment:{{  $activity->payment->comments }}
                        @else
                        This data has been removed
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <td class="view"><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal{{ $activity->id }}">
            view
        </button></td>
        @else
        <!-- Modal -->
        <div class="modal fade" id="modal{{ $activity->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $activity->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Expense</h5>
                    </div>
                    <div class="modal-body">
                        @if(!empty( $activity->expense))
                        Payee: {{ $activity->expense->payee }}<br>
                        Amount:{{  $activity->expense->amount }}<br>
                        Date of payment:{{  $activity->expense->dateofpayment }}<br>
                        Comment:{{  $activity->expense->comments }}
                        @else
                        This data has been removed
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ $activity->id }}">
            view
        </button></td>
        {{-- <td><a href="{{ route('expenses.index',$activity->module_item_id) }}" class="btn btn-dark">View</a></td> --}}
        @endif
        @php

        $timestamp = time();
        $time = date('H:i:s', $timestamp);


        @endphp
        <td>{{ $activity->created_at->diffForHumans() }}</td>
{{-- <td> <button class="btn btn-danger"> Delete</button></td> --}}
        @endforeach
    </tr>
</tbody>
</table>
</div>
</div>
@endsection
