@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Profil</h1>
  </div>
  <div class="col-lg-8">
    <form action="/dashboard/profiles/{{ $profile->id }}" method="post">
    @method('put')
      @csrf
      <div class="mb-3 mt-5">
        <input name="criteria_id" type="hidden" value="{{ $profile->criteria->id }}" class="form-control">
      </div>
      <div class="mb-3 mt-5">
        <label for="name" class="form-label">Nama Profil</label>
        <input name="name" type="text" value="{{ $profile->name }}" class="form-control">
      </div>
      <div class="mb-3 mt-5">
        <label for="score" class="form-label">Nilai</label>
        <input name="score" type="text" value="{{ $profile->score }}" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary mt-3">Ubah Profile</button>
    </form>
  </div>
  </div>
  @endsection