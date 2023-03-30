@extends('template.main')

@section('content')

  <div class="container">
    <div class="row align-items-start py-lg-8 py-6">
        <div class="col-6 offset-3">
            <div class="card bg-light text-black">
                <div class="card-body p-3">
                    <h3 align="center">Login</h3><br />
                 
                    @if(isset(Auth::user()->email))
                     <script>window.location="/login/successlogin";</script>
                    @endif
                 
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong>{{ $message }}</strong>
                    </div>
                    @endif
                 
                    @if (count($errors) > 0)
                     <div class="alert alert-danger">
                      <ul>
                      @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                     </div>
                    @endif
                 
                    <form method="post" action="{{ url('/login/checklogin') }}">
                     {{ csrf_field() }}
                     <div class="form-group mb-3">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" />
                     </div>
                     <div class="form-group mb-3">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" />
                     </div>
                     <div class="form-group">
                      <input type="submit" name="login" class="btn btn-primary px-3 py-2 float-end" value="Login" />
                     </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
  
@endsection