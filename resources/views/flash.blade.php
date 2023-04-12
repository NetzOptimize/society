@if(session()->has('success'))
<div class="message mt-1 me-5 ms-5">
<div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    </div>
@endif
@if(session()->has('error'))
<div class="message mt-1 me-5 ms-5">
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
</div>
@endif
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 3000); // 10 seconds
    </script>

