<style>
  #manage-users:hover {
    border: 1px solid white !important;

  }
  #manage-house:hover{
    border: 1px solid white !important;
  }
#manage-resident:hover{
  border: 1px solid white !important;

}
  td,
  th {
    padding-left: 18px !important;

  }
</style>
<div class="main">
  <div class="bg-dark p-3 me-5 ms-5 ">
    <div class="top-nav d-flex align-items-center justify-content-between">
      <div class="logo d-flex align-items-center">
        <img src="{{asset('logo.png')}}" class="rounded-pill" style="    height: 60px;
    width: 70px;" alt=""><h2 class="text-light ms-2">Society</h2>
      </div>
 
<div class="content d-flex ">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


 <a href="{{ route('user.index') }}" id="manage-users" class="btn btn-transparent  ms-1 text-light">Manage Users</a>
    <a href="{{ route('house.index') }}" class="btn btn-transparent ms-1 text-light"id="manage-house">Manage Houses</a>
    <a href="{{ route('resident.index') }}" class="btn btn-transparent ms-1 text-light" id="manage-resident">Manage Resident</a>
    <div class="dropdown">
      <button class="btn btn-transparent dropdown-toggle ms-1 text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="manage-payment"> 
      Manage Payment
      </button>
      <ul class="dropdown-menu dropdown-menu-dark">
        <li><a href="{{ route('payment.index') }}" class="dropdown-item ms-1 ">Payment History</a></li>
        <li><a href="{{ route('payment.create') }}" class="dropdown-item ms-1">Manage Payment</a></li>
      </ul>
    </div>
    <div class="dropdown ">
      <button class="btn btn-transparent dropdown-toggle ms-1 text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="manage-expense">
      Manage Expense
      </button>
      <ul class="dropdown-menu dropdown-menu-dark">
        <li><a href="{{ route('admin.expense.index') }}" class="dropdown-item ms-1">Expense History</a></li>
        <li><a href="{{ route('admin.expense') }}" class="dropdown-item ms-1">Manage Expenses</a></li>
      </ul>
    </div>
     <div class="dropdown me-2">

<a class="btn bg-transparent dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <img src="{{asset('user1.jpg')}}" alt="" class="rounded-pill" height="30px" width="30px"> User </a>
<div class="dropdown-menu  dropdown-menu-dark dropdown-menu-right" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item " href="#">Profile</a>

  <a class="dropdown-item " href="{{ route('logout') }}">Logout</a>
</div>

</div>
 </div>

    </div>
  </div>
  
</div>



<!-- Bootstrap Navbar -->
<!-- 
<nav class="navbar navbar-expand-lg navbar-light bg-dark  p-3 me-5 ms-5">
  <div class="container-fluid">
  <div class="logo d-flex align-items-center">
        <img src="{{asset('logo.png')}}" class="rounded-pill" style="    height: 60px;
    width: 70px;" alt=""><h2 class="text-light ms-2">Society</h2>
      </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
 <a href="{{ route('user.index') }}" id="manage-users" class="btn btn-transparent  ms-1 text-light">Manage Users</a>
      
   </li>

   <li class="nav-item">
 
    <a href="{{ route('house.index') }}" class="btn btn-transparent ms-1 text-light">Manage Houses</a>
     
   </li>

   <li class="nav-item">
 
    <a href="{{ route('resident.index') }}" class="btn btn-transparent ms-1 text-light">Manage Resident</a>       
   </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
     
      </ul>
    
    </div>
  </div>
</nav> -->
 
<!-- Bootstrap end -->