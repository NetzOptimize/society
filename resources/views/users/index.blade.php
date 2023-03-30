@include('navbar')
@extends('layouts.main')
@section('content')


<div class="add-user mt-4 p-3">
<a href="{{ route('user.create') }}" class="btn btn-primary">ADD USER <img src="{{asset('add-user.png')}}" class="" alt=""></a>

</div>
<div class="table-add-user p-3"> 
    <table class="table table-light  table-bordered table-hover  align-middle">
        <tr class="text-center">
            <th>NAME</th>
            <th>EMAIL</th>
            <th>MOBILE-1</th>
            <th>MOBILE-2</th>
            <th>USER-TYPE</th>
            <th>ACTION</th>
            <th></th>
        </tr>
        <tr class="text-center" >
            @foreach ($users as $user)
                <td class="text-center">{{ $user->name }}</td>
                @if ($user->email)
                    <td class="text-center"> {{ $user->email }}</td>
                @else
                    <td class="text-center" style="color:red;">Not Provided</td>
                @endif
                @if ($user->mobile1)
                    <td class="text-center"> {{ $user->mobile1 }}</td>
                @else
                    <td class="text-center" style="color:red;">Not Provided</td>
                @endif
                @if ($user->mobile2)
                <td class="text-center"> {{ $user->mobile2 }}</td>
            @else
                <td class="text-center" style="color:red;">Not Provided</td>
            @endif


                <td class="text-center">{{ $user->usertype->role }}</td>
                <td class="text-center"><a href="{{ route('user.edit', $user) }}" class="btn btn-primary">EDIT</a></td>
                <td class="text-center">
                    <form action="{{ route('user.delete', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE" class="btn btn-danger">
                    </form>
                </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
