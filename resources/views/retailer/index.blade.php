@extends('retailer.layouts.main')
@section('content')
<div class="container">
  @empty($retailers)
  <div class="row align-items-center mt-5">
    <div class="col mt-5">
      <div class="alert alert-success shadow" role="alert">
        <h3 class="alert-heading">Selamat datang, <b class="cap">{{ auth()->user()->name }}</b></h3>
        <p>Akun Anda telah terdaftar. Silahkan melengkapi data diri dan profil lokasi retail anda dengan menekan tombol dibawah ini.</p>
        <hr>
        <p class="mb-0"><a href="/retailer/create" class="btn btn-success rounded-pill">Lengkapi Data Diri dan Profil Lokasi</a></p>
      </div>
    </div>
  </div>
  @endempty


  <div class="row">
    <div class="col-md-10">

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @isset($retailers)
      <h3 class="text-muted mt-5">Data diri Anda</h3>
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
      <a class="btn border border-success rounded-pill mb-3" href="/retailer/{{ $retailers->id }}/edit">Ubah</a>
      @endisset

    </div>
  </div>


</div>

@endsection