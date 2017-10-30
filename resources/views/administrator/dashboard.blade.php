@extends("shared.admin-base")

@section("extra-style")
    <style>
        .card {
            margin-bottom: 10px;
        }
    </style>
@endsection

@section("main-content")
    <h1> Dashboard </h1>
    <hr/>
    <div class="alert alert-info">
        Selamat datang di modul administrasi CEMPAKA. Modul ini bertujuan untuk memfasilitasi administrator dalam mengelola website CEMPAKA.
    </div>
    
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-user"></i>
                    Verifikasi Pengguna
                </div>
                <div class="card-body">
                    Terdapat {{ $unverifiedCount }} akun yang berstatus belum terverifikasi.
                    <div style="text-align: right;">
                        <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-cog"></i>
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
            <div class="card-header">
                <i class="fa fa-list"></i>
                Laporan
            </div>
            <div class="card-body">
                Terdapat {{ $reportCount }} laporan yang telah masuk.
                <div style="text-align: right;">
                    <a href="{{ route('report.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-cog"></i>
                        Detail
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-book"></i>
                    Perizinan
                </div>
                <div class="card-body">
                    Terdapat {{ $permitRequestCount }} permintaan perizinan yang telah masuk.
                    <div style="text-align: right;">
                        <a href="{{ route('permit.index') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-cog"></i>
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-user"></i>
                    Lokasi Penangkaran
                </div>
                <div class="card-body">
                    Terdapat {{ $locationCount }} lokasi penangkaran yang telah tercatat.
                    <div style="text-align: right;">
                        <a href="{{ route('map.admin') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-cog"></i>
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-user"></i>
                    Artikel
                </div>
                <div class="card-body">
                    Terdapat {{ $unverifiedCount }} artikel yang telah dipublikasikan.
                    <div style="text-align: right;">
                        <a href="{{ route('information.index') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-cog"></i>
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        

@endsection