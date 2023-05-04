@extends('layouts.main')
@section('title')
Society User-Profile
@endsection
@section('content')
<div class="main">
<div class="activiy-log-heading text-center mt-3 mb-3 ">
    <h2 class="p-4 bg-light ms-5 me-5">Activity-Log History</h2>
</div>

<div class="refresh-expenses pt-3 pe-5 d-flex justify-content-end align-items-center gap-2">
    <input type="search" id="search" placeholder="Search" class="search" />
</div>

{{-- datewise filter --}}
<div class="payment hide d-flex justify-content-center">
<form action="" method="GET" style="margin:0" id="payment-history-form" class="w-50">
    <label class="ms-3 me-3 text-center"><b>Start Date</b></label>
    @if (request('start_date'))
    <input type="date" name="start_date" value={{ request('start_date') }}>
    @else
    <input type="date" name="start_date" class="start-date">
    @endif
    <label class="ms-3 me-3 text-center"><b>End Date</b></label>
    @if (request('end_date'))
    <input type="date" name="end_date" value={{ request('end_date') }}>
    @else
    <input type="date" class="me-3" name="end_date" id="end-date">
    @endif
    <button class="btn btn-success me-3" type="submit" id="filter">Filter</button>
</form>
</div>

{{-- refresh button --}}
<div class="refresh-button pb-4 me-5 d-flex justify-content-end hide">
<a href="{{ route('activitylog') }}" class="btn btn-success d-flex align-items-center me-2">Refresh</a>

</div>
<div class="activty-log w-100 d-flex justify-content-center table-responsive ">

<table class=" ms-5 me-5 table-bordered w-100 data ">
    <thead>
    <tr class="bg-dark text-light">
        <th class="p-2">Date</th>
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
    <tr >
        <td>{{ $activity->created_at->format('d-m-y')}}</td>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

    // searching
    $(document).ready(function() {
        $("#search").keyup(function() {
            var value = $(this).val().toLowerCase();
            $(".data tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
@endsection
