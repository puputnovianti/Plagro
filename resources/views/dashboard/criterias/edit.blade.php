@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kriteria</h1>
  </div>
  <div class="col-lg-8">
    <form method="POST" action="/dashboard/criterias/{{ $criteria->id }}">
      @method('put')
      @csrf
      <div class="mb-3 mt-5">
        <label for="name" class="form-label">Nama Kriteria</label>
        <input name="name" type="text" value="{{ $criteria->name }}" class="form-control">
      </div>
      <label for="factor_id" class="form-label">Faktor</label>
      <select class="form-select" name="factor_id">
        @foreach($factors as $factor)
        @if(old('factor_id', $criteria->factor_id) == $factor->id)
        <option value="{{ $factor->id }}" selected>{{$factor->name}}</option>
        @else
        <option value="{{ $factor->id }}">{{$factor->name}}</option>
        @endif
        @endforeach
      </select>
      <button type="submit" class="btn btn-primary mt-3">Ubah Kriteria</button>
    </form>
  </div>
  </div>
  @endsection