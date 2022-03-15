@extends('retailer.layouts.main')
@section('content')

<div class="container">

  <h2 class="mt-5">Profil Lokasi</h2>
  <table class="table table-hover">
    @foreach($profiles as $profile)
    <tr>
      <th>{{ $profile->profile->criteria->name }}</th>
      <td>{{ $profile->profile->name }}</td>
    </tr>
    @endforeach
  </table>

  <a class="btn btn-success rounded-pill mt-3" href="/retailer">Kembali</a>
  <a class="btn border border-success rounded-pill mt-3" href="/retailer/retailer_profile/{{ $retailer_id }}/edit">Ubah</a>
</div>
@endsection