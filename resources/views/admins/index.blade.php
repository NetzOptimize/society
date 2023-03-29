@include('navbar')
@extends('layouts.main')
@section('content')

    {{-- search bar --}}
    <form action="" method="GET">
        @if (request('search'))
            <input type="search" name="search" value="{{ request('search') }}" />
        @else
            <input type="search" placeholder="  Search By Payee" name="search" />
        @endif
    </form>
    </div>

    {{-- refresh button--}}

    <a href="{{ route('admin.expense.index') }}" class="btn btn-secondary">REFRESH</a>
    
    {{-- listing --}}
    <table class="table table-light">
        <tr>
            <th>PAYEE</th>
            <th>AMOUNT</th>
            <th>PAYMENT MODE</th>
            <th>DATE OF PAYMENT <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
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
        <tr>
            @foreach ($expenses as $expense)
                <td>{{ $expense->payee }}</td>
                <td>{{ $expense->amount }}</td>
                <td>{{ $expense->paymentmode->name }}</td>
                <td>{{ $expense->dateofpayment }}</td>
                <td>{{ $expense->comments }}</td>
        </tr>
        @endforeach
    </table>
@endsection
