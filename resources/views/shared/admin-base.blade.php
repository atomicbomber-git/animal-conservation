@extends("shared.base")

@section("title", "Dashboard")

@section("body")

    @include("shared.navbar-admin")
    <div class="container-fluid">
        <nav class="row">
            <div class="col-md-2">
                <div class="list-group list-group">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action"> <i class="fa fa-cog"></i> Dashboard </a>
                    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action"> <i class="fa fa-users"></i> Pengguna </a>
                    <a href="{{ route('report.index') }}" class="list-group-item list-group-item-action"> <i class="fa fa-list"></i> Laporan </a>
                    <a href="{{ route('permit.index') }}" class="list-group-item list-group-item-action"> <i class="fa fa-book"></i> Perizinan </a>
                    <a href="{{ route('law.index') }}" class="list-group-item list-group-item-action"> <i class="fa fa-book"></i> Peraturan Pemerintah </a>
                    <a href="{{ route('user.edit', auth()->user()) }}" class="list-group-item list-group-item-action"> <i class="fa fa-user"></i> Akun </a>
                    <a href="#" class="list-group-item list-group-item-action"> <i class="fa fa-info"></i> Informasi </a>
                    <a href="{{ route('map.admin') }}" class="list-group-item list-group-item-action">
                        <i class="fa fa-map"></i>
                        Peta
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        <button class="list-group-item list-group-item-action"> <i class="fa fa-sign-out"></i> Keluar </button>
                        {{ csrf_field() }}
                    </form>      
                </div>
            </div>
            <div class="col-md-10">
                @yield("main-content")
            </div>
        </nav>
    </div>
@endsection