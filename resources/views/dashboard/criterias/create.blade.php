@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kriteria</h1>
    </div>
    <div class="col-lg-8 shadow p-3 detail">
        <form method="POST" action="/dashboard/criterias">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kriteria</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <label for="factor_id" class="form-label">Faktor</label>
            <select class="form-select" name="factor_id">
                @foreach($factors as $factor)
                <option value="{{ $factor->id }}">{{$factor->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success rounded-pill mt-3">Tambah</button>
            <a class="btn btn-outline-success rounded-pill mt-3" href="/dashboard/criterias">Batal</a>
        </form>
    </div>
</main>
@endsection
