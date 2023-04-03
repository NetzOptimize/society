@include('navbar')
@extends('layouts.main')
@section('content')

<div class="main container shadow mt-2 w-50" id="payment-method">
  <div class="payment-heading d-flex justify-content-start rounded   p-4" id="payment-heading">
    <h3>
      <img src="{{asset('debit-card.png')}}" alt="">
      Payment Methods
    </h3>
  </div>
  <div class="d-flex flex-column justify-content-center align-items-center align-content-center  container rounded pb-5 mt-2">
    <form action="{{ route('payment.store') }}" method="POST" class="d-flex flex-column gap-1" style=" width:600px">
      @csrf
      <label>
      <i class="fa fa-home" aria-hidden="true"></i>
        <b>House No.</b></label>
      <select name="house_id" class="form-control">
        <option value="" >Select House Number</option>
        @foreach ($houses as $house)
        <option value="{{ $house->id }} ">{{ $house->full_address }}</option>
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
      <div class="month">
          @foreach ($months as $key => $month)
          <div class="d-flex flex-row align-items-center justify-content-between">
            <label>{{ $month }}</label> <input type="checkbox" name="billingmonth[]" value="{{ $key }}">
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
        <select name="payment_modes_id" class="form-control">
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


        <label> <i class="fa fa-calendar" aria-hidden="true"></i>
          <b>Date Of Deposits:</b></label>
        <input type="date" name="dateofdeposit" class="form-control" value={{ now() }} />
        <div class="error">
          @error('dateofdeposit')
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
        
        <!-- payment -->
        <!-- <div class="container d-flex justify-content-center mt-5 mb-5">



<div class="row g-3">

  <div class="col">

    <span>Card Payment</span>
    <div class="card">

      <div class="accordion" id="accordionExample">

        <div class="card">
          <div class="card-header p-0" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <input type="text" class="form-control" placeholder="Paypal email">
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header p-0">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="d-flex align-items-center justify-content-between">

                  <span>Credit card</span>
                  <div class="icons">
                    <img src="https://i.imgur.com/2ISgYja.png" width="30">
                    <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                    <img src="https://i.imgur.com/35tC99g.png" width="30">
                    <img src="https://i.imgur.com/2ISgYja.png" width="30">
                  </div>

                </div>
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body payment-card-body">

              <span class="font-weight-normal card-text">Card Number</span>
              <div class="input">

                <i class="fa fa-credit-card"></i>
                <input type="text" class="form-control" placeholder="0000 0000 0000 0000">

              </div>

              <div class="row mt-3 mb-3">

                <div class="col-md-6">

                  <span class="font-weight-normal card-text">Expiry Date</span>
                  <div class="input">

                    <i class="fa fa-calendar"></i>
                    <input type="text" class="form-control" placeholder="MM/YY">

                  </div>

                </div>


                <div class="col-md-6">

                  <span class="font-weight-normal card-text">CVC/CVV</span>
                  <div class="input">

                    <i class="fa fa-lock"></i>
                    <input type="text" class="form-control" placeholder="000">

                  </div>

                </div>


              </div>

              <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>

            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



</div>


</div> -->
      <!-- payment end -->
      <input type="submit" name="login" value="Add Payment" class="btn btn-dark">
    </form>
  </div>
</div>
@endsection
<!--  -->
