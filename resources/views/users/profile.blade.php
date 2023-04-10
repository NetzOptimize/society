@include('navbar')
@extends('layouts.main')
@section('content')

    <!--  -->
    <!-- custom -->
    <!--
        <div class="edit-password w-100 d-flex justify-content-center align-items-center">


        <div class="card" style="width: 18rem;">
          <img src="{{ asset('dummy.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Name {{ $user->name }}
        </h5>
            <p class="card-text">Mobile 1:{{ $user->mobile1 }}
         </p>
            <p class="card-text">Mobile2 :{{ $user->mobile2 }}
         </p> -->

    <!-- modal -->

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
         Reset Password
        </button> -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Your Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

              <form> -->
    <!-- @csrf -->

    <!-- <div class="mb-3">
            <label for="" class="d-flex">Old Password</label>
             <input type="password" class="form-control" id="Old-pass" placeholder="Enter Old Password" name="opass"> -->
    <!-- @error('oldpassword')
        {{ $message }}
    @enderror -->
    <!-- </div>
          <div class="mb-3">
          <label for="" class="d-flex">New Password</label> -->

    <!-- <input type="password" class="form-control" id="pwd" placeholder="Enter New Password" name="pswd">
             @error('newpassword')
        {{ $message }}
    @enderror -->
    <!-- </div>
          <div class="mb-3">
          <label for="" class="d-flex">Confirm Password</label>
             <input type="password" class="form-control" id="pwd" placeholder="Enter Confirm Password" name="pswd">
             @error('confirmPassword')
        {{ $message }}
    @enderror -->
    <!-- </div>

         </form>

                <form class="form" action="{{ route('user.resetpassword' ,$user) }}" method="POST">
                    @csrf

                    <fieldset>
                      <div class="form-group ">
                        <div class="input-group mb-3">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                          <input id="emailInput" placeholder="Current Password" class="form-control" type="Cpass"  name="oldpassword">

                        </div>

                      <div class="error mb-2">
                      @error('oldpassword')
        {{ $message }}
    @enderror
                      </div>


                        <div class="input-group  mb-3">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                          <input id="emailInput" placeholder="New Password" class="form-control" type="Npass"  name="newpassword">
                        </div>

                      <div class="error mb-2">      @error('newpassword')
        {{ $message }}
    @enderror</div>


                        <div class="input-group  mb-3">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                          <input id="emailInput  mb-2" placeholder="Confirm Password" class="form-control" type="Confirm-passowrd"  name="confirmPassword">

                        </div>
                        <div class="error mb-2">  @error('confirmPassword')
        {{ $message }}
    @enderror </div>
                      </div>
                      <div class="form-group mt-3">
                        <input class="btn btn-lg btn-primary btn-block" value="Reset My Password" type="submit" >
                      </div>
                    </fieldset>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

          </div>
        </div> -->
    <!-- </div> -->

    <!-- reset -->
    <!-- reset -->
    <!-- <div class="main-reset">
        <div class="container w-100">
            <div class="row">
                <div class="row">
                    <div class="col-md-12 col-md-offset-4">
                        <div class="panel panel-default w-100 d-flex justify-content-center align-items-center">
                            <div class="panel-body w-50 d-flex justify-content-center">
                                <div class="text-center w-50">
                                    <h3><i class="fa fa-lock fa-4x"></i></h3>
                                    <h2 class="text-center">Reset Password?</h2>
                                    <p>You can reset your password here.</p>
                                    <div class="panel-body">

                                        <form class="form" action="{{ route('user.resetpassword', $user) }}"
                                            method="POST">
                                            @csrf

                                            <fieldset>
                                                <div class="form-group ">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-envelope color-blue"></i></span>

                                                        <input type="password" id="emailInput" placeholder="Current Password"
                                                            class="form-control" type="Cpass" name="oldPassword">

                                                    </div>
                                                    <div class="error mb-3">  @error('oldPassword')
                                                        {{ $message }}
                                                    @enderror</div>
                                                    <div class="input-group  mb-3">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-envelope color-blue"></i></span>

                                                        <input type="password" id="emailInput" placeholder="New Password"
                                                            class="form-control" type="Npass" name="newPassword">

                                                    </div>
                                                    <div class="error mb-3">   @error('newPassword')
                                                        {{ $message }}
                                                    @enderror</div>
                                                    <div class="input-group  mb-3">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-envelope color-blue"></i></span>

                                                        <input type="password" id="emailInput  mb-2" placeholder="Confirm Password"
                                                            class="form-control" type="Confirm-passowrd"
                                                            name="confirmPassword">

                                                    </div>
                                                    <div class="error mb-3">
                                                        @error('confirmPassword')
                                                        {{ $message }}
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input class="btn btn-lg btn-primary btn-block"
                                                        value="Reset My Password" type="submit">
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
    </div> -->

    <!-- tenp -->
    <div class="main-profile-password">
    <div class="container padding-bottom-3x mb-2 mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="forgot">

          	<h2>Reset your password?</h2>
            <form class="form" action="{{ route('user.resetpassword', $user) }}"
                                            method="POST">
                                            @csrf

                                            <fieldset>
                                                <div class="form-group p-2">
                                                <label for="" class="fw-bold">Enter Your Current Password:</label>

                                                    <div class="input-group mb-3">

                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                        <input id="emailInput" placeholder="Current Password"
                                                            class="form-control" type="Cpass" name="oldPassword">

                                                    </div>
                                                    <div class="error mb-3">  @error('oldPassword')
                                                        {{ $message }}
                                                    @enderror</div>
                                                    <label for="" class="fw-bold">Enter Your New Password:</label>

                                                    <div class="input-group  mb-3">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-envelope color-blue"></i></span>

                                                        <input id="emailInput" placeholder="New Password"
                                                            class="form-control" type="Npass" name="newPassword">

                                                    </div>
                                                    <div class="error mb-3">   @error('newPassword')
                                                        {{ $message }}
                                                    @enderror</div>

                                                    <label for="" class="fw-bold">Confirm Your Password:</label>

                                                    <div class="input-group  mb-3">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-envelope color-blue"></i></span>

                                                        <input id="emailInput  mb-2" placeholder="Confirm Password"
                                                            class="form-control" type="Confirm-passowrd"
                                                            name="confirmPassword">

                                                    </div>
                                                    <div class="error mb-3">
                                                        @error('confirmPassword')
                                                        {{ $message }}
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group ms-2">
                                                    <input class="btn btn-lg btn-primary btn-block"
                                                        value="Reset My Password" type="submit">
                                                </div>
                                            </fieldset>
                                        </form>

          </div>


        </div>
      </div>
    </div>
  </div>
