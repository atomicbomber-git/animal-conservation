@extends("shared.base")

@section("title", "Dashboard")

@section("extra-style")
    <style type="text/css">
        div.menu-item {
            text-align: center;
        }
    </style>
@endsection

@section("body")

    @include("shared.navbar-admin")
    <div class="container-fluid">
        <nav class="row">
            <div class="col-md-2">
                <div class="list-group list-group">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-3 menu-item"> <i class="fa fa-cog"></i> </div>
                            <div class="col-9"> Dashboard </div>
                        </div>
                    </a>
                    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-3 menu-item"> <i class="fa fa-users"></i> </div>
                            <div class="col-9"> Pengguna </div>
                        </div>
                    </a>
                    <a href="{{ route('report.index') }}" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-3 menu-item"> <i class="fa fa-list"></i> </div>
                            <div class="col-9"> Laporan </div>
                        </div>
                    </a>
                    <a href="{{ route('permit.index') }}" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-3 menu-item"> <i class="fa fa-book"></i> </div>
                            <div class="col-9"> Perizinan </div>
                        </div>
                    </a>
                    <a href="{{ route('law.index') }}" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-3 menu-item"> <i class="fa fa-list-alt"></i> </div>
                            <div class="col-9"> Peraturan Pemerintah </div>
                        </div>
                     </a>
                    <a href="{{ route('information.index') }}" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-3 menu-item"> <i class="fa fa-info"></i> </div>
                            <div class="col-9"> Artikel </div>
                        </div>
                    </a>
                    <a href="{{ route('user.edit', auth()->user()) }}" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-3 menu-item"> <i class="fa fa-user"></i> </div>
                            <div class="col-9"> Akun </div>
                        </div>
                    </a>
                    <a href="{{ route('map.admin') }}" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-3 menu-item"> <i class="fa fa-map"></i> </div>
                            <div class="col-9"> Peta </div>
                        </div>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        <button class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-3 menu-item"> <i class="fa fa-sign-out"></i> </div>
                                <div class="col-9"> Keluar </div>
                            </div> 
                        </button>
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