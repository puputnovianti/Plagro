@extends('retailer.layouts.main')
@section('content')
<div class="container">
<h1>Selamat Datang {{ auth()->user()->name }}</h1>
<h2>Silahkan melengkapi data diri anda</h2>

<a href="/retailer/create" class="btn btn-primary mb-3">Lengkapi Data Diri</a>

<form action="/logout" method="post">
    @csrf
    <button type="submit" class="btn btn-danger">Logout <span data-feather="log-out"></span></button>
  </form>
</div>
@endsection

