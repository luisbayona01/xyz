@extends('layouts.inicio')

@section('content')

 <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('img/undraw_remotely_2j6y.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Register</h3>
                         </div>
            <form  method="post" class="row g-3 needs-validation" novalidate id="register">
     @csrf

              <div class="form-group first">
                <label for="username">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
                <span class="invalid-feedback" role="alert">
                            el campo Name es obligatorio
                        </span>
              </div>
            <div class="form-group first">
                <label for="username">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
         <span class="invalid-feedback" role="alert">
                            el campo email es obligatorio
                        </span>
              </div>
              <div class="form-group first">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
               <span class="invalid-feedback"  id="password-conf" role="alert">
                            el campo password es obligatorio
                        </span>
              </div>

           <div class="form-group last mb-4">
                <label for="password">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password-confirm" required>
             <span  id="password-error" class="invalid-feedback" role="alert">
                            el campo confirm password es obligatorio
                        </span>
              </div>

              <button type="button" class="btn btn-block btn-primary" id="btn-register">
               {{ __('Register') }}
 <span class="spinner-border spinner-border-sm mr-2" style="display:none;" id="loading2"></span>
               </button>




            </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

@endsection
