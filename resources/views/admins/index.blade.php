@include('navbar')
@extends('layouts.main')
@section('content')

{{-- search bar --}}
<form action="" method="GET">
    @if (request('search'))
    <input type="search" name="search" value="{{ request('search') }}" />
    @else
    <div class="searchby-payee p-3">
        <input type="search" placeholder="  Search By Payee" name="search" />
    </div>
    @endif
</form>
</div>

{{-- refresh button--}}
<div class="refresh-expenses ps-3">
    <a href="{{ route('admin.expense.index') }}" class="btn btn-success">REFRESH</a>
</div>

{{-- listing --}}
<div class="table-expenses p-3">
    <table class="table table-light table-hover table-bordered">
        <tr class="align-middle text-center table-dark">
            <th>PAYEE</th>
            <th>AMOUNT</th>
            <th>PAYMENT MODE</th>
            <th>DATE OF PAYMENT <div class="dropdown">
                    <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (request('sort'))
                        {{ request('sort') }}
                        @else
                        sort
                        @endif
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?sort=ASCENDING">ASCENDING</a></li>
                        <li><a class="dropdown-item" href="?sort=DESCENDING">DESCENDING</a></li>
                    </ul>
                </div>
            </th>
            <th>COMMENTS</th>
        </tr>
        <tr class="text-center">
            @foreach ($expenses as $expense)
            <td class="text-center">{{ $expense->payee }}</td>
            <td class="text-center">{{ $expense->amount }}</td>
            <td class="text-center">{{ $expense->paymentmode->name }}</td>
            <td class="text-center">{{ $expense->dateofpayment }}</td>
            <td class="text-center">{{ $expense->comments }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection