@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">

    <div class="table-responsive shadow p-3">
        <table>
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <td> : </td>
                    <td>{{ $retailer->email }}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">Email</th>
                    <td> : </td>
                    <td>{{ $retailer->name }}</td>
                </tr>
                <tr>
                    <th scope="col">Lokasi Ritel</th>
                    <td> : </td>
                    <td>{{ $retailer->location }}</td>
                </tr>
            </tbody>
        </table>

        <div class="table-responsive shadow p-3 mt-3">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Faktor</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Nilai Profil Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $profile->profile->criteria->name }}</td>
                        <td>{{$profile->profile->name}}</td>
                        <td>{{$profile->profile->score}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
</main>
@endsection