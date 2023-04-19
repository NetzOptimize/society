


<div class="home-user">

<div class="user-nav text-center p-2 bg-light d-flex align-items-center justify-content-between bg-dark text-light ms-5 me-5">
<div class="user-logo d-flex align-items-center gap-2">
        <img src="{{asset('logo.png')}}" class="rounded-pill" style="height: 60px;
    width: 70px;" alt="">
    <div class="user-logo-heading">
      <h3>Society</h3>
    </div>
      </div>
   
<!-- <h4>WELCOME {{ Auth::user()->name }}</h4> -->

<div class="user dropdown pe-3 me-3 d-flex align-items-center">
   <div class="user-links  p-3">
<nav class="navbar d-flex justify-content-end" id="users-nav">

    <a href="{{ route('user.profile.edit') }}"  class="btn btn-dark me-3  " >My Account</a>
    <a href="{{ route('user.report') }}"  class="btn btn-dark  ">Reports</a>

</nav>
</div>
<a class="btn bg-transparent dropdown-toggle  text-light" type="button" id="user-a-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <img src="{{asset('user-icons.gif')}}" alt="" class="rounded-pill me-2" height="30px" width="30px" >User </a>
<div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
  <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
</div>

</div>
</div>


</div>

 