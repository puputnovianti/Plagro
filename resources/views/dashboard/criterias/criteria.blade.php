@extends('dashboard.layouts.main')
@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-flex">
    <div class="row justify-content-evenly">
        <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Kriteria : {{ $criteria_name }}</h1>
            <h6>{{ $factors->name }}</h6>
        </div>

        @isset($profiles)


        <div class="col-md-5 shadow p-3 detail" style="height: fit-content;">
            <legend>Tambah Data Profil</legend>
            <form action="/dashboard/criterias/criteria" method="post">
                @csrf
                <div class="mb-3 mt-3">
                    <input name="criteria_id" type="hidden" class="form-control" value="{{ $criteria_id }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Nama Profil</label>
                    <input name="name" type="text" class="form-control" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="score" class="form-label">Nilai</label>
                    <input name="score" type="number" class="form-control" required>
                </div>
                <div class="profile"></div>
                <button type="submit" class="btn btn-success mt-3 rounded-pill">Simpan</button>
            </form>
        </div>



        <div class="shadow p-2 col-md-6 detail">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Profil</th>
                        <th scope="col" style="text-align: center;">Nilai</th>
                        <th scope="col" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $profile->name }}</td>
                        <td style="text-align: center;">{{ $profile->score }}</td>
                        <td style="text-align: center;">
                            <a class="badge bg-warning m-1" href="/dashboard/profiles/{{$profile->id}}/edit"><span data-feather="edit"></span></a>
                            <form action="/dashboard/profiles/{{ $profile->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0 m-1 show-alert-delete-box" data-toggle="tooltip" title='Delete'><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-warning my-1 rounded-pill" href="/dashboard/ideal_profile/{{ $criteria_id }}">Pilih Profil Ideal</a>
        </div>
    </div>
    @endisset
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Apakah Anda yakin menghapus data ini?",
            text: "Data profil akan terhapus.",
            icon: "warning",
            type: "warning",
            buttons: ["Batal", "Hapus"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@endsection
