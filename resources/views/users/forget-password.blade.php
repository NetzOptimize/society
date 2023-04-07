<form action="{{ route('forgetpassword') }}" method="POST">
    @csrf
    <input type="email" name="email">
    <input type="submit" value="Forget Password">
</form>
