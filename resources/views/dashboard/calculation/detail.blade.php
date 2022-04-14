@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

    <h2>Detail Calon Retailer</h2>
    <hr>

    <div class="table-responsive shadow p-3">
        <table class="">
            <tr>
                <th scope="col">Tanggal Pendaftaran</th>
                <td> : </td>
                <td>{{ $retailer->created_at->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th scope="col">Nama</th>
                <td> : </td>
                <td>{{ $retailer->name }}</td>
            </tr>
            <tr>
                <th scope="col">Email</th>
                <td> : </td>
                <td>{{ $retailer->email }}</td>
            </tr>
            <tr>
                <th scope="col">Lokasi Ritel</th>
                <td> : </td>
                <td>{{ $retailer->location }}</td>
            </tr>
            <tr>
                <th scope="col">Rata-rata Core Factor</th>
                <td> : </td>
                <td>{{ $retailer->calculation->cfactor }}</td>
            </tr>
            <tr>
                <th scope="col">Rata-rata Secondary Factor</th>
                <td> : </td>
                <td>{{ $retailer->calculation->sfactor }}</td>
            </tr>
            <tr>
                <th scope="col">Total Score</th>
                <td> : </td>
                <td>{{ $retailer->calculation->total_score }}</td>
            </tr>
        </table>
    </div>

    <div class="table-responsive shadow p-3 mt-3">
        <table>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kriteria</th>
                <th scope="col">Profil Retailer</th>
                <th scope="col">Nilai Profil</th>
            </tr>
            @foreach($details as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detail->criteria_name }}</td>
                <td>{{ $detail->retailer_profile_name }}</td>
                <td>{{ $detail->retailer_profile_score }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="table-responsive shadow p-3 mt-3">
        <table>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kriteria</th>
                <th scope="col">Profil Ideal</th>
                <th scope="col">Nilai Profil</th>
            </tr>
            @foreach($details as $detail)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $detail->criteria_name}}</td>
                <td>{{ $detail->ideal_profile_name}}</td>
                <td>{{ $detail->ideal_profile_score}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</main>
@endsection