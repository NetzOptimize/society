

<!-- user navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
    <div class="container-fluid">
        <a href="{{  route('user.home') }}" style="text-decoration:none;">
        <div class="user-logo d-flex align-items-center gap-2">
            <img src="{{asset('logo.png')}}" class="rounded-pill" style="height: 60px;width: 70px;" alt="">
            <div class="user-logo-heading">
                <h3 class="text-light">Society</h3>
            </div>
        </div></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                </li>
            </ul>
            <form class="d-flex justify-content-start" id="user-form1">
                <div class="user dropdown pe-3 me-3 d-flex align-items-center">
                    <div class="user-links  ">
                        <nav class="navbar d-flex justify-content-end" id="users-nav">
                            <a href="{{ route('user.home') }}" class="btn btn-dark me-3  ">My Account</a>
                            <a href="{{ route('user.report') }}" class="btn btn-dark me-3 ">Reports</a>
                        </nav>
                    </div>




                    <!--  -->
                    <div class="dropdown">
                        <button class="btn btn-transparent text-light dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            @php $image = Auth()->user()->user_image;@endphp
                            @if($image)
                            <img src="{{  asset('storage/'.$image) }}" class="rounded-pill me-2  " height="30px" width="30px">{{ ucfirst(Auth::user()->name) }}</a>
                            @else
                            <img src="{{asset('user-icons.gif')}}" alt="" class="rounded-pill me-2" height="30px" width="30px">{{ ucfirst(Auth::user()->name) }}</a>
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
