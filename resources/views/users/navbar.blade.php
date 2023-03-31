


<div class="home-user">

<div class="user-nav text-center p-4 bg-light d-flex align-items-center  justify-content-between">
<div class="user-logo">
        <img src="{{asset('logo.png')}}" class="rounded-pill" style="height: 60px;
    width: 70px;" alt="">
      </div>
<h4>WELCOME {{ Auth::user()->name }}</h4>

<div class="user dropdown pe-3 me-3">

<a class="btn bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <img src="{{asset('user1.jpg')}}" alt="" class="rounded-pill" height="30px" width="30px">User </a>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="#">Profile</a>
  <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
</div>

</div>
</div>

<div class="user-links  bg-primary p-3">
<nav class="navbar d-flex justify-content-end">

    <a href="{{ route('user.profile.edit') }}"  class="btn btn-light me-3" >My Account</a>
    <a href="{{ route('user.report') }}"  class="btn btn-light">Reports</a>
 
</nav>
</div>
</div>
 
