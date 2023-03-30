@include('navbar')
@extends('layouts.main')
@section('content')
    <a href="{{ route('user.create') }}" class="btn btn-secondary">ADD USER</a>
    <table class="table table-light">
        <tr>
            <th>NAME</th>
            <th>MOBILE-1</th>
            <th>MOBILE-2</th>
            <th>USER-TYPE</th>
            <th>ACTION</th>
            <th></th>
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
                <td><a href="{{ route('user.edit', $user) }}" class="btn btn-secondary">EDIT</a></td>
                <td>
                    <form action="{{ route('user.delete', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE" class="btn btn-danger">
                    </form>
                </td>
        </tr>
        @endforeach
    </table>
@endsection
