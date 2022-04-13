@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil</h1>
    </div>
    {{-- <a class="btn btn-primary mb-3" href="/dashboard/profiles/create">Tambah Profil</a> --}}
    <div class="table-responsive shadow p-3">
        <table class="table table-sm table-borderless">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Profile</th>
                    <th scope="col">Nama Kriteria</th>
                    <th scope="col" style="text-align: center;">Nilai</th>
                    <th scope="col" style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $profile->name }}</td>
                    <td>{{ $profile->criteria->name}}</td>
                    <td style="text-align: center;">{{ $profile->score }}</td>
                    <td style="text-align: center;">
                        <a class="badge bg-warning" href="/dashboard/profiles/{{$profile->id}}/edit"><span data-feather="edit"></span></a>
                        <form action="/dashboard/profiles/{{ $profile->id }}" method="POST" class="d-inline">
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