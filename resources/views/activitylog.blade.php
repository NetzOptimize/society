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
        {{-- <td>{{ $activity->module_item_id }}</td> --}}
        @if($activity->module_id==1)
            <td><a href="{{ route('payments.index',$activity->module_item_id) }}" class="btn btn-dark">View</a></td>
        @else
            <td><a href="{{ route('expenses.index',$activity->module_item_id) }}" class="btn btn-dark">View</a></td>
        @endif
        @php

        $timestamp = time();
        $time = date('H:i:s', $timestamp);


    @endphp
    <td>{{  $activity->created_at->diffForHumans() }}</td>

    @endforeach
    </tr>
</table>
@endsection
