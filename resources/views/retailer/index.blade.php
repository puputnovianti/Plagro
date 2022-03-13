@extends('retailer.layouts.main')
@section('content')
<div class="container mt-4">
  <h1>Selamat datang, <b class="cap">{{ auth()->user()->name }}</b></h1>
  @empty($retailers)
  <div class="b mb-4">
    <h4 class="text-muted">Anda belum melengkapi data diri dan profil lokasi ritel</h4>
    <h5 class="text-muted">Silahkan melengkapi data diri dan profil lokasi ritel anda!</h5>
    <a href="/retailer/create" class="btn btn-success mb-3 rounded-pill mt-3">Lengkapi Data Diri dan Profil Lokasi</a>
  </div>
  @endempty


  <div class="row">
    <div class="col-md-10">
      @isset($retailers)
      <h3 class="text-muted mt-5">Data diri anda</h3>
      <table class="table table-hover">
        <tr>
          <th>Nama</th>
          <td class="cap">{{ auth()->user()->name }}</td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td class="cap">{{ $retailers->address }}</td>
        </tr>
        <tr>
          <th>No. Handphone</th>
          <td>{{ $retailers->phone }}</td>
        </tr>
        <tr>
          <th>Lokasi ritel</th>
          <td class="cap"> {{ $retailers->location }}</td>
        </tr>
      </table>
      <a href="/retailer/retailer/{{ $retailers->id }}" class="btn btn-success rounded-pill mb-3">Lihat Profil Lokasi</a>
      @endisset

    </div>
  </div>


</div>

@endsection