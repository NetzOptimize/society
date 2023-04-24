@extends('layouts.main')
@section('title')
Society User-Profile
@endsection
@section('content')
{{-- profile picture --}}


<!-- Profile card -->
<div class="main" id="profile-main"> 
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
    <div class="card p-4"> 
        <div class=" image d-flex flex-column justify-content-center align-items-center gap-3"> 
             <!-- <img src="{{asset('dummy.jpg')}}" class="rounded-pill border border-primary" height="100" width="100" /> -->

<!--  -->
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">
  <div class="profile-pic" style="background-image: url('https://randomuser.me/api/portraits/med/men/65.jpg')">
      <span class="glyphicon glyphicon-camera"></span>
      <span>Change Image</span>
  </div>
  </label>
  <input type="File" name="fileToUpload" id="fileToUpload">
</form>
<!--  -->


        <div class="profile-details">
        <p class="name fw-bold text-primary m-0 display-6">Mishra</p> 
              <p class="house fw-bold m-2">DSA-1-23</p> 
              <p class="Mobile fw-bold">6786576544</p> 


        </div>
            

             
                 <!-- <div class=" d-flex mt-2"> <a href="" class="btn btn-dark"> Edit Profile</a> 
                </div>  -->
                <button type="button" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#exampleModal">
 Edit Profile
</button>
<a href="" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#exampleModal">
Reset Password
</a>
<div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                         <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span>
                          <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span>
                           </div>
             
                        <div class=" px-2 rounded mt-4 date "> <span class="join bg-light rounded p-2">Joined May,2021</span> 
                    </div> 
                </div>
             </div>
</div>
</div>


<!-- modal -->
<!-- Button trigger modal -->


<!-- Modal -->
         
 
      <div class="upload d-flex justify-content-center align-items-center gap-3 flex-wrap mt-3">
    <div class="img">
        @php $image = Auth()->user()->user_image;@endphp
        @if($image)
        <img src="{{ asset( str_replace("public","storage",$image)) }}" alt="" >
        @endif
    </div>
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


{{-- reset password --}}
<div class="main-profile-password">
    <div class="container  mb-2 mt-3">
        <div class="row justify-content-center">
            <div class="w-100">
                <div class="forgot">

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
                                <input class="btn btn-lg btn-dark btn-block" value="Reset My Password" id="reset-your-password" type="submit">
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </div>
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
    $(document).ready(function(){
        $('#checkbox').on('change', function(){
            $('.password').attr('type',$('#checkbox').prop('checked')==true?"text":"password");
        });
    });
</script>
@endsection
