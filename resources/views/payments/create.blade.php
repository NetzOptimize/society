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

          <b>House No.</b>
        
        </label>

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

          <i class="fa fa-home" aria-hidden="true"></i>

          <b>Resident Type</b>
        
        </label>

        <select name="resident_type" class="form-select" id="resident_type">
          <option value="0">Select Resident Type</option>
          <option value="1" >Non-Commercial</option>
          <option value="2">Commercial</option>
        </select>

        <label>
          <div class="error error-residentType" >

          </div>

          <label>

            <i class="fa fa-home" aria-hidden="true"></i>
  
            <b>Payment Type</b>
          
          </label>  

          <select name="payment_type" class="form-select mb-3" id="payment_type">

            <option value="0">Select Payment Type</option>

            <option value="1">Monthly</option>

            <option value="2" >6 Months</option>

            <option value="3">Yearly</option>

          </select>

          <div class="error error-paymentType">

          </div>

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

        <div class="error error-checkbox">

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

        <div class="error ">

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
  var checked = 0;
  var residentType = $("#resident_type").val();
  console.log(residentType);
  var paymentType = $("#payment_type").val();
  var payment = 0;
  var amount=0;
  var initAmount=0;

  $('#resident_type').on('change', function() {
    $('.error-residentType').html("");
    payment = 0;
    checked = 0;

    $("#payment").val(payment)
    residentType = $(this).val();

    if(paymentType!=0){
      $.ajax({
      type: "POST",
      url: "{{route('get-amount')}}",
      data: {
        "_token": "{{ csrf_token() }}",
        residentType: residentType,
        paymentType: paymentType,
      },
      success: function (response) {
        initAmount = Number(response.initialMonth);
        amount = Number(response.monthly);
        console.log(initAmount, amount);
      }
    });
    }
  })

  $('#payment_type').on('change', function() {
    $('#houseSelect input[type="checkbox"]:not(:checked)').attr('disabled', false);
    $(".error-PaymentType").html("");
    var residentType = $("#resident_type").val();
    var paymentType = $("#payment_type").val();
    if(residentType == 0){
      console.log("Please Select Resident Type First");
      return;
    }
    var checkedCheckboxes = $("#houseSelect input[type='checkbox']:checked:not(:disabled)");
    checkedCheckboxes.prop('checked',false);
    payment = 0;
    checked = 0;
    $("#payment").val(payment)
    paymentType = $(this).val();
    $.ajax({
      type: "POST",
      url: "{{route('get-amount')}}",
      data: {
        "_token": "{{ csrf_token() }}",
        residentType: residentType,
        paymentType: paymentType,
      },
      success: function (response) {
        initAmount = Number(response.initialMonth);
        amount = Number(response.monthly);
        console.log(initAmount, amount);
      }
    });
    
  })

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
        checked = 0;

        $("#payment").val(0)



        var payments = response.payments;
        var residentType = response.resident_type;
        
        if(residentType == 1){
          $("#resident_type").val(1);
          $("#resident_type").prop('disabled', true);

        }else if(residentType == 2){
          $("#resident_type").val(2);
          $("#resident_type").prop('disabled', true);
        }else{
          $("#resident_type").val(0);
          $("#resident_type").prop('disabled', false);
        }


        $('#houseSelect input[type="checkbox"]').prop('checked', false).attr('disabled', false);

        $.each(payments, function(index, payment) {

          $('#houseSelect input[value="' + payment.billingmonth + '"]').prop('checked', true).attr('disabled', true);

          $('#date'.concat(payment.billingmonth)).html('<span class="label">Date:</span> ' + payment.dateofdeposit);

          $('#mode'.concat(payment.billingmonth)).html('<span class="label">Mode:</span> ' + payment.name);

        });
        var paymentType = $("#payment_type").val();
        if(paymentType == 0){
          $('#loading-text').hide();
          console.log('please select payment type');
          return;
        }else{
          $.ajax({
          type: "POST",
          url: "{{route('get-amount')}}",
          data: {
            "_token": "{{ csrf_token() }}",
            residentType: residentType,
            paymentType: paymentType,
          },
          success: function (response) {
            initAmount = Number(response.initialMonth);
            amount = Number(response.monthly);
            console.log(initAmount, amount);
          }
        });
        }


        
        $('#loading-text').hide();



      },

      error: function() {

        console.log('Error occurred. Please try again.');

      }

    });

  });



  // showing total payment


  $('.myCheckbox').on('change', function() {
    $(".error-checkbox").html("");

    console.log($(this).val());
    dateString = $(this).val();
    var dateComponents = dateString.split('-');
    
    const date = new Date();
    if(dateComponents[0] != "init"){
    date.setMonth(dateComponents[1]-1);
    date.setFullYear(dateComponents[2]);
    date.setDate(dateComponents[0]);
    }
    currentDate = new Date();

    // if((date.getYear()<=currentDate.getYear() && date.getMonth() < currentDate.getMonth() ) && dateComponents[0] != "init"){
    //   console.log("i am here")
    // if (this.checked) {

    //   var value = $(this).val();

    //   if (value == "init") {
    //     checked = checked+1;
    //     payment += 2100;

    //   } else {
    //     checked = checked+1;
    //     payment += 700;

    //   }



    // } else {

    //   var value = $(this).val();
      
    //   if (value == "init") {
    //     checked = checked-1;
    //     payment -= 2100;

    //   } else {
    //     checked = checked-1;
    //     payment -= 700;

    //   }

    // }
    // }else{
      
      if(amount == 0){
        return;
      }
    if (this.checked) {

      var value = $(this).val();

      if (value == "init") {
        checked = checked+1;
        payment += initAmount;

      } else {
        checked = checked+1;
        payment += amount;

      }



    } else {

      var value = $(this).val();

      if (value == "init") {
        checked = checked-1;
        payment -= initAmount;

      } else {
        checked = checked-1;
        payment -= amount;

      }

    }
    // }
    paymentType = $("#payment_type").val();
    console.log(paymentType);
    if(paymentType == 2){
      if(checked>5){
        $('#houseSelect input[type="checkbox"]:not(:checked)').attr('disabled', true);
      }else{
        $('#houseSelect input[type="checkbox"]:not(:checked)').attr('disabled', false);
      }
    }else if(paymentType == 3){
      if(checked>11){
        $('#houseSelect input[type="checkbox"]:not(:checked)').attr('disabled', true);
      }else{
        $('#houseSelect input[type="checkbox"]:not(:checked)').attr('disabled', false);
      }
    }


    
    
    $("#payment").val(payment)

  });
  $('#payment-method-form').submit(function (e) { 
    console.log(paymentType);
    residentType = $("#resident_type").val();
    console.log(residentType);
    paymentType = $("#payment_type").val();
      e.preventDefault();
      if(paymentType == 2 && checked<6){
        $(".error-checkbox").html("Please select atleast 6 months");
        return;
      }
      if(paymentType == 3 && checked<12){
        $(".error-checkbox").html("Please select atleast 12 months");
        return;
      }
      if(paymentType == 0){
        $(".error-paymentType").html("Please select payment type");
        return;
      }
      if(residentType == 0){
        $(".error-residentType").html("Please select resident type");
        return;
      }
      if(checked == 0){
        $('.error-checkbox').html("Please select atleast one month");
        return;
      }
      if(payment == 0){
        $('.error-checkbox').html("Please select atleast one month");
        return;
      }
      // console.log("submit")
      this.submit();
      

    

    
    
  });

</script>

@endsection





