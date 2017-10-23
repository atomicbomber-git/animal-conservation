@extends("shared.base")

@section("title", "Dashboard")

@section("body")

    @include("shared.navbar-admin", ["page" => "Dashboard Administrator"])

    <div class="container-fluid container-medium">

        <div class="alert alert-info">
            Selamat datang di modul administrasi CEMPAKA. Modul ini bertujuan untuk memfasilitasi administrator dalam mengelola website CEMPAKA.
        </div>

        <h1> Dashboard </h1>
        <hr/>

        <div class="card">
            <div class="card-header">
                <i class="fa fa-user"></i>
                Verifikasi Pengguna
            </div>
            <div class="card-body">
                Terdapat {{ $unverifiedCount }} akun yang berstatus belum terverifikasi.
                <div style="text-align: right;">
                    <a href="{{ route('user.index') }}" class="btn btn-primary">
                        <i class="fa fa-cog"></i>
                        Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection