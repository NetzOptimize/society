@extends('layouts.main')
@section('title')
Society User-Profile
@endsection
@section('content')
<!-- tenp -->
<div class="main-profile-password">
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="forgot">

                    <h2>Reset your password?</h2>
                    <form class="form" action="{{ route('user.resetpassword', $user) }}" method="POST">
                        @csrf

                        <fieldset>
                            <div class="form-group p-2">
                                <label for="" class="fw-bold">Enter Your Current Password:</label>

                                <div class="input-group mb-3">

                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="emailInput" placeholder="Current Password" class="form-control" type="Cpass" name="oldPassword">

                                </div>
                                <div class="error mb-3"> @error('oldPassword')
                                    {{ $message }}
                                    @enderror</div>
                                <label for="" class="fw-bold">Enter Your New Password:</label>

                                <div class="input-group  mb-3">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                    <input id="emailInput" placeholder="New Password" class="form-control" type="Npass" name="newPassword">

                                </div>
                                <div class="error mb-3"> @error('newPassword')
                                    {{ $message }}
                                    @enderror</div>

                                <label for="" class="fw-bold">Confirm Your Password:</label>

                                <div class="input-group  mb-3">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                    <input id="emailInput  mb-2" placeholder="Confirm Password" class="form-control" type="Confirm-passowrd" name="confirmPassword">

                                </div>
                                <div class="error mb-3">
                                    @error('confirmPassword')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ms-2">
                                <input class="btn btn-lg btn-primary btn-block" value="Reset My Password" id="reset-your-password" type="submit">
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
