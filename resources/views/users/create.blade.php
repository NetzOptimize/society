
@extends('layouts.main')
@section('title')
Society Create User
@endsection
@section('content')
<div class="d-flex justify-content-center align-items-center " id="add-user-position">
<div class="main container w-50 shadow" id="add-user">

<div class="heading-add-user pt-3 pb-2 text-center ">
    <div class="add-user-image d-flex justify-content-start align-items-center p-3 rounded" id="add-user-logo">
        <div class="add-user-image1"><img src="{{asset('add-user.gif')}}" style="height:70px; width:70px" alt="">
</div>
    <h3>Add User</h3>
</div>
<div class="d-flex flex-column justify-content-center align-items-center p-3 pb-3 ">
    <form action="{{ route('users.store') }}" method="POST"   class="d-flex flex-column gap-3" id="user-create" >
        @csrf
          <input type="textbox" name="name" placeholder="Name"  class="form-control" value={{ old('name')}}>
        <div class="error">
        @error('name')
            {{ $message }}
        @enderror
        </div>
          <input type="tel" name="mobile1" placeholder="Enter your mobile"  class="form-control" value={{ old('mobile1')}}>
        <div class="error">
        @error('mobile1')
            {{ $message }}
        @enderror
        </div>

        <input type="tel" name="mobile2" placeholder="Enter your alternate mobile"  class="form-control" value={{ old('mobile2')}}>
        <div class="error">
        @error('mobile2')
            {{ $message }}
        @enderror
        </div>
        <input type="email" name="email" placeholder="Email"  class="form-control" value={{ old('email')}}>
        <div class="error">
        @error('email')
            {{ $message }}
        @enderror
        </div>
        <input type="password" name="password" placeholder="password"  class="form-control" value={{ old('password')}}>
        <div class="error">
        @error('password')
            {{ $message }}
        @enderror
        </div>
        <input type="password" name="confirmPassword" placeholder="confirm-password"  class="form-control" value={{ old('confirmPassword')}}>
        <div class="error">
        @error('confirmPassword')
            {{ $message }}
        @enderror
        </div>

         <select name="usertype_id" class="form-select user-cursor" value={{ old('usertype_id')}}>
            <option value="">Select User Type</option>
            @foreach($usertypes as $usertype)
                <option value="{{ $usertype->id }}" {{ old('usertype_id') == $usertype->id ? 'selected' : '' }}>{{ $usertype->role }}</option>
            @endforeach
        </select>
        <div class="error">
            @error('usertype_id')
                {{ $message }}
            @enderror
            </div>
        <div class="add-user text-center pb-3">
        <input type="submit" name="login" value="Add User" class="btn btn-dark w-100">
        </div>
    </form>
</div>
</div>
</div>

<script>
    $(document).ready(function(){
        $('#checkbox').on('change', function(){
            $('#password, #confirmPassword').attr('type',$('#checkbox').prop('checked')==true?"text":"password");
        });
    });
</script>

@endsection

