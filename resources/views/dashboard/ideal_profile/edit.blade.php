@extends('dashboard.layouts.main')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kriteria : {{ $criteria->name }}</h1>
    </div>
    <div class="col-lg-8">
        <div class="mb-2 shadow p-3 detail">
            <form action="/dashboard/ideal_profile/{{ $criteria->id }}" method="post">
                @method('put')
                @csrf
                <input name="criteria_id" type="hidden" class="form-control" value="{{ $criteria->id }}">
                <label for="profile_id">Profil Ideal</label>
                <select class="form-select" name="profile_id">
                    @foreach($criteria->profiles as $profile)
                    <option value="{{ $profile->id }}" {{old('profile_id') == $profile->id ? "selected" : ""}}>{{ $profile->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success rounded-pill mt-3">Ubah</button>
                <a class="btn btn-outline-success rounded-pill mt-3" href="/dashboard/ideal_profile">Batal</a>
            </form>
        </div>
    </div>
</main>

@endsection
