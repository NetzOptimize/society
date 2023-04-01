@include('navbar')
@extends('layouts.main')
@section('content')


<div class="main container w-50 shadow rounded mt-3 p-4" id="expense-create">
<div class="Manage-expenses-heading text-center">
    <h3 class="d-flex align-items-center justify-content-center"> <img src="{{asset('manage-expenses.webp')}}" style="height:40px; width:60px;" alt=""> Manage Expenses</h3>
</div>
    <div class="d-flex flex-column justify-content-center align-items-center align-content-center pb-2 pt-2 container">
        <form action="{{ route('admin.expense.store') }}" method="POST" class="d-flex flex-column gap-2" style=" width:500px">
            @csrf
            <label><b>Name Of Payee:</b></label>
            <input type="text" name= "payee" placeholder="Enter Name of Organisation/Individual"class="form-control">
            <div class="error">
                @error('payee')
                    {{ $message }}
                @enderror
            </div>
            <label><b>Amount:</b></label>
            <input type="text" name="amount" placeholder="Enter amount" class="form-control">
            <div class="error">
                @error('amount')
                    {{ $message }}
                @enderror
            </div>
            <label><b>Select Payments Mode:</b></label>
            <select name="payment_modes_id"class="form-control">
                <option value="">Select Payment Method</option>
                @foreach ($PaymentModes as $PaymentMode)
                    <option value="{{ $PaymentMode->id }} ">{{ $PaymentMode->name }}</option>
                @endforeach
            </select>
            <div class="error">
                @error('payment_modes_id')
                    {{ $message }}
                @enderror
            </div>
            <label><b>Date Of Payment:</b></label>
            <input type="date" name="dateofpayment" class="form-control"  value={{ now() }}/>
            <div class="error">
                @error('dateofpayment')
                    {{ $message }}
                @enderror
            </div>
            <label><b>Add Comment:</b></label>
            <textarea name="comments"class="form-control"></textarea>
            <div class="error">
                @error('comments')
                    {{ $message }}
                @enderror
            </div>
            <input type="submit" name="login" value="Add Payment" class="btn btn-dark">
        </form>
    </div>
    </div>
@endsection
