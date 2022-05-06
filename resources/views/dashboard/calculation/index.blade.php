@extends('dashboard.layouts.main')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hasil Perhitungan Profile Matching</h1>
        <a class="btn btn-success rounded-pill ms-auto" href="/dashboard/calculation/create">Tambah Data</a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="/dashboard/calculation">
                <div class="input-group mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="Cari berdasarkan lokasi" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-success rounded-pill ms-1" style="width: 80px;" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>


    <div class="table-responsive shadow-sm p-2">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if($retailers->count())
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Lokasi Retel</th>
                    <th scope="col" style="text-align: center;">@sortablelink('created_at', 'Tanggal Pendaftaran')</th>
                    <th scope="col" style="text-align: center;">@sortablelink('calculation.total_score', 'Total Nilai')</th>
                    <th scope="col" style="text-align: center;">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($retailers as $retailer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $retailer->name }}</td>
                    <td>{{$retailer->location}}</td>
                    <td style="text-align: center;">{{$retailer->created_at->format('d-m-Y')}}</td>
                    <td style="text-align: center;">{{$retailer->calculation->total_score}}</td>
                    <td style="text-align: center;">
                        <a class="badge bg-info" href="/dashboard/calculation/{{$retailer->id}}"><span data-feather="eye"></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $retailers->appends(\Request::except('page'))->render() !!}
        @else
        <p>Tidak ada data</p>
        @endif
    </div>
</main>


@endsection