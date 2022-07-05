@extends('dashboard.layouts.main')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Criteria : {{ $criteria_name }}</h1>
    </div>
    <div class="col-lg-8">
        <div class="mb-2 detail shadow p-3">
            <form action="/dashboard/ideal_profile/create" method="post">
                @csrf
                <input name="factor_id" type="hidden" class="form-control" value="{{ $factor_id }}">
                <input name="criteria_id" type="hidden" class="form-control" value="{{ $criteria_id }}">
                <label for="profile_id">Profil Ideal</label>
                <select class="form-select" name="profile_id" aria-label="Default select example">
                    @foreach($profiles as $profile)
                    <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success rounded-pill mt-3">Simpan</button>
            </form>
        </div>
    </div>
</main>

@endsection
