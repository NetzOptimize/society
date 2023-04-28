
<style>
  #manage-users:hover {
    border: 1px solid white !important;

}
td,th {
    padding-left: 18px !important;
}
</style>
<!-- Bootstrap Navbar -->

<div class="main">
<nav class="navbar bg-dark navbar-expand-lg p-3 me-5 ms-5  d-flex align-items-center justify-content-between none" id="navbar">
  <div class="container-fluid">



    <div class="logo-user d-flex align-items-center just">
    <div class="logo d-flex align-items-center">
        <img src="{{asset('logo.png')}}" class="rounded-pill" style="    height: 60px;
    width: 70px;" alt=""><h2 class="text-light ms-2">Society</h2>
      </div>

    </div>
<div class="user-toggle  d-flex align-items-center justify-content-between">


<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</div>


    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mt-2 mb-2 mb-lg-0 w-100 d-flex justify-content-end" id="hover-li">
        <li class="nav-item">
        <a href="{{ route('users.index') }}" id="manage-users" class="btn btn-transparent  ms-1 text-light">Users</a>
        </li>
        <li class="nav-item">
        <a href="{{ route('houses.index') }}" class="btn btn-transparent ms-1 text-light">Houses</a>
       </li>
        <li class="nav-item">
        <a href="{{ route('residents.index') }}" class="btn btn-transparent ms-1 text-light">Resident</a>
        </li>

         <div class="dropdown drop-hover">
        <li class="nav-item dropdown">
        <button class="btn btn-transparent dropdown-toggle  text-light btn1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Payment
      </button>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
          <li><a href="{{ route('payments.index') }}" class="dropdown-item  ">Payment History</a></li>
           @if(auth()->user()->usertype_id !=3)
            <li><a href="{{ route('payments.create') }}" class="dropdown-item ">Manage Payment</a></li>
        @endif

          </ul>
        </li>
</div>
<div class="dropdown drop-hover ">
          <li class="nav-item dropdown">
          <button class="btn btn-transparent dropdown-toggle text-light btn1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Expense
      </button>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
          <li><a href="{{ route('expenses.index') }}" class="dropdown-item">Expense History</a></li>
           @if(auth()->user()->usertype_id !=3)
            <li><a href="{{ route('expenses.create') }}" class="dropdown-item">Manage Expenses</a></li>
        @endif
          </ul>
        </li>
</div>
<!--  -->
 <div class="dropdown me-2 user-hover">
<a class="btn bg-transparent dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @php $image = Auth()->user()->user_image;@endphp
    @if($image)
    <img src="{{ 'https://8.zeroguess.us/society/storage/app/'.$image }}" class="rounded-pill" height="30px" width="30px">{{ ucfirst(Auth::user()->name) }}</a>
@else
    <img src="{{asset('user-icons.gif')}}" alt="" class="rounded-pill me-2" height="30px" width="30px">{{ ucfirst(Auth::user()->name) }}</a>
@endif
<div class="dropdown-menu  dropdown-menu-dark dropdown-menu-right" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item " href="{{ route('admin.user.profile') }}">Profile</a>

  <a class="dropdown-item " href="{{ route('logout') }}">Logout</a>
</div>

</div>
      </ul>

    </div>
  </div>
</nav>
</div>
<!-- Boostrap end -->
