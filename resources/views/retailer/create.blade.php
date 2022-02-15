@extends('retailer.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="col-lg-8">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Diri</h1>
  </div>
  </div>
  <div class="col-lg-8">
    <form method="POST" action="/retailer">
      @csrf
      <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
      <div class="mb-3 mt-3">
        <label for="address" class="form-label">Alamat Lengkap</label>
        <input name="address" type="text" class="form-control">
      </div>
      <div class="mb-3 mt-3">
        <label for="phone" class="form-label">Nomor Telepon</label>
        <input name="phone" type="text" class="form-control">
      </div>
      <div class="mb-3 mt-3">
        <label for="location" class="form-label">Lokasi Ritel</label>
        <input name="location" type="text" class="form-control">
      </div>

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil Lokasi</h1>
      </div>

      @foreach($criterias as $criteria)
      <div class="mb-3 mt-3">
      <label for="retailer_profile" class="form-label">{{$criteria->name}}</label>
      <select class="form-select" name="retailer_profile" aria-label="Default select example">
        @foreach($criteria->profiles as $profile)
        <option value="{{ $profile->id }}">{{ $profile->name }}</option>
        @endforeach
      </select>
      </div>
      @endforeach

      <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
  </div>
</main>
  @endsection