@include('navbar')
@extends('layouts.main')
@section('content')

<div class="payment-heading text-center bg-light   rounded mt-3  p-4">
    <h3>
      LIST OF USERS
    </h3>
  </div>

@if(auth()->user()->usertype_id !=3)
    <div class="add-user mt-2 p-3 me-5 d-flex justify-content-end" >
    <a href="{{ route('user.create') }}" class="btn btn-success">Add User <img src="{{asset('add-user.png')}}" class="" alt=""></a>
@endif

</div>
<div class="table-add-user ps-5 pe-5 pt-3">
    <table class="table table-light  table-bordered table-hover  align-middle ">
        <tr class="table-dark">
            <th>NAME</th>
            <th>MOBILE-1</th>
            <th>MOBILE-2</th>
            <th>USER-TYPE</th>
            @if(auth()->user()->usertype_id !=3)
                <th class="text-center">ACTION</th>
                <th></th>
            @endif
        </tr>
        <tr>
            @foreach ($users as $user)
                <td>{{ $user->name }}</td>
                @if ($user->mobile1)
                    <td> {{ $user->mobile1 }}</td>
                @else
                    <td style="color:red;">Not Provided</td>
                @endif
                @if ($user->mobile2)
                <td> {{ $user->mobile2 }}</td>
            @else
                <td style="color:red;">Not Provided</td>
            @endif
                <td>{{ $user->usertype->role }}</td>
                @if(auth()->user()->usertype_id !=3)
                    <td class="text-center"><a href="{{ route('user.edit', $user) }}" class="btn btn-success">EDIT</a></td>
                    <td  class="text-center">
                        <form action="{{ route('user.delete', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="DELETE" class="btn btn-danger">
                        </form>
                    </td>
                @endif
        </tr>
        @endforeach
    </table>
</div>
@endsection
