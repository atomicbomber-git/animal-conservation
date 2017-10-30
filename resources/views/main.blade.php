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
                    <strong> Cempaka </strong> merupakan sebuah situs web dimana Anda dapat turut serta dalam usaha konservasi sumber daya alam di Indonesia. Di <strong> Cempaka</strong>, Anda dapat mengikuti perkembangan berita terbaru mengenai flora dan fauna yang dilindungi, membuat laporan terkait sumber daya alam yang dilindungi, mengajukan proposal penangkaran, dan melihat peta serta daftar lokasi penangkaran flora / fauna dilindungi di Indonesia.
                </p> 
            </div>
        </div>

        {{-- <div style="height: 10px"></div> --}}

        @if (Auth::check())
            @if ( ! auth()->user()->is_verified)
                <div class="alert alert-info">
                    <h5> <i class="fa fa-info"> </i> Peringatan </h5>
                    <p>
                        Akun Anda belum diverifikasi. Untuk dapat menggunakan seluruh fitur pada <strong> Cempaka</strong>, akun Anda harus diverifikasi terlebih dahulu oleh administrator <strong> Cempaka</strong>. Proses verifikasi umumnya selesai paling lambat tiga hari setelah akun didaftarkan.
                    </p>
                </div>
            @endif
        @else
            <div class="alert alert-warning">
                <h5> <i class="fa fa-warning"> </i> Peringatan </h5>
                <p>
                    Untuk dapat menggunakan seluruh fitur pada <strong> Cempaka</strong>, Anda harus <a href="{{ route("register") }}"> mendaftarkan akun Anda </a> terlebih dahulu dan <a href="{{ route("login") }}"> masuk </a> dengan menggunakan akun tersebut.
                </p>
            </div>
        @endif

        <div style="height: 40px"></div>

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
                                <h3> Melindungi Alam </h3>
                                <p> Cempaka dibuat untuk mendukung usaha perlindungan alam di Indonesia </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/tiger-002.jpg') }}" alt="Second slide">
                            <div class="carousel-caption">
                                <h3> Mencegah Kepunahan </h3>
                                <p> </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/tiger-003.jpg') }}" alt="Third slide">
                            <div class="carousel-caption">
                                <h3> Macan </h3>
                                <p> </p>
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