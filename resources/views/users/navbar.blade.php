<!-- <div class="home-user">

    <div class="user-nav text-center p-2 bg-light d-flex align-items-center justify-content-between bg-dark text-light ms-5 me-5">
        <div class="user-logo d-flex align-items-center gap-2">
            <img src="{{asset('logo.png')}}" class="rounded-pill" style="height: 60px;
    width: 70px;" alt="">
            <div class="user-logo-heading">
                <h3>Society</h3>
            </div>
        </div>

 
        <div class="user dropdown pe-3 me-3 d-flex align-items-center">
            <div class="user-links  p-3">
                <nav class="navbar d-flex justify-content-end" id="users-nav">
                    <a href="{{ route('user.profile.edit') }}" class="btn btn-dark me-3  ">My Account</a>
                    <a href="{{ route('user.report') }}" class="btn btn-dark  ">Reports</a>
                </nav>
            </div>
            <a class="btn bg-transparent dropdown-toggle  text-light" type="button" id="user-a-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @php $image = Auth()->user()->user_image;@endphp
                @if($image)
                    <img src="{{ asset( str_replace("public","storage",$image)) }}" alt="" class="rounded-pill" height="30px" width="30px">{{ Auth::user()->name }}</a>
                @else
                    <img src="{{asset('user-icons.gif')}}" alt="" class="rounded-pill me-2" height="30px" width="30px">{{ Auth::user()->name }}</a>
                @endif
            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>

        </div>
    </div>
</div> -->

<!-- user navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
  <div class="container-fluid p-2">
  <div class="user-logo d-flex align-items-center gap-2">
            <img src="{{asset('logo.png')}}" class="rounded-pill" style="height: 60px;
    width: 70px;" alt="">
            <div class="user-logo-heading">
                <h3 class="text-light">Society</h3>
            </div>
        </div>    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
         </li>
      </ul>
      <form class="d-flex justify-content-start">
      <div class="user dropdown pe-3 me-3 d-flex align-items-center">
            <div class="user-links  p-3">
                <nav class="navbar d-flex justify-content-end" id="users-nav">
                    <a href="{{ route('user.profile.edit') }}" class="btn btn-dark me-3  ">My Account</a>
                    <a href="{{ route('user.report') }}" class="btn btn-dark  ">Reports</a>
                </nav>
            </div>
            <!-- <a class="btn bg-transparent dropdown-toggle  text-light" type="button" id="user-a-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                <!-- @php $image = Auth()->user()->user_image;@endphp
                @if($image)
                    <img src="{{ asset( str_replace("public","storage",$image)) }}" alt="" class="rounded-pill" height="30px" width="30px">{{ Auth::user()->name }}</a>
                @else
                    <img src="{{asset('user-icons.gif')}}" alt="" class="rounded-pill me-2" height="30px" width="30px">{{ Auth::user()->name }}</a>
                @endif
            <div class="dropdown-menu dropdown-menu-dark  " aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>    
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </div> -->
            
    <!--  -->
    <div class="dropdown">
  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
  @php $image = Auth()->user()->user_image;@endphp
                @if($image)
                    <img src="{{ asset( str_replace("public","storage",$image)) }}" alt="" class="rounded-pill" height="30px" width="30px">{{ Auth::user()->name }}</a>
                @else
                    <img src="{{asset('user-icons.gif')}}" alt="" class="rounded-pill me-2" height="30px" width="30px">{{ Auth::user()->name }}</a>
                @endif
    

  </button>
  
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
    
  <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>    
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
  </ul>
</div>
        <!--  -->

        </div>
    
      </form>
    </div>
  </div>
</nav>
