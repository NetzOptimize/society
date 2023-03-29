@include('navbar')
@extends('layouts.main')
@section('content')
    <div style="height:100vh" class="d-flex flex-column justify-content-center align-items-center align-content-center">
        <form action="{{ route('admin.expense.store') }}" method="POST" class="d-flex flex-column gap-1" style=" width:500px">
            @csrf
            <label><b>NAME OF PAYEE</b></label>
            <input type="text" name= "payee" placeholder="enter name of organisation/individual">
            <div class="error">
                @error('payee')
                    {{ $message }}
                @enderror
            </div>
            <label><b>AMOUNT</b></label>
            <input type="text" name="amount" placeholder="enter amount">
            <div class="error">
                @error('amount')
                    {{ $message }}
                @enderror
            </div>
            <label><b>SELECT PAYMENT MODE</b></label>
            <select name="payment_modes_id">
                <option></option>
                @foreach ($PaymentModes as $PaymentMode)
                    <option value="{{ $PaymentMode->id }} ">{{ $PaymentMode->name }}</option>
                @endforeach
            </select>
            <div class="error">
                @error('payment_modes_id')
                    {{ $message }}
                @enderror
            </div>

            <label><b>DATE OF PAYMENT</b></label>
            <input type="date" name="dateofpayment" />
            <div class="error">
                @error('dateofpayment')
                    {{ $message }}
                @enderror
            </div>
            <label><b>ADD COMMENT</b></label>
            <textarea name="comments"></textarea>
            <div class="error">
                @error('comments')
                    {{ $message }}
                @enderror
            </div>
            <input type="submit" name="login" value="ADD PAYMENT" class="btn btn-secondary">
        </form>
    </div>
@endsection
