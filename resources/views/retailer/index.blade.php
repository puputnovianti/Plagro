@extends('retailer.layouts.main')
@section('content')
<div class="container mt-4">
  <h1>Selamat datang {{ auth()->user()->name }}</h1>
  @empty($retailers)
  <h2>Silahkan melengkapi data diri dan profil lokasi ritel anda!</h2>
  <a href="/retailer/create" class="btn btn-success mb-3 rounded-pill">Lengkapi Data Diri dan Profil Lokasi</a>
  @endempty


  <div class="row">
    <div class="col-md-10">
      @isset($retailers)
      <h3 class="text-muted mt-5">Data diri anda</h3>
      <table class="table table-hover">
        <tr>
          <th>Nama</th>
          <td>{{ auth()->user()->name }}</td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td>{{ $retailers->address }}</td>
        </tr>
        <tr>
          <th>No. Handphone</th>
          <td>{{ $retailers->phone }}</td>
        </tr>
        <tr>
          <th>Lokasi ritel</th>
          <td>{{ $retailers->location }}</td>
        </tr>
      </table>
      <a href="/retailer/retailer/{{ $retailers->id }}" class="btn btn-success rounded-pill mb-3">Lihat Profil Lokasi</a>
      @endisset

    </div>
  </div>


</div>

@endsection