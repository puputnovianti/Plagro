@extends('dashboard.layouts.login')
@section('content')


<div class="col-sm-5">
  @if(session()->has('success'))
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <main class="form-signin mt-4">
    <h1 class="mb-3">Login</h1>

    <form action="/login" method="POST">
      @csrf
      <div class="form-floating">
        <input type="email" class="f form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" autofocus value="{{ old('email') }}">
        <label for="email">Alamat Email</label>
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-floating mt-3">
        <input type="password" class="f form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
        <label for="password">Password</label>
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="checkbox mb-3">

      </div>
      <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
    </form>
    <!-- <p class="text-muted mt-3">Belum memiliki akun? <a href="/register" class="text-white">Registrasi sekarang.</a></p> -->
  </main>
</div>

@endsection