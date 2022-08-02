@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Calon Retailer</h1>
        <a class="btn btn-success rounded-pill ms-auto" href="/dashboard/calculation">Kembali</a>
    </div>

    <div class="table-responsive shadow p-3 detail">
        <table cellpadding="5" cellspacing="0" class="">
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
                <th scope="col">No HP</th>
                <td> : </td>
                <td>{{ $retailer->phone }}</td>
            </tr>
            <tr>
                <th scope="col">Alamat Domisili</th>
                <td> : </td>
                <td>{{ $retailer->address }}</td>
            </tr>
            <tr>
                <th scope="col">Lokasi Ritel</th>
                <td> : </td>
                <td>{{ $retailer->location }}</td>
            </tr>
            <tr>
                <th scope="col">Total Core Factor</th>
                <td> : </td>
                <td>{{ $retailer->calculation->cfactor }}</td>
            </tr>
            <tr>
                <th scope="col">Total Secondary Factor</th>
                <td> : </td>
                <td>{{ $retailer->calculation->sfactor }}</td>
            </tr>
            <tr>
                <th scope="col">Total Score</th>
                <td> : </td>
                <td>{{ $retailer->calculation->total_score }}</td>
            </tr>
            @isset($retailer->link)
            <tr>
                <th scope="col">Link Maps</th>
                <td> : </td>
                <td><a target="_blank" rel="noopener noreferrer" href="{{ $retailer->link }}">{{ $retailer->link }}</a></td>
            </tr>
            @endisset
            @empty($retailer->link)
            <tr>
                <th scope="col">Link Maps</th>
                <td> : </td>
                <td> -</td>
            </tr>
            @endempty
        </table>
    </div>

    <div class="table-responsive shadow p-3 mt-3 detail">
        <table class="table table-borderless">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kriteria</th>
                <th scope="col">Profil Retailer</th>
                <th scope="col" style="text-align: center;">Nilai Profil</th>
                <th scope="col">Profil Ideal</th>
                <th scope="col" style="text-align: center;">Nilai Profil Ideal</th>
                <th scope="col" style="text-align: center;">Gap</th>
            </tr>
            @foreach($details as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detail->criteria_name }}</td>
                <td>{{ $detail->retailer_profile_name }}</td>
                <td style="text-align: center;">{{ $detail->retailer_profile_score }}</td>
                <td>{{ $detail->ideal_profile_name }}</td>
                <td style="text-align: center;">{{ $detail->ideal_profile_score }}</td>
                <td style="text-align: center;">{{ $detail->gap }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="shadow p-3 my-3 detail">
        <h4 class="h4">Gambar Lokasi</h4>
        @if($images->count())
        <div class="row justify-content-start m-4">
            @foreach($images as $image)
            <div class="col-sm-4">
                <img class="img-thumbnail" src="{{ asset('storage/ProfileImages/' . $image->image_name) }}" alt="profile image">
            </div>
            @endforeach
        </div>
        @else
        <p class="text-muted">Gambar tidak tersedia.</p>
        @endif
    </div>
    <!-- <div class="shadow p-3 my-3 detail">
        <h4 class="h4">Denah Lokasi</h4>
        <div id="map" class="my-3 p-3"></div>
    </div> -->
</main>
@endsection

<!-- @section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtLh1aP1Oh6epIP3_2ycC0Ku_AVQauzjs&callback=initMap&v=weekly" defer></script>
<script>
    var map;

    function initMap() {
        var loc = {
            lat: <?php echo $retailer->latitude; ?>,
            lng: <?php echo $retailer->longitude; ?>
        };

        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: loc,
        });

        var marker = new google.maps.Marker({
            position: loc,
            map: map,
            draggable: true
        });
    }
</script>
@endsection -->
