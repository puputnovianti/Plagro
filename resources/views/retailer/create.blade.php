@extends('retailer.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
  <h2>Silahkan melengkapi data diri dan profil lokasi ritel anda</h2>
  <div class="col-lg-8">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h3 class="text-muted">Data Diri</h3>
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
        <label for="phone" class="form-label">Nomor Handphone</label>
        <input name="phone" type="text" class="form-control">
      </div>
      <div class="mb-3 mt-3">
        <label for="location" class="form-label">Lokasi Ritel</label>
        <input name="location" type="text" class="form-control">
      </div>

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="text-muted">Profil Lokasi</h3>
      </div>


      @foreach($criterias as $criteria)
      <div class="mb-3 mt-3">
        <label class="form-label col-form-label">{{$criteria->name}}</label>
        <select class="form-select" name="profile_id[]" aria-label="Default select example">
          @foreach($criteria->profiles as $profile)
          <option value="{{ $profile->id }}">{{ $profile->name }}</option>
          @endforeach
        </select>
      </div>
      @endforeach

      <button type="submit" class="btn btn-success rounded-pill mt-2 mb-5">Simpan</button>
    </form>
  </div>
</main>
@endsection