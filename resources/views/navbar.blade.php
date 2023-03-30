<div class="main">
  <div class="bg-light p-3">
    <div class="top-nav d-flex align-items-center" style="justify-content: space-between;">
      <div class="logo text-left">
        <img src="{{asset('logo.png')}}" class="rounded-pill" style="    height: 60px;
    width: 70px;" alt="">
      </div>


<div class="welcome text-center">
  <h1>
    Welcome to Username
  </h1>
</div>

<!-- username -->
      <div class="dropdown p-4">

        <a class="btn bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <img src="{{asset('user1.jpg')}}" alt="" height="30px" width="30px"> User </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Profile</a>

          <a class="dropdown-item" href="#">logout</a>
        </div>

      </div>
      <!-- username -->
    </div>
  </div>

  <nav class="navbar bg-primary">

 
<a href="{{ route('user.index') }}" class="btn btn-transparent  ms-1 text-light">MANAGE USERS</a>
    <a href="{{ route('house.index') }}" class="btn btn-transparent ms-1 text-light">MANAGE HOUSES</a>
    <a href="{{ route('resident.index') }}" class="btn btn-transparent ms-1 text-light">MANAGE RESIDENT</a>
 

    <div class="dropdown">
      <button class="btn btn-transparent dropdown-toggle ms-1 text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        MANAGE PAYMENT
      </button>
      <ul class="dropdown-menu">
        <li><a href="{{ route('payment.index') }}" class="dropdown-item ms-1 ">PAYMENT HISTORY</a></li>
        <li><a href="{{ route('payment.create') }}" class="dropdown-item ms-1">MANAGE PAYMENT</a></li>
      </ul>
    </div>
    <div class="dropdown">
      <button class="btn btn-transparent dropdown-toggle ms-1 text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        MANAGE EXPENSE
      </button>
      <ul class="dropdown-menu">
        <li><a href="{{ route('admin.expense.index') }}" class="dropdown-item ms-1">EXPENSE HISTORY</a></li>
        <li><a href="{{ route('admin.expense') }}" class="dropdown-item ms-1">MANAGE EXPENSES</a></li>
      </ul>
    </div>

    <a href="{{ route('logout') }}" class="btn btn-primary ms-1">LOGOUT</a>
  </nav>
</div>