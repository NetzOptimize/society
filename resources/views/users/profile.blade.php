@include('users.navbar')
@extends('layouts.mainWithoutNav')
@section('title')
Society User-Profile
@endsection
@section('content')

{{-- profile picture --}}
<!-- <div class="upload d-flex justify-content-center align-items-center gap-3 flex-wrap mt-5">
    <div class="img">
        @php $image = Auth()->user()->user_image;@endphp
        @if($image)
        <img src="{{ asset( str_replace("public","storage",$image)) }}" alt="" >
        @endif
    </div>
    <form action="{{ route('users.image.store') }}" method="POST" class="shadow p-4 mt-3" enctype="multipart/form-data">
        @csrf
        <p class="fw-bold">Update Your Profile Picture ?</p>
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
</div>

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
</div> -->

<!-- Profile card -->
<div class="main" id="profile-main">
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center gap-3">
                <form id="profile-pic-form" action="{{ route('users.image.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="fileToUpload">
                        @php $image = Auth()->user()->user_image; @endphp
                        @if($image)
                        <div class="profile-pic" style="background-image:{{ url('https://8.zeroguess.us/society/storage/app/'.$image) }}">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span >Change Image</span>
                        </div>
                        @else
                        <div class="profile-pic" style="background-image: url('https://cdn-icons-png.flaticon.com/512/21/21104.png')">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span >Change Image</span>
                        </div>
                        @endif
                    </label>
                    <input type="file" name="image" id="fileToUpload" onchange="submitForm()">
                </form>
                <div class="profile-details">
                    <p class="name fw-bold text-primary m-0 display-6">{{ ucfirst(Auth()->user()->name) }}</p>
                    <p class="house fw-bold m-2">Mobile-1 : {{  auth()->user()->mobile1 }}</p>
                    @isset(auth()->user()->mobile2)
                        <p class="Mobile fw-bold">Mobile-2 : {{  auth()->user()->mobile2 }}</p>
                    @endisset
                    @isset(auth()->user()->email)
                    <p class="Mobile fw-bold">Email : {{  auth()->user()->email }}</p>
                @endisset
                </div>
                <a href="{{  route('user.profile.edit', auth()->user()) }}" class="btn btn-dark " > Edit Profile</a>
                <a href="{{  route('user.reset',auth()->user() ) }}" class="btn btn-dark " >Reset Password</a>
                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                    <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span>
                    <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span>
                </div>

                <div class=" px-2 rounded mt-4 date "> <span class="join bg-light rounded p-2">{{ date(" jS  F Y ")}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<!-- Button trigger modal -->


<!-- Modal -->

<!-- <div class="upload d-flex justify-content-center align-items-center gap-3 flex-wrap mt-3">
    <div class="img">
        @php $image = Auth()->user()->user_image;@endphp
        @if($image)
        <img src="{{ asset( str_replace("public","storage",$image)) }}" alt="" >
        @endif
    </div>
    <form action="{{ route('users.image.store') }}" method="POST" class="shadow p-4 mt-3" enctype="multipart/form-data">
        @csrf
        <p class="fw-bold">Update Your Profile Picture ?</p>
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
</div> -->







<script>
    $(document).ready(function() {
        $('#checkbox').on('change', function() {
            $('.password').attr('type', $('#checkbox').prop('checked') == true ? "text" : "password");
        });
    });
    function submitForm() {
        document.getElementById("profile-pic-form").submit();
    }
</script>
@endsection
