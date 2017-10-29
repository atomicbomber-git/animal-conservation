@extends("shared.navbar-base")

@section("content-collapsible")
<ul class="navbar-nav mr-auto">
  <li class="nav-item {{ isset($page_category) && ($page_category === "home") ? "active" : "" }}">
    <a class="nav-link" href="{{ route('main') }}"> <i class="fa fa-home" aria-hidden="true"> </i> Beranda </a>
  </li>

  @can("submit-permit-proposal")
    <li class="nav-item">
      <a class="nav-link {{ isset($page_category) && ($page_category === "permit") ? "active" : "" }}" href="{{ route('permit.create') }}"> <i class="fa fa-book" aria-hidden="true"> </i> Perizinan </a>
    </li>
  @endcan

  @can("submit-report")
    <li class="nav-item">
      <a class="nav-link {{ isset($page_category) && $page_category === "report" ? "active" : "" }}" href="{{ route('report.create') }}"> <i class="fa fa-file-text" aria-hidden="true"> </i> Laporkan </a>
    </li>
  @endcan

  <li class="nav-item">
    <a class="nav-link" href="{{ route('information.all') }}"> <i class="fa fa-info" aria-hidden="true"> </i> Artikel </a>
  </li>

  @can("update-account-settings")
  <li class="nav-item">
    <a href="{{ route('user.edit', auth()->user()) }}" class="nav-link {{ isset($page_category) && $page_category === "user" ? "active" : "" }}">
      <i class="fa fa-user"></i>
      Akun
    </a>
  </li>
  @endcan

  <li class="nav-item">
    <a href="{{ route('map.index') }}" class="nav-link {{ isset($page_category) && $page_category === "map" ? "active" : "" }}">
      <i class="fa fa-map"></i>
      Peta
    </a>
  </li>
</ul>

<form class="form-inline my-2 my-lg-0" method="{{ Auth::check() ? "POST": "GET" }}" action="{{ Auth::check() ? route('logout') : route('login') }}">
  @if(Auth::check())
    <button class="btn btn-danger my-2 my-sm-0" type="submit">
      Keluar <i class="fa fa-sign-out" aria-hidden="true"> </i>
    </button>

    {{ csrf_field() }}
  @else
    <button class="btn btn-success my-2 my-sm-0" type="submit">
      Masuk <i class="fa fa-sign-in" aria-hidden="true"> </i>
    </button>
  @endif

</form>
@endsection