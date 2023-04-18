


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
 <img src="{{asset('user1.jpg')}}" alt="" class="rounded-pill me-2" height="30px" width="30px" >User </a>
<div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
  <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
</div>

</div>
</div>


</div>

<iframe style="border: 0;" tabindex="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3123.0750484295017!2d-90.80455168480377!3d38.48591017963621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87d9309cedbec6af%3A0x2dc334b5347f086c!2s3202%20W%20Osage%20St%2C%20Pacific%2C%20MO%2063069%2C%20USA!5e0!3m2!1sen!2sin!4v1585570214469!5m2!1sen!2sin" width="600" height="521px" frameborder="0" allowfullscreen="allowfullscreen" aria-hidden="false"></iframe>