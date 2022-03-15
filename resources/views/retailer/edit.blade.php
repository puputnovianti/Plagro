@extends('retailer.layouts.main')
@section('content')
<div class="container mt-4">
    <div class="col-lg-8">
        <h1>Ubah Data Diri</h1>
        <form action="/retailer/{{$retailer->id}}" method="post">
            @method('put')
            @csrf
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input name="name" type="text" class="form-control" value="{{  auth()->user()->name }}" disabled>
            </div>
            <div class="mb-3 mt-3">
                <label for="address" class="form-label">Alamat Lengkap</label>
                <input name="address" type="text" class="form-control" value="{{ $retailer->address }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="phone" class="form-label">Nomor Handphone</label>
                <input name="phone" type="text" class="form-control" value="{{ $retailer->phone }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="location" class="form-label">Lokasi Ritel</label>
                <input name="location" type="text" class="form-control" value="{{ $retailer->location }}">
            </div>
            <button type="submit" class="btn btn-success rounded-pill mt-3">Ubah</button>
            <a href="/retailer" class="btn border border-success mt-3 rounded-pill">Batal</a>
        </form>
    </div>
</div>
@endsection