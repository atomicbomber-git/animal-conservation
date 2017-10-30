@extends("shared.base")

@section("title", $article->title)

@section("body")
    @include("shared.navbar", ["page_category" => "article"])
    <div class="container-fluid container-medium">
        <h1>
            {{ $article->title }}
        </h1>
        <div class="text-muted">
            {{ $article->formattedDate() }}
        </div>
        <hr/>
        <div>
            <img class="img-fluid" src="{{ route('information.image', $article) }}">
            <div style="height: 30px"> </div>
            {!! $article->content !!}
            <div style="height: 30px"> </div>
        </div>
    </div>

    @include("shared.footer")
@endsection