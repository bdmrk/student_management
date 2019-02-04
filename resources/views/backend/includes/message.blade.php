
@if(Session::has('errorMessage'))
    <div class="alert alert-success" role="alert">
        <p>{{ Session::get('errorMessage') }}</p>
    </div>
   
@endif

@if(Session::has('successMessage'))
    <div class="alert alert-success" role="alert">
        <p>{{ Session::get('successMessage') }}</p>
    </div>
@endif