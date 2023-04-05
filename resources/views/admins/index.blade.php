@include('navbar')
@extends('layouts.main')
@section('content')

{{-- search bar --}}
<div class="main ">

<div class="houses-list  text-center me-5 ms-5 bg-light p-4  mt-3">
    <h3>Lists Of Payment</h3>
</div>

<form action="" method="GET" class="searchby-payee d-flex justify-content-end pt-4 pe-5 mt-2">
    @if (request('search'))
    <input type="search" name="search" value="{{ request('search') }}"  />
    @else
    <div class="searchby-payee d-flex justify-content-end pt-4 mt-2">
        <input type="search" placeholder="  Search By Payee" name="search" />
    </div>
    @endif
</form>
</div>

{{-- refresh button--}}
<div class="refresh-expenses pt-3 pe-5 d-flex justify-content-end">
    <a href="{{ route('admin.expense.index') }}" class="btn btn-success">Refresh</a>
</div>

{{-- listing --}}
<div class="table-expenses ps-5 pe-5 pt-3  mt-3">
    <table class="table table-light table-hover table-bordered">
        <tr class="table-dark">
            <th>Payee</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th class="d-flex align-items-center ">Date Of Payments <div class="dropdown ms-2">
                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (request('sort'))
                        {{ request('sort') }}
                        @else
                        Order By
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="?sort=ASCENDING">Ascending</a></li>
                        <li><a class="dropdown-item" href="?sort=DESCENDING">Descending</a></li>
                    </ul>
                </div>
            </th>
            <th>Comments</th>
        </tr>
        <tr class=" ">
            @foreach ($expenses as $expense)
            <td class="">{{ $expense->payee }}</td>
            <td class="">{{ $expense->amount }}</td>
            <td class="">{{ $expense->paymentmode->name }}</td>
            <td class="">{{ $expense->dateofpayment }}</td>
            <td class="">{{ $expense->comments }}</td>
        </tr>
        @endforeach
    </table>
</div>
</div>
@endsection
