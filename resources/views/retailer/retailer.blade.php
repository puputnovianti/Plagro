@extends('retailer.layouts.main')
@section('content')

<div class="container">

<h2 class="mt-3">Data Diri</h2>
<table>
    <tr>
      <td>Nama</td>
      <td>{{ auth()->user()->name }}</td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>{{ $address }}</td>
    </tr>
    <tr>
      <td>No HP</td>
      <td>{{ $phone }}</td>
    </tr>
    <tr>
      <td>Lokasi</td>
      <td>{{ $location }}</td>
    </tr>
  </table>

  <hr>
  <h2>Profil Lokasi</h2>
  <table>
      @foreach($profiles as $profile)
      <tr>
          <td>{{ $profile->profile_id }}</td>
      </tr>
      @endforeach
  </table>

  <a class="btn btn-primary mt-3" href="/retailer">Kembali</a>
</div>
  @endsection
