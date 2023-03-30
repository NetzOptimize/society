@include('navbar')
@extends('layouts.main')
@section('content')
<div class="d-flex flex-column justify-content-center align-items-center align-content-center p-4">
    <form action="{{ route('payment.store') }}" method="POST" class="d-flex flex-column gap-1" style=" width:500px">
        @csrf
        <label><b>HOUSE NO.</b></label>
        <select name="house_id" class="form-control">
            <option></option>
            @foreach ($houses as $house)
            @php
            $address = $house->Block1 . $house->Block2 . $house->house_no;
            @endphp
            <option value="{{ $house->id }} ">{{ $address }}</option>
            @endforeach
        </select>
        <div class="error">
            @error('house_id')
            {{ $message }}
            @enderror
        </div>
        <label><b>SELECT BILLING MONTHS</b></label>
        {{-- <div class="d-flex flex-row align-items-center justify-content-between "><label>INITIAL PAYMENT</label><input type="checkbox" name="initialpayment" value="1"></div> --}}
        @foreach ($months as $key => $month)
        <div class="d-flex flex-row align-items-center justify-content-between"><label>{{ $month }}</label> <input type="checkbox" name="billingmonth[]" value="{{ $key }}"></div>
        @endforeach
        <div class="error">
            @error('billingmonth')
            {{ $message }}
            @enderror
        </div>

        <label><b>SELECT PAYMENT MODE</b></label>
        <select name="payment_modes_id" class="form-control">
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

        <label><b>DATE OF DEPOSITS</b></label>
        <input type="date" name="dateofdeposit" class="form-control" />
        <div class="error">
            @error('dateofdeposit')
            {{ $message }}
            @enderror
        </div>

        <input type="submit" name="login" value="ADD PAYMENT" class="btn btn-secondary">
    </form>
</div>
@endsection