
<nav class="navbar d-flex justify-content-end " style="background-color: #e3f2fd;">
    <h4 style="margin-right:100px;text-transform: uppercase;">{{ Auth::user()->name }}</h4>
    <a href="{{ route('user.profile.edit') }}"  class="btn btn-secondary" style="margin-right:100px;">MY ACCOUNT</a>
    <a href="{{ route('user.report') }}"  class="btn btn-secondary" style="margin-right:100px;">REPORT</a>
    <a href="{{ route('logout') }}"  class="btn btn-secondary" style="margin-right:100px;">LOGOUT</a>

</nav>
