@extends('layouts.main')
@section('content')

 

 
<div class="container d-flex justify-content-center">
    <div class="row w-100" id="forgot-password-row1">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-4 col-md-offset-4 border p-4 shadow">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Forgot Password?</h2>
                          <p> We are sending this email because you requested <br> you requested a password reset.</p>
                            <div class="panel-body">
                              
                              <form action ="{{ route('forgetpassword') }}" class="form" method="POST">
                                
                                <fieldset>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                      <input id="emailInput" name="mobile" placeholder="Email address" class="form-control" type="text" >
                                    </div>
                                  </div>
                                  <div class="form-group mt-3 w-100">
                                    <input class="btn btn-lg btn-primary btn-block " value="Send My Password" type="submit">
                                  </div>
                                </fieldset>
                              </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Reset password</h3>
		
		<div class="card-text">
			<form action="{{ route('forgetpassword') }}" class="form">
				<div class="form-group">
					<label for="exampleInputEmail1">Enter your email address and we will send you a link to reset your password.</label>
					<input type="email" name="email" class="form-control form-control-sm" placeholder="Enter your email address">
				</div>

				<a type="submit" class="btn btn-primary btn-block">Send password reset email</a>
			</form>
		</div>
	</div>
</div> -->

<!--  -->

<!--  -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$('document').ready(function(){

$('.form').validate({

    rules:{
        mobile:{
            'required':true
        }

    },
    messages:{

        mobile:'*Please Enter Your mobile For Send Link'

    }

})


})
</script>
