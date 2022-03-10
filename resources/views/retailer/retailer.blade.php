@extends('retailer.layouts.main')
@section('content')

<div class="container">

  <h2>Profil Lokasi</h2>
  <table>
    @foreach($profiles as $profile)
    <tr>
      <td>{{ $profile->profile_id }}</td>
    </tr>
    @endforeach
  </table>

  <a class="btn btn-primary mt-3" href="/retailer">Kembali</a>
</div>
@endsection