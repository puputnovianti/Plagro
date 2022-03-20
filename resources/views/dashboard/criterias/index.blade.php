@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kriteria</h1>
    <a class="btn btn-success rounded-pill ms-auto" href="/dashboard/criterias/create">Tambah Kriteria</a>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-8" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <!-- <div class="d-flex">
    <a class="btn btn-success mb-3 rounded-pill ms-auto" href="/dashboard/criterias/create">Tambah Kriteria</a>
  </div> -->
  <div class="table-responsive shadow p-3">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Kriteria</th>
          <th scope="col">Faktor</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($criterias as $criteria)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $criteria->name }}</td>
          <td>{{ $criteria->factor->name }}</td>
          <td>
            <a class="badge bg-info" href="/dashboard/criterias/{{$criteria->id}}"><span data-feather="eye"></span></a>
            <a class="badge bg-warning" href="/dashboard/criterias/{{ $criteria->id }}/edit"><span data-feather="edit"></span></a>
            <form action="/dashboard/criterias/{{ $criteria->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="badge bg-danger border-0"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection