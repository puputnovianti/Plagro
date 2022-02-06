@extends('retailer.layouts.main')
@section('content')
<div class="container">
<h1>selamat datang retailer</h1>
<form action="/logout" method="post">
    @csrf
    <button type="submit" class="btn btn-danger">Logout <span data-feather="log-out"></span></button>
  </form>
</div>
@endsection

