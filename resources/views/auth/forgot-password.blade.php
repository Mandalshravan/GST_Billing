@extends('layouts.app')
@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href=""><b>GST</b> Billing</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Forgot Password</p>
      
      <!-- Display any success or error messages -->
      @include('_message')
      
      <!-- Forgot Password Form -->
      <form action="{{ route('forgot_password_post') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div>
          <p class="mb-3">
            <a href="{{ url('/') }}">Login</a>
          </p>
        </div>
      
        <!-- Submit Button -->
        <div>
          <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
        </div>
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

@endsection
