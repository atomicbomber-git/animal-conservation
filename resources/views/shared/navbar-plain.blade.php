@extends("shared.navbar-base")

@section("content-collapsible")
<ul class="navbar-nav mr-auto">
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('main') }}"> <i class="fa fa-home" aria-hidden="true"> </i> Beranda </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#"> <i class="fa fa-book" aria-hidden="true"> </i> Perizinan </a>
  </li>
</ul>

<form class="form-inline my-2 my-lg-0">

    @if(Auth::check())
    <a class="btn btn-outline-danger my-2 my-sm-0" href="{{ route('logout') }}" type="submit">
      Keluar <i class="fa fa-sign-out" aria-hidden="true"> </i>
    </a>
    @else
    <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('login') }}" type="submit">
      Masuk <i class="fa fa-sign-in" aria-hidden="true"> </i>
    </a>
    @endif

</form>
@endsection