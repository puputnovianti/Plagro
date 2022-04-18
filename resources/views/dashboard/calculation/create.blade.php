@extends('dashboard.layouts.main')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Calon Retailer</h1>
    </div>

    <div class="row justify-content-center">
        <main class="mt-4 mb-4 p-4 shadow col-lg-8 container-narrow">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="text-muted">Data Diri</h3>
                </div>
            </div>
            <div class="col-lg-12">
                <form method="POST" action="/dashboard/calculation">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Nama</label>
                        <input name="name" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="location" class="form-label">Lokasi Ritel</label>
                        <input name="location" type="text" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h3 class="text-muted">Profil Lokasi</h3>
                    </div>

                    @foreach($criterias as $criteria)
                    <div class="mb-3 mt-3">
                        <input type="hidden" value="{{ $criteria->name }}" name="criteria_name[]">
                        <label class="form-label col-form-label">{{$criteria->name}}</label>
                        <select class="form-select" name="retailer_profile_name[]" aria-label="Default select example">
                            @foreach($criteria->profiles as $profile)
                            <option value="{{ $profile->name }}">{{ $profile->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-success rounded-pill mt-2 ">Tambah</button>
                </form>
            </div>
        </main>

        @endsection