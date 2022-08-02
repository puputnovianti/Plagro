@extends('dashboard.layouts.register')
@section('content')


<div class="col-md-7 my-5">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3 class="text-muted">Data Diri</h3>
    </div>
    <div class="description p-1 pt-3">
        <ul>
            <li>Link Maps adalah link Google Maps yang mengarah pada lokasi ritel anda</li>
            <li>Klik Google Maps yang terletak dibawah form Link Maps > cari lokasi ritel anda > bagikan > salin link</li>
        </ul>
    </div>
    <form method="POST" action="/register" class="retailerForm" enctype="multipart/form-data">
        @csrf
        <div class="my-2">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label for="name" class="form-label">Nama</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label for="phone" class="form-label">Nomor HP</label>
            <input name="phone" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
            @error('phone')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label for="address" class="form-label">Alamat Domisili</label>
            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
            @error('address')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label for="location" class="form-label">Lokasi Ritel</label>
            <input name="location" type="text" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
            @error('location')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label for="location" class="form-label">Link Maps</label>
            <input id="link" name="link" type="text" class="form-control" value="{{ old('link') }}">
            <a target="_blank" rel="noopener noreferrer" href="https://www.google.com/maps">Google Maps</a>
        </div>

        <!-- Google map -->
        <div id="map"></div>


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="text-muted">Profil Lokasi</h3>
        </div>
        <div class="description p-1 pt-3">
            <ul>
                <li>Anda dapat mengunggah foto tempat dan fasilitas seperti tempat parkir atau ruang penyimpanan barang Anda lebih dari satu</li>
                <li>Format foto yang dapat diunggah adalah .jpg/.jpeg/.png</li>
            </ul>
        </div>

        @foreach($criterias as $criteria)
        <div class="my-2">
            <label class="form-label col-form-label">{{$criteria->name}}</label>
            <select class="form-select" name="retailer_profile_name[]">
                @foreach($criteria->profiles as $profile)
                <option value="{{ $profile->name }}">{{ $profile->name }}</option>
                @endforeach
            </select>
        </div>
        @endforeach
        <div class="my-2">
            <label class="form-label col-form-label">Gambar lokasi</label>
            <input type="file" name="facilities[]" class="form-control @error('profile_images') is-invalid @enderror" multiple>
            @error('profile_images')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-success rounded-pill mt-2 ">Daftar</button>
    </form>

</div>
@endsection
