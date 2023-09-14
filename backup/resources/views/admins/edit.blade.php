
@extends('layouts.main')
@section('title')
Society Expense Edit
@endsection
@section('content')
<div class="main-expense-create">
<div class="main container w-50 shadow rounded mt-3 " id="expense-create">
<div class="Manage-expenses-heading d-flex justify-content-start rounded p-4 mt-3" id="expense-heading">
    <h3 class="d-flex align-items-center justify-content-center"> <img src="{{asset('payment1.gif')}}" style="height:40px; width:60px;" alt=""> Edit Expenses</h3>
</div>
    <div class="d-flex flex-column justify-content-center align-items-center align-content-center pb-2 pt-2 container">
        <form action="{{ route('expenses.update', $expense) }}" method="POST" class="d-flex flex-column gap-2 pb-3" id="expense-create-form">
            @csrf
            @method('PUT')
            <label><b>Name Of Payee:</b></label>
            <input type="text" name= "payee" value="{{ $expense->payee }}"class="form-control">
            <div class="error">
                @error('payee')
                    {{ $message }}
                @enderror
            </div>
            <label><b>Amount:</b></label>
            <input type="text" name="amount" value="{{ $expense->amount }}" class="form-control">
            <div class="error">
                @error('amount')
                    {{ $message }}
                @enderror
            </div>
            <label><b>Select Payments Mode:</b></label>
            <select name="payment_modes_id"class="form-select payment-cursor">
                <option value="">Select Payment Method</option>
                @foreach ($PaymentModes as $PaymentMode)
                @if ($PaymentMode->id == $expense->payment_modes_id)
                <option value="{{ $PaymentMode->id }} " selected>{{ $PaymentMode->name }}</option>
                @else
                <option value="{{ $PaymentMode->id }} ">{{ $PaymentMode->name }}</option>
                @endif
                @endforeach
            </select>
            <div class="error">
                @error('payment_modes_id')
                    {{ $message }}
                @enderror
            </div>
            <label><b>Date Of Payment:</b></label>
            <input type="date" name="dateofpayment" class="form-control"  value="{{ date('Y-m-d', strtotime($expense->dateofpayment)) }}" />
            <div class="error">
                @error('dateofpayment')
                    {{ $message }}
                @enderror
            </div>
            <label><b>Add Comment:</b></label>
            <textarea name="comments"class="form-control" value=>{{ $expense->comments }}</textarea>
            <div class="error">
                @error('comments')
                    {{ $message }}
                @enderror
            </div>
            <input type="submit" value="Save Changes" class="btn btn-dark">
        </form>
    </div>
    </div>
@endsection
</div>
