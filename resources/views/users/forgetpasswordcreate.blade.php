@extends('layouts.main')
@section('content')
<!-- <form action="{{ route('forgetpassword.store',$user) }}" method="POST">
    @csrf
    <label>New Password</label>
    <input type="password" name="password">
    @error('password')
        {{ $message }}  
    @enderror
    <label>Confirm Password</label>
    <input type="password" name="confirmPassword">
    @error('confirmPassword')
        {{ $message }}
    @enderror
    <input type="submit" value="Submit">
</form>
@endsection -->

<div class="container d-flex justify-content-center">
    <div class="row w-100" id="forgot-password-row1">
        <div class="row d-flex justify-content-center align-items-center" >
            <div class="col-md-4 col-md-offset-4 border p-4 shadow" id="forgot-width">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Reset Password?</h2>
                             <div class="panel-body">
                              <form action ="{{ route('forgetpassword.store',$user) }}" class="form" method="POST">
                              @csrf

                                <fieldset>
                                  
                                  <div class="form-group ">
                                    <div class="input-group  mt-3">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                      <input id="pass" name="npassword" placeholder="New Password" class="form-control" type="password" >
                                    </div>
                                    <div class="error">   @error('password')
        {{ $message }}  
    @enderror</div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group  mt-3">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                      <input id="emailInput" name="confirmpassowrd" placeholder="Confirm Password" class="form-control" type="password" >
                                    </div>
                                    <div class="error">    @error('confirmPassword')
        {{ $message }}
    @enderror</div>
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