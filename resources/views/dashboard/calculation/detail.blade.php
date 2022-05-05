@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

    <h2>Detail Calon Retailer</h2>
    <hr>

    <div class="table-responsive shadow p-3">
        <table cellpadding="5" cellspacing="0">
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
    <div class="shadow p-3 my-3">
        <h4 class="h4">Foto Profil Lokasi</h4>
        <div class="row justify-content-center m-4">
            @foreach($images as $image)
            <div class="col-sm-4">
                <img class="img-thumbnail" src="{{ asset('storage/ProfileImages/' . $image->image_name) }}" alt="criteria image">
            </div>
            @endforeach
        </div>
    </div>
    <div class="shadow p-3 my-3">
        <h4 class="h4">Denah Lokasi</h4>
        <div id="map" class="my-3 p-3"></div>
    </div>
</main>
@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlkOctpu1w95v0wRJ2Y2R9KJW28nfTxOM&callback=initMap&v=weekly" defer></script>
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
@endsection