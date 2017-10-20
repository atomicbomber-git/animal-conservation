@extends("shared.navbar-base")

@section("content-collapsible")
<ul class="navbar-nav mr-auto">
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('main') }}"> <i class="fa fa-home" aria-hidden="true"> </i> Beranda </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#"> <i class="fa fa-book" aria-hidden="true"> </i> Perizinan </a>
  </li>

  @if(Auth::check())
  <li class="nav-item">
    <a class="nav-link" href="#"> <i class="fa fa-file-text" aria-hidden="true"> </i> Laporkan </a>
  </li>
  @endif

  <li class="nav-item">
    <a class="nav-link" href="#"> <i class="fa fa-info" aria-hidden="true"> </i> Informasi </a>
  </li>
</ul>

<form class="form-inline my-2 my-lg-0" method="{{ Auth::check() ? "POST": "GET" }}" action="{{ Auth::check() ? route('logout') : route('login') }}">
  @if(Auth::check())
    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">
      Keluar <i class="fa fa-sign-out" aria-hidden="true"> </i>
    </button>

    {{ csrf_field() }}
  @else
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
      Masuk <i class="fa fa-sign-in" aria-hidden="true"> </i>
    </button>
  @endif

</form>
@endsection