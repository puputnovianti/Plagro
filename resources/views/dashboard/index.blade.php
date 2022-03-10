@extends('dashboard.layouts.main')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-evenly flex-wrap flex-md-nowrap align-items-center py-5 mb-3 a mt-3">
    <div>
      <h2 class="h2">Selamat datang, Admin!</h2>
      <h6 class="text-muted">Sistem rekomendasi pemilihan lokasi retail <br>Plagro.id </h6>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="300" height="300" viewBox="0 0 943 601.74159" xmlns:xlink="http://www.w3.org/1999/xlink">
      <path d="M296.22237,745.63557c8.99256-7.59865,14.45479-19.60227,13.02232-31.28789S298.94,691.91939,287.43137,689.4379s-24.62761,4.38768-28.12315,15.62987c-1.92376-21.6745-4.14055-44.25714-15.6641-62.715-10.43429-16.71314-28.50667-28.672-48.093-30.81147s-40.20832,5.941-52.42362,21.40027-15.20618,37.93388-6.6509,55.68241c6.30238,13.07474,17.91358,22.80511,30.07923,30.72128A194.12948,194.12948,0,0,0,299.328,748.39148Z" transform="translate(-128.5 -149.12921)" fill="#f2f2f2" />
      <path d="M162.49608,617.9302a317.625,317.625,0,0,1,44.26411,43.95415,322.16342,322.16342,0,0,1,34.90754,51.66276,320.84533,320.84533,0,0,1,14.94817,31.65122c.89773,2.19991-2.67454,3.15752-3.56229.98208a315.27614,315.27614,0,0,0-28.80781-54.50557,317.2596,317.2596,0,0,0-38.63585-47.729,316.50075,316.50075,0,0,0-25.7261-23.40344c-1.8443-1.5018.78314-4.10164,2.61223-2.61223Z" transform="translate(-128.5 -149.12921)" fill="#fff" />
      <path d="M832.85431,149.12921h-487a7.00778,7.00778,0,0,0-7,7v330a7.00778,7.00778,0,0,0,7,7h487a7.00779,7.00779,0,0,0,7-7v-330A7.00778,7.00778,0,0,0,832.85431,149.12921Zm5,337a5.002,5.002,0,0,1-5,5h-487a5.002,5.002,0,0,1-5-5v-330a5.002,5.002,0,0,1,5-5h487a5.002,5.002,0,0,1,5,5Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <rect x="211.35431" y="28.03998" width="499" height="2" fill="#3f3d56" />
      <circle cx="228.35431" cy="15" r="6" fill="#3f3d56" />
      <circle cx="245.60431" cy="15" r="6" fill="#3f3d56" />
      <circle cx="262.85431" cy="15" r="6" fill="#3f3d56" />
      <path d="M631.35431,223.62921h-84a7,7,0,0,1,0-14h84a7,7,0,0,1,0,14Z" transform="translate(-128.5 -149.12921)" fill="#ccc" />
      <path d="M688.85431,257.62921h-199a7,7,0,0,1,0-14h199a7,7,0,0,1,0,14Z" transform="translate(-128.5 -149.12921)" fill="#ccc" />
      <path d="M748.53546,466.58013a38.13792,38.13792,0,1,1,38.13792-38.13792A38.181,38.181,0,0,1,748.53546,466.58013Zm0-73.64563a35.50772,35.50772,0,1,0,35.50772,35.50771A35.548,35.548,0,0,0,748.53546,392.9345Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <path d="M428.79916,364.43729a38.13792,38.13792,0,1,1,38.13791-38.13792A38.181,38.181,0,0,1,428.79916,364.43729Zm0-73.64563a35.50772,35.50772,0,1,0,35.50771,35.50771A35.548,35.548,0,0,0,428.79916,290.79166Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <path d="M443.61344,346.51658a3.76826,3.76826,0,0,1-3.76917-3.7627V321.35546a3.76683,3.76683,0,0,1,3.76247-3.7627h.0067a3.76683,3.76683,0,0,1,3.76247,3.7627v21.39842A3.76683,3.76683,0,0,1,443.61344,346.51658Zm-9.82422,0a3.77874,3.77874,0,0,1-3.81659-3.7627V331.2271a3.76643,3.76643,0,0,1,3.76246-3.76224h.05413a3.76643,3.76643,0,0,1,3.76246,3.76224v11.52678A3.76682,3.76682,0,0,1,433.78922,346.51658Zm-9.91906,0a3.76825,3.76825,0,0,1-3.76917-3.7627v-32.909a3.76681,3.76681,0,0,1,3.76246-3.76269h.00671a3.76681,3.76681,0,0,1,3.76246,3.76269v32.909A3.76682,3.76682,0,0,1,423.87016,346.51658Zm-9.88136,0a3.76248,3.76248,0,0,1-3.76639-3.76547l.00416-4.94276a3.76235,3.76235,0,0,1,7.5247.00324v4.94229A3.76683,3.76683,0,0,1,413.9888,346.51658Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <path d="M1007.3424,748.43729a38.13792,38.13792,0,1,1,38.13791-38.13792A38.181,38.181,0,0,1,1007.3424,748.43729Zm0-73.64563a35.50772,35.50772,0,1,0,35.50771,35.50771A35.548,35.548,0,0,0,1007.3424,674.79166Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <path d="M1017.85564,703.68049l-7.43541,11.36909a4.02783,4.02783,0,0,1,.91862,2.57531,4.09067,4.09067,0,0,1-8.18133,0,4.803,4.803,0,0,1,.07069-.78516l-4.90724-2.858a4.075,4.075,0,0,1-4.85226.61242l-5.22132,4.89154v4.87582a3.651,3.651,0,0,0,3.63529,3.64314h30.91163a3.65882,3.65882,0,0,0,3.64314-3.64314V706.27936l-4.99358-3.32122a4.1064,4.1064,0,0,1-3.58818.72235Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <path d="M995.48652,706.97816a4.09068,4.09068,0,0,1,4.09069,4.09066h0v.52607l5.11924,2.86582a4.08275,4.08275,0,0,1,2.591-.92648,4.52228,4.52228,0,0,1,.88723.09421l7.45113-11.534a4.0756,4.0756,0,1,1,7.39617-2.35547,4.33469,4.33469,0,0,1-.10993.96575l3.52535,2.35547v-6.823a3.65884,3.65884,0,0,0-3.64314-3.64315H991.88263a3.651,3.651,0,0,0-3.63528,3.64315v19.54257l3.4076-3.26626a4.08284,4.08284,0,0,1,3.83157-5.4961Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <path d="M590.86678,364.43729a38.13792,38.13792,0,1,1,38.13791-38.13792A38.181,38.181,0,0,1,590.86678,364.43729Zm0-73.64563a35.50772,35.50772,0,1,0,35.50771,35.50771A35.548,35.548,0,0,0,590.86678,290.79166Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <path d="M570.60485,340.12407a2.77334,2.77334,0,0,1-1.96346-4.73136L582.733,321.26155a2.35169,2.35169,0,0,1,1.67549-.69573h.00162a2.35236,2.35236,0,0,1,1.67457.69342l6.53545,6.53545a1.411,1.411,0,0,0,1.005.41633h.00069a1.40966,1.40966,0,0,0,1.00474-.41679l9.227-9.24252a.47326.47326,0,0,0-.00069-.66983l-2.98532-2.98046a1.4209,1.4209,0,0,1,1.00382-2.42674h10.60369a1.42263,1.42263,0,0,1,1.42107,1.42107v10.597a1.421,1.421,0,0,1-2.42582,1.00521l-2.98994-2.99018a.47353.47353,0,0,0-.66983,0L595.3198,334.994a2.35226,2.35226,0,0,1-1.67434.69342h-.00023a2.35284,2.35284,0,0,1-1.67457-.69388l-6.53869-6.5387a1.45572,1.45572,0,0,0-2.00972,0l-10.85672,10.8565A2.75361,2.75361,0,0,1,570.60485,340.12407Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <path d="M590.86678,464.43729a38.13792,38.13792,0,1,1,38.13791-38.13792A38.181,38.181,0,0,1,590.86678,464.43729Z" transform="translate(-128.5 -149.12921)" fill="#e6e6e6" />
      <path d="M748.86678,361.43729a38.13792,38.13792,0,1,1,38.13791-38.13792A38.181,38.181,0,0,1,748.86678,361.43729Z" transform="translate(-128.5 -149.12921)" fill="#e6e6e6" />
      <path d="M428.80014,388.16077a38.281,38.281,0,0,0-18.68994,4.9,35.51667,35.51667,0,0,1,6.80029,69.48,36.627,36.627,0,0,0,4.54981,1.19,37.74743,37.74743,0,0,0,7.33984.71,38.14,38.14,0,1,0,0-76.28Z" transform="translate(-128.5 -149.12921)" fill="#e6e6e6" />
      <path d="M414.33041,391.02082a36.9874,36.9874,0,0,0-7.34033-.72,38.17983,38.17983,0,1,0,7.34033.72Zm2.58008,71.52a35.51163,35.51163,0,1,1-9.92041-69.61c1.05029,0,2.09033.05,3.12012.13a35.51667,35.51667,0,0,1,6.80029,69.48Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <path d="M429.19633,421.72749A21.39188,21.39188,0,0,0,403.617,405.622c-.54.12316-1.099.27472-1.59159.42633l5.09692,22.39612,22.3961-5.08744C429.4237,422.83591,429.31949,422.26751,429.19633,421.72749Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <path d="M427.02683,427.28862l-22.40557,5.08743-5.08743-22.39611a21.38241,21.38241,0,1,0,27.47406,17.30868Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <path d="M820.73649,606.58013a38.13792,38.13792,0,1,1,38.13792-38.13792A38.1811,38.1811,0,0,1,820.73649,606.58013Zm0-73.64563a35.50772,35.50772,0,1,0,35.50772,35.50771A35.54809,35.54809,0,0,0,820.73649,532.9345Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <path d="M837.19251,583.72337a7.058,7.058,0,1,1,7.05332-7.06281A7.06126,7.06126,0,0,1,837.19251,583.72337Zm-16.45613,0a7.06121,7.06121,0,0,1-7.05309-7.05309V560.21415a7.05321,7.05321,0,0,1,14.10641,0v16.45613A7.06126,7.06126,0,0,1,820.73638,583.72337Zm-16.45127,0a7.06615,7.06615,0,0,1-7.058-7.05818v-6.57477a7.05806,7.05806,0,0,1,14.11612,0v6.57477A7.06619,7.06619,0,0,1,804.28511,583.72337Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <polygon points="208.63 590.417 220.255 589.098 220.699 543.633 203.542 545.58 208.63 590.417" fill="#a0616a" />
      <path d="M334.94614,734.3892h36.76844a0,0,0,0,1,0,0v14.206a0,0,0,0,1,0,0H349.15212a14.206,14.206,0,0,1-14.206-14.206v0A0,0,0,0,1,334.94614,734.3892Z" transform="translate(659.51324 1289.28754) rotate(173.52594)" fill="#2f2e41" />
      <polygon points="89.081 589.691 100.78 589.69 106.345 544.565 89.079 544.566 89.081 589.691" fill="#a0616a" />
      <path d="M215.07381,735.47669h36.76844a0,0,0,0,1,0,0v14.206a0,0,0,0,1,0,0H229.27979a14.206,14.206,0,0,1-14.206-14.206v0a0,0,0,0,1,0,0Z" transform="translate(338.44996 1336.0195) rotate(179.99738)" fill="#2f2e41" />
      <path d="M301.51877,537.024l6.67984,21.72783,36.262,78.46977,9.54262,74.43251-21.948.95426L318.6955,643.90145l-45.80462-49.62167-40.079,129.77976-18.131-1.90853s15.26821-167.95027,36.262-185.127C250.94283,537.024,285.2963,520.80154,301.51877,537.024Z" transform="translate(-128.5 -149.12921)" fill="#2f2e41" />
      <circle cx="143.38778" cy="270.70456" r="23.43768" fill="#a0616a" />
      <path d="M303.90442,541.31819s2.86279-97.33481-37.21625-90.655S243.30873,551.338,243.30873,551.338s8.58837,17.17674,29.58215-1.90852S303.90442,541.31819,303.90442,541.31819Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <path d="M386.87808,460.3011a9.59588,9.59588,0,0,1-14.588,1.92261l-30.02072,16.17393,1.57182-17.65053,28.26721-12.653a9.64786,9.64786,0,0,1,14.76964,12.207Z" transform="translate(-128.5 -149.12921)" fill="#a0616a" />
      <path d="M271.66384,462.54709l48.731,8.23719,43.6703-20.61545,6.63015,14.17735-47.8064,30.45008s-50.6122,3.4366-62.31372-9.91061c-4.38807-5.00521-4.88969-9.56081-3.80262-13.30015A13.15,13.15,0,0,1,271.66384,462.54709Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <path d="M269.10026,444.4607a.96721.96721,0,0,0-.13663-1.54271,13.63,13.63,0,0,1,1.31315-23.89229c6.89079-3.28545,16.22824-.72948,21.32218-7.04284a11.84115,11.84115,0,0,0,2.19733-9.61629c-1.09915-5.963-5.58187-10.39126-10.6021-13.42609A38.57986,38.57986,0,0,0,224.89912,426.285c.648,5.73905,2.41885,12.17427-.99367,16.83381-3.00339,4.1009-8.67248,4.86985-13.65238,5.88883-10.68119,2.18556-20.98582,7.22749-28.23428,15.37146s-11.11531,19.57025-8.92988,30.25146,10.95309,20.06823,21.72915,21.72385c8.77126,1.34761,17.82818-2.37736,24.26931-8.48168s10.51253-14.34767,13.08059-22.84215c3.04806-10.0822,4.25038-20.94642,9.75336-29.92744,5.385-8.78849,16.98964-15.08846,26.0847-10.51144a.97528.97528,0,0,0,1.09424-.131Z" transform="translate(-128.5 -149.12921)" fill="#2f2e41" />
      <path d="M948.3084,617.94522a9.69085,9.69085,0,0,0,3.46542-14.45l22.58194-124.97534-21.07284-.2777L937.601,601.82657a9.74337,9.74337,0,0,0,10.70737,16.11865Z" transform="translate(-128.5 -149.12921)" fill="#ffb8b8" />
      <polygon points="754.406 462.891 746.406 500.891 747.406 585.891 762.406 585.891 769.406 502.891 780.406 467.891 754.406 462.891" fill="#ffb8b8" />
      <polygon points="803.98 465.742 795.98 503.742 796.98 588.742 811.98 588.742 818.98 505.742 829.98 470.742 803.98 465.742" fill="#ffb8b8" />
      <path d="M870.68593,734.04284h23.64389a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H855.79908a0,0,0,0,1,0,0v0A14.88685,14.88685,0,0,1,870.68593,734.04284Z" transform="translate(-130.35756 -146.93143) rotate(-0.14375)" fill="#2f2e41" />
      <path d="M920.62865,735.65028h23.64389a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H905.74181a0,0,0,0,1,0,0v0A14.88685,14.88685,0,0,1,920.62865,735.65028Z" transform="translate(-130.36143 -146.80612) rotate(-0.14375)" fill="#2f2e41" />
      <circle cx="790.90589" cy="251.97332" r="24.56103" fill="#ffb8b8" />
      <path d="M973.6838,461.85156c-7.47253-11.72545-30.93465-39.53379-65.84648-23.57182a14.84335,14.84335,0,0,0-8.56765,14.62943c1.68953,22.299,3.82095,79.11314-14.36378,113.11068,0,0,53,16,82,1,0,0-10-67,0-80a53.90379,53.90379,0,0,0,8.0129-13.72625A12.89108,12.89108,0,0,0,973.6838,461.85156Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <path d="M963.90589,461.01985l9.81358,4.089a3.71844,3.71844,0,0,1,2.285,3.27758l.90139,21.63343-22-2Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <path d="M888.90589,564.01985s-22,41-18,79l31,5,22-53-5,54,32,1s21-78,14-85Z" transform="translate(-128.5 -149.12921)" fill="#2f2e41" />
      <path d="M857.66021,567.6794a9.69086,9.69086,0,0,0,7.70815-12.70421L909.997,470.84491l-19.98376-6.69262-37.63321,84.91048a9.74337,9.74337,0,0,0,5.28014,18.61663Z" transform="translate(-128.5 -149.12921)" fill="#ffb8b8" />
      <path d="M916.08986,448.07035l-8.266-3.69773s-7.00862-4.345-13.22112,5.21555-12.92348,30.512-12.92348,30.512l26.97051,7.58891Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <path d="M923.34031,412.92694c.882-3.06179.62715-7.205-2.34125-8.36309-1.54665-.6034-3.27233-.12748-4.92388.04166a13.14144,13.14144,0,0,1-9.08063-2.49948c-3.0705-2.28257-4.96707-5.77162-6.768-9.14721l-2.724-5.10565a22.18174,22.18174,0,0,1-1.5455-3.327c-1.51566-4.50732.13007-9.72558,3.49912-13.08157a18.97566,18.97566,0,0,1,12.96279-5.08229,34.98411,34.98411,0,0,1,13.85112,2.96738,61.26041,61.26041,0,0,1,20.65329,13.875c3.832,3.92009,7.32031,9.02692,6.51967,14.45-.62323,4.22139-3.70027,7.60172-6.63486,10.69957l-10.64471,11.23689c-1.88515,1.99-3.89961,4.06119-6.53184,4.82631s-6.02319-.35883-6.741-3.00434C922.8906,421.41319,922.45827,415.98873,923.34031,412.92694Z" transform="translate(-128.5 -149.12921)" fill="#2f2e41" />
      <path d="M1070.5,750.87079h-941a1,1,0,0,1,0-2h941a1,1,0,0,1,0,2Z" transform="translate(-128.5 -149.12921)" fill="#3f3d56" />
      <path d="M762.53546,444.44221h-28a3,3,0,0,1,0-6h28a3,3,0,0,1,0,6Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <path d="M762.53546,431.44221h-28a3,3,0,0,1,0-6h28a3,3,0,0,1,0,6Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
      <path d="M762.53546,418.44221h-28a3,3,0,0,1,0-6h28a3,3,0,0,1,0,6Z" transform="translate(-128.5 -149.12921)" fill="#198754" />
    </svg>
  </div>

  <h2>Calon Retailer</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">No.HP</th>
          <th scope="col">Lokasi</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($retailers as $retailer)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $retailer->user->name }}</td>
          <td>{{ $retailer->phone }}</td>
          <td>{{ $retailer->location }}</td>
          <td><a class="badge bg-info" href="/dashboard/criterias/{{$retailer->id}}"><span data-feather="eye"></span></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection