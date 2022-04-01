@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


    @foreach($gap as $g)
    <p>{{$g}}</p>
    @endforeach
    <br>
    @foreach($bobot as $b)
    <p>{{$b}}</p>
    @endforeach

    {{$$total}}

    <!-- <div class="table-responsive shadow p-3">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Retailer</th>
                    <th scope="col">Lokasi Retel</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($retailers as $retailer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $retailer->name }}</td>
                    <td>{{$retailer->location}}</td>
                    <td>
                        <a class="badge bg-info" href="/dashboard/calculation/{{$retailer->id}}"><span data-feather="eye"></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> -->
</main>
@endsection