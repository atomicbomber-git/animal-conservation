@extends("shared.base")

@section("title", "Beranda")


@section("extra-style")
    <style type="text/css">
        img.card-img-top {

            clip: rect(0px,100px,100px,0px);

            height: 200px;
            width: auto;
        }
    </style>
@endsection

@section("body")
    @include('shared.navbar', ["page" => "Beranda", "page_category" => "home"])

    <div class="container-fluid">
        @if (session("message-success"))
        <div class="alert alert-success">
            {{ session("message-success") }}
        </div>
        @endif
        
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="lead">
                    <strong> CEMPAKA </strong> merupakan sebuah situs web yang dibuat untuk memfasilitasi Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Fitur-fitur yang terdapat pada <strong> CEMPAKA </strong> antara lain adalah: take this kiss upon a brow, and in parting from you now, thus much let me avow.
                </p>

                @if (Auth::check())
                    @if ( ! auth()->user()->is_verified)
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>
                                    <i class="fa fa-info"> </i>
                                    Peringatan
                                </h4>
                            </div>
                            <div class="card-text">
                                Akun Anda belum diverifikasi. Untuk dapat menggunakan seluruh fitur pada CEMPAKA, akun Anda harus
                                diverifikasi terlebih dahulu oleh administrator CEMPAKA. Proses verifikasi umumnya selesai paling lambat
                                tiga hari setelah akun didaftarkan.
                            </div>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="card bg-warning text-dark">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>
                                    <i class="fa fa-warning"> </i>
                                    Peringatan
                                </h4>
                            </div>
                            <div class="card-text">
                                Untuk dapat menggunakan seluruh fitur pada CEMPAKA, Anda harus mendaftarkan akun Anda
                                terlebih dahulu dan masuk dengan menggunakan akun tersebut.
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('register') }}">
                                Daftar
                                <i class="fa fa-list-alt"></i>
                            </a>
                            <a class="btn btn-sm btn-success" href="{{ route('login') }}">
                                Masuk
                                <i class="fa fa-sign-in"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <h4> MISI KAMI </h4>
                <hr/>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('img/tiger-001.jpg') }}" alt="First slide">
                            <div class="carousel-caption">
                                <h3> Macan </h3>
                                <p> Harimau </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/tiger-002.jpg') }}" alt="Second slide">
                            <div class="carousel-caption">
                                <h3> Macan </h3>
                                <p> Harimau </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/tiger-003.jpg') }}" alt="Third slide">
                            <div class="carousel-caption bg-dark">
                                <h3> Macan </h3>
                                <p> Harimau </p>
                            </div>
                        </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                        </div>

                <div style="height: 20px"></div>

                <h4> PERATURAN PEMERINTAH </h4>
                <hr/>
                <div class="list-group">
                    @foreach ($laws as $law)
                        <a href="{{ route('law.download', $law) }}" class="list-group-item list-group-item-action">
                            {{ $law->name }}
                        </a>
                    @endforeach
                </div>
            </div>



            <div class="col-3">
                <h4> ARTIKEL TERBARU </h4>
                <hr/>
                @foreach ($articles as $article)
                <div class="card" style="width: 100%; margin-bottom: 10px">
                    <div class="card-img-top text-center" style="background: rgba(0,0,0, 0.9)">
                         <img class="img-fluid" style="background: black; width: 100%; height: 200px; width: auto; text-align: center" src="{{ route('information.thumbnail', $article) }}" alt="">
                    </div>
                    <div class="card-body">
                        <a href="{{ route('information.detail', $article) }}">
                            <h5 class="card-title"> {{ $article->formattedTitle() }} </h5>
                        </a>
                        <p class="small text-muted"> {{ $article->formattedDate() }}  </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <div class="container-fluid" style="padding-bottom: 30px; padding-top: 30px">
        <div class="row">
            <div class="info col-md">
            </div>
            <div class="info col-md">
        
            </div>
        </div>
    </div>

    @include("shared.footer")
@endsection