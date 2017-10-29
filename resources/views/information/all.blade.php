@extends("shared.base")

@section("title", "Seluruh Artikel")

@section("body")
    @include('shared.navbar', ["page_category" => "article"])
    <div class="container-fluid container-medium">
        <h1> Seluruh Artikel </h1>
        <hr/>

        
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-4">
                <div class="card" style="height: 330px; margin-bottom: 20px">
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
            </div>
            @endforeach

        </div>
    </div>
@endsection