@extends('layouts.main')
@section('title')
Society User-Profile
@endsection
@section('content')
<h2>Acitivity-logs</h2>
<table>
    <tr>
        <th>Date</th>
        <th>Done By</th>
        <th>Action</th>
        <th>Module</th>
        <th>Item</th>
    </tr>
    @foreach($activities as $activity)
    <tr>
        @php
        $timestamp = time();
        $date = date('d-m-Y', $timestamp);

        @endphp
        <td>{{ $date }}</td>
        @if ($activity->user)
        <td>{{ ucfirst($activity->user->name) }} <br><small>{{ $activity->user->mobile1 }}</small></td>
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
                        This item has been removed
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
        @else
        <!-- Modal -->
        <div class="modal fade" id="modal{{ $activity->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $activity->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                    </div>
                    <div class="modal-body">
                        @if(!empty( $activity->expense))
                        Payee: {{ $activity->expense->payee }}<br>
                        Amount:{{  $activity->expense->amount }}<br>
                        Date of payment:{{  $activity->expense->dateofpayment }}<br>
                        Comment:{{  $activity->expense->comments }}
                        @else
                        This item has been removed
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

        @endforeach
    </tr>
</table>
@endsection
