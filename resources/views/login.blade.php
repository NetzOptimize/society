@extends('layouts.main')
@section('content')

<div class="main-login bg-light"> 
<div style="height:100vh" class="d-flex flex-column justify-content-center align-items-center align-content-center">
<div class="logo text-center pe-5">
             <h3><img src="{{ asset('logo.png') }}" class="rounded-pill" style="height:80px; width:100px;"
               alt=""> Society Login</h3>

        </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded ">
     

        <form action="{{ route('login.check') }}" method="POST" class="d-flex flex-column gap-3 p-3" style=" width:500px" id="login-form">
            @csrf

            <label>MOBILE:</label>
            <input type="tel" name="mobile1" class="form-control" placeholder="Enter your mobile">
            <!-- <div class="error">
                @error('mobile1')
                {{ $message }}
                @enderror
            </div> -->
            <label>PASSWORD:</label>
            <input type="password" name="password"  class="form-control" placeholder="Enter your password">
            <!-- <div class="error">
                @error('password')
                {{ $message }}
                @enderror
            </div> -->
            <input type="submit" name="login" value="LOGIN" class="btn btn-dark">

            <div class="forgot-password text-center">
                <p class="text-center"><a href="" class="text-primary">Forgot Password ?</a></p>

                <p>Don't have an account? <span> <a href="" class="text-decoration-none text-primary">Sign Up</a> </span></p>
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
    mobile1:"*Enter your Mobile 1",
    password:"*Please enter Password"
}

});



    })
 

    </script>
@endsection