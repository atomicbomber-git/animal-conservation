@extends("shared.base")

@section("body")
    @include('shared.navbar', ["page" => "Beranda"])

    <div class="container-fluid">
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
            </div>
        </div>
    </div>

    <div style="padding: 15px 0px 15px 0px; background: black">
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
    </div>
    
    <div class="container-fluid" style="padding-bottom: 30px; padding-top: 30px">
        <div class="row">
            <div class="info col-md">
                <h4> INFORMASI TERBARU </h4>
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="info col-md">
                <h4> BERITA </h4>
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="info col-md">
                <h4> PERATURAN PEMERINTAH </h4>
                
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                    Cras justo odio
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                    <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                    <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                </div>

            </div>
        </div>
    </div>

    <div style="background: black; padding-top: 20px; padding-bottom: 20px; color: white">
        <div class="container-fluid">
            <p>
                Copyright <i class="fa fa-copyright" aria-hidden="true"> </i> Tim Pengembangan Web Teknik Informatika Untan
            </p>
        </div>
    </div>
@endsection