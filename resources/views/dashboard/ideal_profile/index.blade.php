@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil Ideal</h1>
    </div>
    <a class="btn btn-primary mb-3" href="/dashboard/ideal_profile/edit">Ubah Profil Ideal</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kriteria</th>
              <th scope="col">Nama Profil</th>
              <th scope="col">Nilai</th>
              <th scope="col">Faktor</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            {{-- @foreach($criterias as $criteria) --}}
            <tr>
                <td>1</td>
                <td>Jalur Lalulintas</td>
                <td>2 arah</td>
                <td>4</td>
                <td>Core Factor</td>
                <td>1</td>

              {{-- <td>{{ $loop->iteration}}</td>
              <td>{{ $criteria->name }}</td>
              <td>{{ $loop->iteration}}</td>
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
            </td> --}}
            </tr>
            {{-- @endforeach --}}
          </tbody>
        </table>
      </div>
</main>
@endsection