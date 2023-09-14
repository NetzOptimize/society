@extends('layouts.main')

@section('title')

Society Create Payment

@endsection

@section('content')

<img src="{{ asset('loading.gif') }}" alt="Loading"  id="loading-text" width="50%" height="50%">

<div class="main-payment-method">

  <div class="main   shadow mt-2 w-50 p-3" id="payment-method">

    <div class="payment-heading d-flex justify-content-start rounded   p-4" id="payment-heading">

      <h3>

        <img src="{{ asset('debit-card.png') }}" alt="">

        Manage Payment

      </h3>

    </div>

    <div class="d-flex flex-column justify-content-center align-items-center align-content-center  container rounded pb- mt-2">

      <form action="{{ route('payments.store') }}" method="POST" class="d-flex flex-column gap-1" id="payment-method-form">

        @csrf

        <label>

          <i class="fa fa-home" aria-hidden="true"></i>

          <b>House No.</b></label>

        <select name="house_id" class="form-select" id="house_id">

          <option value="">Select House Number</option>

          @foreach ($houses as $house)

          @php

          $ownerName = [];

          foreach ($house->residents as $resident) {

          $ownerName[] = $resident->isOwner == 1 ? ucfirst($resident->user?->name) : "";

          }

          $ownerName = implode(" ", $ownerName);

          @endphp

          <option value="{{ $house->id }} ">{{ $house->full_address }} {{ $ownerName }}</option>

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

        <div class="month" id="houseSelect">

          @foreach ($months as $key => $month)
          @if($key == 'All')
          @continue
          @endif

          <div class="d-flex flex-column align-items-center justify-content-between w-100" id="months_gap">

            <div class="d-flex flex-row  justify-content-between w-100">

              <label>{{ $month }}</label>

              <input type="checkbox" class="myCheckbox w-auto" name="billingmonth[]" value="{{ $key }}">

            </div>

            <div class="d-flex flex-row  justify-content-between w-100 date-mode">

              <p id="date{{ $key }}"></p>

              <p id="mode{{ $key }}"></p>

            </div>

          </div>

          @endforeach

        </div>

        <div class="error">

          @error('billingmonth')

          {{ $message }}

          @enderror

        </div>



        <label> <i class="fa fa-credit-card"></i>

          <b>Payment Mode:</b></label>

        <select name="payment_modes_id" class="form-select" id="payment_cursor">

          @foreach ($PaymentModes as $PaymentMode)

          @if($PaymentMode->id==2)

          <option value="{{ $PaymentMode->id }} "selected>{{ $PaymentMode->name }}</option>

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

        <input type="date" name="dateofdeposit" class="form-control" value={{ now() }} />

        <div class="error">

          @error('dateofdeposit')

          {{ $message }}

          @enderror

        </div>



        <label><b>Add Comment:</b></label>

        <textarea name="comments" class="form-control" >Updated on whatsapp</textarea>

        <div class="error">

          @error('comments')

          {{ $message }}

          @enderror

        </div>



        <label><i class="fa fa-money" aria-hidden="true"></i>



          <b>Total Payment:</b></label>

        <input type="textbox" class="form-control" id="payment" />

        <input type="submit" name="login" value="Save Changes" class="btn btn-dark">



      </form>

    </div>

  </div>

</div>

{{-- checked checkboxes when house selected --}}

<script>

  var payment = 0;

  $('#house_id').on('change', function() {

    $("p").empty();

    $('#loading-text').show();

    var houseId = $(this).val();

    $.ajax({

      url: "{{ url('/ajax') }}",

      type: 'POST',

      data: {

        "_token": " {{ csrf_token() }}",

        house_id: houseId

      },

      dataType: 'json',

      success: function(response) {

        // reseting the value of payment

        payment = 0;

        $("#payment").val(0)



        var payments = response.payments;

        $('#houseSelect input[type="checkbox"]').prop('checked', false).attr('disabled', false);

        $.each(payments, function(index, payment) {

          $('#houseSelect input[value="' + payment.billingmonth + '"]').prop('checked', true).attr('disabled', true);

          $('#date'.concat(payment.billingmonth)).html('<span class="label">Date:</span> ' + payment.dateofdeposit);

          $('#mode'.concat(payment.billingmonth)).html('<span class="label">Mode:</span> ' + payment.name);

        });

        $('#loading-text').hide();



      },

      error: function() {

        console.log('Error occurred. Please try again.');

      }

    });

  });



  // showing total payment



  $('.myCheckbox').on('change', function() {

    if (this.checked) {

      var value = $(this).val();

      if (value == "init") {

        payment += 2100;

      } else {

        payment += 700;

      }



    } else {

      var value = $(this).val();

      if (value == "init") {

        payment -= 2100;

      } else {

        payment -= 700;

      }

    }

    $("#payment").val(payment)

  });

</script>

@endsection





