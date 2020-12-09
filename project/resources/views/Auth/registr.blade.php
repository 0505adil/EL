@extends ('layouts.app')

@section('content')
  <div class="col-md-6 container" >
    @include('inc.messages')
<form action="{{ route('register')}}" method="post">
  @csrf
  <div class="form-group row">
    <label for="name">Name:</label>
      <input type="text" name="name" class="form-control" id="name">
  </div>
  <div class="form-group row">
    <label for="surname">Surname:</label>
      <input type="text" name="surname" class="form-control" id="surname">
  </div>
    <div class="form-group row">
      <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" id="email">
    </div>
    <div class="form-group row">
      <label for="password">Password:</label>
        <input type="password" name="password"class="form-control" id="password">
    </div>
     <div class="form-group row">
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>
    <div class="form-group row">
    <button type="submit" class="btn btn-success">Sign up </button>
    </div>
</form>
</div>

@endsection
