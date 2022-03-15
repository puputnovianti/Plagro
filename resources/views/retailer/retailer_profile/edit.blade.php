@extends('retailer.layouts.main')
@section('content')

<div class="container mt-4">
    <div class="col-md-8">
        <h1>Ubah Profile Lokasi</h1>
        <form action="/retailer/retailer_profile/{{ $retailer->id }}" method="POST">
            @csrf
            @method('put')
            @foreach($criterias as $criteria)
            <div class="mb-3 mt-3">
                <input type="hidden" value="{{ $criteria->id }}" name="criteria_id[]">
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
</div>

@endsection