@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Profil</h1>
  </div>
  <div class="col-lg-8">
    <form action="/dashboard/profiles" method="post">
      @csrf
      <label for="criteria_id" class="form-label">Kriteria</label>
      <select class="form-select" name="criteria_id">
        @foreach($criterias as $criteria)
        <option value="{{ $criteria->id }}">{{$criteria->name}}</option>
        @endforeach
      </select>
      <div class="mb-3 mt-5">
        <label for="name" class="form-label">Nama Profil</label>
        <input name="name" type="text" class="form-control">
      </div>
      <div class="mb-3 mt-5">
        <label for="score" class="form-label">Nilai</label>
        <input name="score" type="text" class="form-control">
      </div>
      <button type="submit" class="btn btn-success rounded-pill mt-3">Simpan</button>
    </form>
  </div>
  @endsection