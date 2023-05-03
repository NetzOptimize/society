
@extends('layouts.main')
@section('title')
Society Edit Payment
@endsection
@section('content')
    <div class="main-payment-method">
        <div class="main   shadow mt-2 w-50 p-3" id="payment-method">
            <div class="payment-heading d-flex justify-content-start rounded   p-4" id="payment-heading">
                <h3>
                    <img src="{{ asset('debit-card.png') }}" alt="">
                    Edit Payment
                </h3>
            </div>
            <div
                class="d-flex flex-column justify-content-center align-items-center align-content-center  container rounded   mt-3">
                <form action="{{ route('payments.update', $payment) }}" method="POST" class="d-flex flex-column gap-1              "
                    id="payment-method-form">
                    @csrf
                    @method('PUT')
                    <label>
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <b>House No.</b></label>
                    <select name="house_id" class="form-control" id="house_id">
                        @foreach ($houses as $house)
                            @php
                                $ownerName = [];
                                foreach ($house->residents as $resident) {
                                    $ownerName[] = $resident->isOwner == 1 ? ucfirst($resident->user?->name) : '';
                                }
                                $ownerName = implode(' ', $ownerName);
                            @endphp
                            @if ($payment->house_id == $house->id)
                                <option value="{{ $house->id }} " selected>{{ $house->full_address }} {{ $ownerName }}
                                </option>
                            @else
                                <option value="{{ $house->id }} ">{{ $house->full_address }} {{ $ownerName }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="error">
                        @error('house_id')
                            {{ $message }}
                        @enderror
                    </div>

                    <label>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <b>Select Billing Months:</b>
                    </label>
                        <select name="billingmonth" class="form-control">
                            @foreach ($months as $key => $month)
                                @if ($key == $payment->billingmonth)
                                    <option value="{{ $key }}" selected>{{ $month }}</option>
                                @else
                                    <option value="{{ $key }}">{{ $month }}</option>
                                @endif
                            @endforeach

                        </select>

                        <label> <i class="fa fa-credit-card"></i>
                            <b>Payment Mode:</b></label>
                        <select name="payment_modes_id" class="form-control" id="payment_cursor">
                            @foreach ($PaymentModes as $PaymentMode)
                                @if ($payment->payment_modes_id == $PaymentMode->id)
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


                        <label> <i class="fa fa-calendar" aria-hidden="true"></i>
                            <b>Date Of Deposits:</b></label>
                        <input type="date" name="dateofdeposit" class="form-control"
                        value="{{ date('Y-m-d', strtotime($payment->dateofdeposit)) }}" />
                        <div class="error">
                            @error('dateofdeposit')
                                {{ $message }}
                            @enderror
                        </div>

                        <label><b>Add Comment:</b></label>
                        <textarea name="comments"class="form-control">{{ $payment->comments }}</textarea>
                        <div class="error">
                            @error('comments')
                                {{ $message }}
                            @enderror
                        </div>
                        <input type="submit" name="login" value="Save Changes" class="btn btn-dark">
                </form>
                <a href="{{ route('payments.index') }}"  class="btn btn-dark">Cancel</a>
            </div>
        </div>
    </div>
@endsection
