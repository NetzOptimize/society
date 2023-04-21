
@extends('layouts.main')
@section('title')
Society Users
@endsection
@section('content')

    <div class="payment-heading text-center bg-light me-5 ms-5  rounded mt-3  p-4">
        <h3>
            List Of Users
        </h3>
    </div>

        <div class="add-user mt-2 pt-3 pb-2 me-5 d-flex justify-content-end gap-2 ">
              {{-- search bar --}}
        <input type="search" id="search" placeholder="Search" class="search">
        @if (auth()->user()->usertype_id != 3)
            <a href="{{ route('users.create') }}" class="btn btn-success">Add User <img src="{{ asset('add-user.png') }}"
                    class="" alt=""></a>
        @endif
    </div>
    <div class="table-add-user ps-5 pe-5 pt-3 table-responsive">


        <table class="table table-light  table-bordered table-hover  align-middle data" id="user-data">
        <thead>
        <tr class="table-dark">
                <th>Name</th>
                <th>Mobile-1</th>
                <th>Mobile-2</th>
                <th>Email</th>
                <th>User-type</th>
                @if (auth()->user()->usertype_id != 3)
                    <th colspan="2" class="text-center">Actions</th>
                 @endif
            </tr>
            </thead>

          <tbody>
            <tr>
                @foreach ($users as $user)
                    <td id="name">{{ $user->name }}</td>
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
                    @if ($user->email)
                        <td>{{ $user->email }}</td>
                    @else
                        <td style="color:red;">Not Provided</td>
                    @endif
                    <td>{{ $user->usertype->role }}</td>
                    @if (auth()->user()->usertype_id != 3)
                        <td class="text-center"><a href="{{ route('users.edit', $user) }}" class="btn btn-success">Edit</a>
                        </td>
                        <td class="text-center">
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="m-0">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                    data-toggle="tooltip" title='Delete'>Delete</button>
                            </form>
                        </td>
                    @endif
            </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    {{-- delete confirmation --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script type="text/javascript">
        jQuery('.show_confirm').click(function(event) {
            var form = jQuery(this).closest("form");
            var name = jQuery(this).data("name");
            event.preventDefault();
            swal({
                    title: `Do You Want To Delete This?`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

        // searching
        $(document).ready(function() {
        $("#search").keyup( function() {
            var value = $(this).val().toLowerCase();
            $(".data tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });


    </script>
@endsection
