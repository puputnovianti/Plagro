@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Criteria : {{ $criteria }}</h1>
    </div>
    <h6>{{ $factors->name }}</h6>
  
<a class="btn btn-info mb-3" href="/dashboard/criterias">Kembali</a>
<a class="btn btn-primary mb-3" href="">Tambah Profile</a>

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
                <a class="badge bg-warning" href=""><span data-feather="edit"></span></a>
                <a class="badge bg-danger" href=""><span data-feather="x-circle"></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</main>
@endsection
