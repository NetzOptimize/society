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
        <input type="submit" name="login" value="Add Payment" class="btn btn-dark">
    </form>
  </div>
</div>
@endsection
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

<!-- payment-receipt -->
<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
   <div class="main d-flex flex-column  gap-4  ms-5 me-5">
    <div class="receipt-main w-50 mt-3 mb-3 bg-light">
      <div class="row d-flex justify-content-center align-items-center mt-4 mb-4 ms-5 me-5" id="row1">
        <div class="col">
          <div class="heading-receipt text-dark">
            <h3>Receipt - January</h3>
          </div>

        </div>
        <div class="col">
          <div class="logo-receipt text-end">
            <img src="{{asset('logo1.png')}}" class="rounded-pill"  style="height:70px" alt="">
          </div>
        </div>
      </div> -->
      <!--row2  -->
      <!-- <div class="row d-flex justify-content-center align-items-center  mt-4 mb-4 ms-5 me-5" id="row2">
        <div class="col mt-3 mb-3">
          <div class="company-name">
            <p style="font-weight:bold">Society :</p>
            <p>
              Address: Lorem ipsum dolor <br> sit amet consectetur adipisicing elit.<br> Nisi error
            </p>
          </div>

          <div class="send-to">
            <p style="font-weight:bold">To</p>
            <p>
              <span> Buyers ltd,<br>
              </span>
              address:Lorem ipsum <br>dolor  sit amet consectetur adipisicing elit.<br> Nisi error
            </p>
          </div>
        </div>
        <div class="col" id="payment-report">



        </div>
      </div> -->

      <!-- row3 -->
      <!-- <div class="row mt-3 mb-3  mt-4 mb-4 ms-5 me-5"  id="row3">
      <table class="table">
  <thead class="thead-dark">
    <tr>
       <th scope="col">House No.</th>
      <th scope="col">Month</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       <td>dsa1</td>
      <td>January</td>
      <td>3000/-</td>
    </tr>



  </tbody>
</table>
<div class="total d-flex justify-content-end" style="width:770px">
  <p class="text-success" style="font-weight: bold">
    Total Amount Paid : 3000/-
  </p>
</div>

      </div> -->
      <!-- row4 -->
      <!-- <div class="row  mt-4 mb-4 ms-5 me-5" id="row4">
<div class="col">
  <p> <span style="font-weight:bold">Registered Address: <br></span>

  Lorem ipsum  <br> consectetur, <br>adipisicing elit. Eligendi  </p>

      </div>

      <div class="col">
  <p> <span style="font-weight:bold">Contact Info: <br></span>

  Lorem ipsum  <br> consectetur, <br>adipisicing elit. Eligendi  </p>

      </div>
      <div class="col">
  <p> <span style="font-weight:bold">Payment Details: <br></span>

  Gpay <br> consectetur, <br>adipisicing elit. Eligendi  </p>

      </div>


    </div>
    <div class="bottom-border">

    </div>
  </div>


</body>

</html> -->
<!-- payment-receipt end -->
