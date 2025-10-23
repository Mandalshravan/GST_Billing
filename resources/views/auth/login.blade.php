@extends('layouts.app')
@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href=""><b>GST</b>Billing</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
        @include('_message')
      <form action="{{ url('login_post') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div>
        <p class="mb-3">
        <a href="{{ url('forgot-password') }}">Forgot password?</a>
        </p>
        </div>
      
          <!-- /.col -->
          <div >
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
      </form>
      <!-- /.social-auth-links -->
     <div>
      <p class="mt-2"> Don't have an account?
        <a href="{{ url('register') }}" class="text-center">Register</a>
      </p>
     </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection
