@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2 class="my-3">Hasil Perhitungan Profile Matching</h2>
    <hr>
    <div class="table-responsive shadow-sm p-2">
        <table class="table table-sm table-borderless">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Lokasi Retel</th>
                    <th scope="col" style="text-align: center;">Tanggal Pendaftaran</th>
                    <th scope="col" style="text-align: center;">Total Score</th>
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
    </div>
</main>


@endsection