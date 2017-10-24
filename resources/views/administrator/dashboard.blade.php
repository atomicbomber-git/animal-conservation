@extends("shared.admin-base")

@section("main-content")
    <h1> Dashboard </h1>
    <hr/>
    <div class="alert alert-info">
        Selamat datang di modul administrasi CEMPAKA. Modul ini bertujuan untuk memfasilitasi administrator dalam mengelola website CEMPAKA.
    </div>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
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
@endsection