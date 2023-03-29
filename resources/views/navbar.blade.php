
<nav class="navbar d-flex justify-content-end " style="background-color: #e3f2fd;">
    <a href="{{ route('user.index') }}"  class="btn btn-secondary ms-1">MANAGE USERS</a>
    <a href="{{ route('house.index') }}" class="btn btn-secondary ms-1">MANAGE HOUSES</a>
    <a href="{{ route('resident.index') }}"  class="btn btn-secondary ms-1">MANAGE RESIDENT</a>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            MANAGE PAYMENT
        </button>
        <ul class="dropdown-menu">
          <li><a href="{{ route('payment.index') }}"  class="dropdown-item ms-1">PAYMENT HISTORY</a></li>
          <li><a href="{{ route('payment.create') }}"  class="dropdown-item ms-1">MANAGE PAYMENT</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            MANAGE EXPENSE
        </button>
        <ul class="dropdown-menu">
          <li><a href="{{ route('admin.expense.index') }}"  class="dropdown-item ms-1">EXPENSE HISTORY</a></li>
          <li><a href="{{ route('admin.expense') }}"  class="dropdown-item ms-1">MANAGE EXPENSES</a></li>
        </ul>
      </div>

    <a href="{{ route('logout') }}"  class="btn btn-secondary ms-1">LOGOUT</a>
</nav>

