@include('users.navbar')
@extends('layouts.mainWithoutNav')
@section('title')
Society User-Profile
@endsection
@section('content')

{{-- profile picture --}}
Update Your Profile Picture
<form action="{{ route('users.image.store') }}" method="POST" class="shadow p-12" enctype="multipart/form-data">
    @csrf
    <label class="block mb-4">
        <span class="sr-only">Choose File</span>
        <input type="file" name="image"
            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
        @error('image')
        <span class="error">{{ $message }}</span>
        @enderror
    </label>
    <button type="submit" class="btn btn-dark">Submit</button>
</form>

{{-- reset password --}}
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
                                    <input id="emailInput" placeholder="Current Password" class="form-control password" type="password" name="oldPassword">

                                </div>
                                <div class="error mb-3"> @error('oldPassword')
                                    {{ $message }}
                                    @enderror</div>
                                <label for="" class="fw-bold">Enter Your New Password:</label>

                                <div class="input-group  mb-3">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                    <input id="emailInput" placeholder="New Password" class="form-control password" type="password" name="newPassword">

                                </div>
                                <div class="error mb-3"> @error('newPassword')
                                    {{ $message }}
                                    @enderror</div>

                                <label for="" class="fw-bold">Confirm Your Password:</label>

                                <div class="input-group  mb-3">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                    <input id="emailInput  mb-2" placeholder="Confirm Password" class="form-control password" type="password" name="confirmPassword">

                                </div>
                                <div class="error mb-3">
                                    @error('confirmPassword')
                                    {{ $message }}
                                    @enderror
                                </div>
                            <div class="d-flex justify-content-start gap-2 align-items-center"><input type="checkbox"  id="checkbox" class="position-static">Show Password</div>
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
<script>
    $(document).ready(function(){
        $('#checkbox').on('change', function(){
            $('.password').attr('type',$('#checkbox').prop('checked')==true?"text":"password");
        });
    });
</script>
@endsection
