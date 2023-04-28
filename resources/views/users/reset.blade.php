@extends('layouts.mainWithoutNav')
@include('users.navbar')
@section('title')
    Society Reset-Password
@endsection
@section('content')
{{-- reset password --}}
<div class="main-profile-password">
    <div class="mb-2 mt-3">
        <div class="row justify-content-center">
            <div class="w-100">
                <div class="forgot shadow p-5">

                    <h2>Reset your password?</h2>
                    <form class="form" action="{{ route('user.resetpassword', $user) }}" method="POST">
                        @csrf

                        <fieldset>
                            <div class="form-group p-2">
                                <label for="" class="fw-bold">Enter Your Current Password:</label>

                                <div class="input-group mb-3">

                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input  placeholder="Current Password" class="form-control password" type="password" name="oldPassword">

                                </div>
                                <div class="error mb-3"> @error('oldPassword')
                                    {{ $message }}
                                    @enderror</div>
                                <label for="" class="fw-bold">Enter Your New Password:</label>

                                <div class="input-group  mb-3">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                    <input  placeholder="New Password" class="form-control password" type="password" name="newPassword">

                                </div>
                                <div class="error mb-3"> @error('newPassword')
                                    {{ $message }}
                                    @enderror</div>

                                <label for="" class="fw-bold">Confirm Your Password:</label>

                                <div class="input-group  mb-3">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                    <input id="emailInput  mb-2" placeholder="Confirm Password" class="form-control password" type="password" name="confirmPassword">
                                </div>
                                <div class="d-flex justify-content-start align-items-center"><input type="checkbox"  id="checkbox" class="position-static m-2">Show Password</div>
                                <div class="error mb-3">
                                    @error('confirmPassword')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ms-2">
                                <input class="btn btn-dark btn-block" value="Reset My Password" id="reset-your-password" type="submit">
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#checkbox').on('change', function() {
            $('.password').attr('type', $('#checkbox').prop('checked') == true ? "text" : "password");
        });
    });


</script>
@endsection

