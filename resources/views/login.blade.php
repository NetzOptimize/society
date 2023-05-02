@extends('layouts.mainWithoutNav')
@section('title')
Society Login
@endsection
@section('content')

<div class="main-login   " id="background">



<div class="d-flex justify-content-center align-items-center h-100" id="login-height">



    <nav class="navbar navbar-expand-lg shadow p-3 bg-body rounded" id="login">

    <div class="side-image me-3">
    <img src="{{asset('people.gif')}}" class="h-80 rounded" alt="">
</div>
        <form action="{{ route('login.check')}}" method="POST" class="d-flex flex-column gap-3 p-3 " id="login-form">
            @csrf
            <div class="logo">
             <h3><img src="{{ asset('logo1.png') }}" class="rounded-pill " style="height:50px; width:50px;"
               alt=""> Society Login</h3>

        </div>
            <label>MOBILE:</label>
            <input type="tel" name="mobile1" class="form-control"  maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter your mobile">
            <!-- <div class="error">
                @error('mobile1')
                {{ $message }}
                @enderror
            </div> -->
            <div class="demo">
            <label>PASSWORD:</label>
            <input type="password" name="password"  class="form-control mt-3" id="password" placeholder="Enter your password">
            <i class="fa-solid fa-eye" id="eye"></i>

        </div>
            <!-- <div class="error">
                @error('password')
                {{ $message }}
                @enderror
            </div> -->
            <input type="submit" name="login" value="LOGIN" class="btn btn-dark mt-3">

            <div class="forgot-password text-center">
                <p class="text-center"><a href="{{ route('forget-password') }}" id="forgot">Forgot Password ?</a></p>

             </div>
        </form>
    </nav>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>

    $(document).ready(function(){
        $("#login-form").validate({

rules:{
    mobile1:'required',
    password:'required'
},
messages:{
    mobile1:"*Enter Your Mobile Number ",
    password:"*Please Enter Password"
}

});

    })
// js

const passwordInput = document.querySelector("#password")
const eye = document.querySelector("#eye")
eye.addEventListener("click", function(){
  this.classList.toggle("fa-eye-slash")
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
  passwordInput.setAttribute("type", type)
})

// js
</script>
@endsection
