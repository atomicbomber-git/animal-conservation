@extends("shared.base")

@section("title", "Unauthorized")

@section("body")
    @include("shared.navbar", ["page" => "403 Unauthorized"])
    <div class="container-fluid" style="width: 40rem">
        <div class="card text-white bg-danger">
            <div class="card-header">
                <i class="fa fa-warning"></i>
                Error: 403 Unauthorized
            </div>
            <div class="card-body">
                <p>
                    Maaf, Anda tidak diizinkan untuk mengakses halaman tersebut.
                </p>
            </div>
        </div>
    </div>
@endsection