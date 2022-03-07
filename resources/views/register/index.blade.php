@extends('dashboard.layouts.register')
@section('content')


<div class="col-lg-5">
  <main class="form-signin mt-4">
    <h1 class="mb-3">Registrasi</h1>
    <form action="/register" method="POST">
      @csrf
      <div class="form-floating">
        <input type="text" class="f form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" autofocus placeholder="Nama Lengkap">
        <label for="name">Nama Lengkap</label>
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        <div class="form-floating mt-3">
          <input type="email" class="f form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
          <label for="email">Alamat Email</label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating mt-3">
          <input type="password" class="f form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="checkbox mb-3">

        </div>
        <button class="w-100 btn btn-lg btn-success" type="submit">Register</button>
    </form>
    <p class="text-muted mt-3">Sudah memiliki akun? Silahkan melakukan <a href="/login" class="text-white">Login.</a></p>
  </main>
</div>

@endsection