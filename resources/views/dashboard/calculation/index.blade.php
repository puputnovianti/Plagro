@extends('dashboard.layouts.main')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hasil Perhitungan Profile Matching</h1>
        <a class="btn btn-success rounded-pill ms-auto" href="/dashboard/calculation/create">Tambah Data</a>
    </div>
    <div class="table-responsive shadow-sm p-2">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Lokasi Retel</th>
                    <th scope="col" style="text-align: center;">@sortablelink('created_at', 'Tanggal Registrasi')</th>
                    <th scope="col" style="text-align: center;">@sortablelink('calculation.total_score', 'Score')</th>
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
    </div>
</main>


@endsection