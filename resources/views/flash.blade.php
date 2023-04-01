@if(session()->has('success'))
<div class="message mt-1 me-5 ms-5">
<div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-error">
        {{ session()->get('error') }}
    </div>
@endif
<style>
  
</style>
