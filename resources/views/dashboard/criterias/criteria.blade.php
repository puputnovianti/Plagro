@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Criteria : {{ $criteria_name }}</h1>
    </div>
    <h6>{{ $factors->name }}</h6>
  
<a class="btn btn-info mb-3" href="/dashboard/criterias">Kembali</a>


    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Profil</th>
              <th scope="col">Nilai</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($profiles as $profile)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $profile->name }}</td>
              <td>{{ $profile->score }}</td>
              <td>
                <a class="badge bg-warning" href="/dashboard/profiles/{{$profile->id}}/edit"><span data-feather="edit"></span></a>
                <form action="/dashboard/profiles/{{ $profile->id }}" method="POST" class="d-inline">
                   @method('delete')
                   @csrf
                <button type="submit" class="badge bg-danger border-0"><span data-feather="x-circle"></span></button>
                </form>
                  <div class="form-check">
                    <input class="form-check-input" value="{{ $profile->id }}" type="radio" name="ideal_profile" id="ideal_profile" checked>
                    <label class="form-check-label" for="ideal_profile">
                      Profil Ideal
                    </label>
              </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- <div class="col-lg-8">
        <div class="mb-2">
        <form action="/dashboard/criterias/criteria" method="post">
          @csrf
          <input name="criteria_id" type="hidden" class="form-control" value="{{ $criteria_id }}">
          <label for="ideal_profile">Profil Ideal</label>
          <select class="form-select" name="ideal_profile" aria-label="Default select example">
            @foreach($profiles as $profile)
            <option value="{{ $profile->id }}">{{ $profile->name }}</option>
            @endforeach
          </select>
          <a class="btn btn-primary mb-3 mt-3" href="/dashboard/criterias/criteria">Simpan</a>
        </form>
      </div>
      </div> --}}
      
      <div class="col-lg-8">
        <form action="/dashboard/criterias/criteria" method="post">
          @csrf
          <a class="addprofile btn btn-info mb-3" href="#">Tambah Profil</a>
          <div class="mb-3 mt-3">
            <input name="criteria_id" type="hidden" class="form-control" value="{{ $criteria_id }}">
          </div>
          <div class="mb-3 mt-3">
            <label for="name" class="form-label">Nama Profil</label>
            <input name="name" type="text" class="form-control" required>
          </div>
          <div class="mb-3 mt-3">
            <label for="score" class="form-label">Nilai</label>
            <input name="score" type="text" class="form-control" required>
          </div>
          <div class="profile"></div>
          <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
      </div>

      
</main>
@endsection

