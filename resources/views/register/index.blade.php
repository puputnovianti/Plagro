@extends('dashboard.layouts.login')
@section('content')

 
<div class="col-lg-5">
<main class="form-signin">
    <h1 class="h3 mb-3 fw-normal">Registrtion Form</h1>
    <form action="/register" method="POST">
      @csrf
    <div class="form-floating">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
        <label for="name">Name</label>
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
        <label for="email">Email address</label>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
        <label for="password">Password</label>
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
  
      <div class="checkbox mb-3">

      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    </form>
    <a href="/login">Login</a>
  </main>
</div>

@endsection