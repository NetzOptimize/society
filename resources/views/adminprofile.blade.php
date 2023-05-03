@extends('layouts.main')
@section('title')
Society User-Profile
@endsection
@section('content')

<!-- Profile card -->
<div class="main" id="profile-main">
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center gap-3">
                <form id="profile-pic-form" action="{{ route('users.image.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="fileToUpload">
                        @php
                        $image = Auth()->user()->user_image;
                    @endphp
                    @if($image)
                        <div class="profile-pic" style="background-image: url('https://8.zeroguess.us/society/storage/app/{{$image}}')">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span>Change Image</span>
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
                <a href="{{  route('users.edit', auth()->user()) }}" class="btn btn-dark " > Edit Profile</a>
                <a href="{{  route('admin.reset', $user) }}" class="btn btn-dark " >Reset Password</a>
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

{{--
      <div class="upload d-flex justify-content-center align-items-center gap-3 flex-wrap mt-3">
    <div class="img">
        @php $image = Auth()->user()->user_image;@endphp
        @if($image)
        <img src="{{ asset( str_replace("public","storage",$image)) }}" alt="" >
@endif
</div> --}}
<!-- <form action="{{ route('users.image.store') }}" method="POST" class="shadow p-4 mt-3" enctype="multipart/form-data">
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
    </form> -->
</div>







<!-- table   -->
<!--
<div class="profile-table table-responsive ms-5 me-5">
<table class="table table-bordered table-hover">
  <thead  id="profile-heading-form">
    <tr class="table-dark">
      <th scope="col">Sno.</th>
      <th scope="col"><div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Status
  </button>
  <ul class="dropdown-menu dropdown-menu-dark " aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item  " href="#">Paid</a></li>
    <li><a class="dropdown-item  " href="#">Unpaid</a></li>


  </ul>
</div></th>
      <th scope="col">Payment-Methods</th>
      <th scope="col">Months</th>

      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>

      <td class="text-danger">  Unpaid</td>
      <td>Gpay</td>
      <td>Febuary</td>
      <td class="text-danger">Rs.2300/-</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td class="text-success">Paid</td>
      <td>Cash</td>
      <td>March</td>

      <td>Rs.4000/-</td>
    </tr>

    <tr>
      <th scope="row">3</th>
      <td class="text-success">Paid</td>
      <td>Card</td>
      <td>April-December</td>

      <td>Rs.20000/-</td>
    </tr>

  </tbody>
</table> -->
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
