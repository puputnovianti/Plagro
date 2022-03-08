@extends('retailer.layouts.main')
@section('content')
<div class="container mt-4">
  <h1>Selamat datang {{ auth()->user()->name }}</h1>
  <h2>Silahkan melengkapi data diri dan profil lokasi ritel anda!</h2>

  <a href="/retailer/create" class="btn btn-success mb-3 rounded-pill">Lengkapi Data Diri dan Profil Lokasi</a>
  {{-- <a href="/retailer/retailer/{{ auth()->user()->id }}" class="btn btn-info mb-3">Lihat Data Diri dan Profil Lokasi</a> --}}
<div class="row">
  <div class="col-md-10">
    <h3 class="text-muted mt-5">Data Diri</h3>
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
  </div>
</div>

<div class="row mb-5">
  <div class="col-md-10">
    <h3 class="text-muted mt-5">Profil Lokasi</h3>
    <table class="table table-hover">
      <tr>
        <th scope="col">Nama</th>
        <td>Ni Wayan Eka Puput Novianti</td>
      </tr>
      <tr>
        <th scope="col">Alamat</th>
        <td>Br. Dinas Kuwum Tegallinggah</td>
      </tr>
      <tr>
        <th scope="col">No. Handphone</th>
        <td>083117288197</td>
      </tr>
      <tr>
        <th scope="col">Lokasi ritel</th>
        <td>Br. Dinas Kuwum Tegallinggah</td>
      </tr>
    </table>
    <a href="" class="btn btn-warning rounded-pill">Ubah</a>
  </div>
</div>

</div>

@endsection