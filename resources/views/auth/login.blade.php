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
              <h3>Login</h3>

            </div>
            <form  method="post" class="row g-3 needs-validation" novalidate id="login">
      @csrf

              <div class="form-group first">
                <label for="username">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
                    <span class="invalid-feedback" role="alert">
                            el campo email es obligatorio
                        </span>
              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
               <span class="invalid-feedback" role="alert">
                            el campo password es obligatorio
                        </span>
              </div>

              <button type="button"  class="btn btn-block btn-primary" id="btn-login">
         Inciar session

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
