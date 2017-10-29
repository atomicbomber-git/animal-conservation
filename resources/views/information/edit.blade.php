@extends("shared.admin-base")

@section("title", "Sunting Artikel")

@section("extra-head")
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/classic/ckeditor.js">
    </script>

    <style type="text/css">
        .ck-editor__editable {
            min-height: 400px;
        }
    </style>
@endsection

@section("main-content")
    <div class="container-fluid">
        @if (session("message-success"))
        <div class="alert alert-success">
            {{ session("message-success") }}
        </div>
        @endif
        <h1> Sunting Artikel </h1>
        <hr/>
        <form action="{{ route('information.update', $article) }}" enctype="multipart/form-data" method="POST">

            <div class="form-group">
                <label for="title"> Judul: </label>
                <input value="{{ old("title") ?: $article->title }}" class="form-control {{ $errors->has("title") ? "is-invalid" : "" }}" type="text" name="title" id="title">
                @if ($errors->has("title"))
                <div class="invalid-feedback">
                    {{ $errors->first("title") }}
                </div>
                @endif
            </div>
            

            <div class="form-group">
                <textarea style="height: 500px" name="content" id="editor">{{ old("content") ?: $article->content }}</textarea>
                @if ($errors->has("content"))
                <div class="text-danger">
                    {{ $errors->first("content") }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <h5> Gambar Artikel Sekarang: </h5>
                <img src="{{ route('information.thumbnail', $article) }}" alt="Gambar Lama Artikel" style="max-width: 300px">
            </div>

            <div class="alert alert-warning">
                Keterangan: Biarkan kolom gambar kosong jika tidak ingin mengubah gambar lama.
            </div>

            <div class="form-group">
                <label for="image"> Gambar Baru: </label>
                <input class="form-control-file" type="file" name="image" id="image">
                @if ($errors->has("image"))
                <div class="text-danger">
                    {{ $errors->first("image") }}
                </div>
                @endif
            </div>

            <div class="text-right">
                <button class="btn btn-primary"> Publikasikan </button>
            </div>

            {{ csrf_field() }}
        </form>
    </div>
@endsection

@section("extra-script")
    <script type="text/javascript">
        ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: [ 'headings', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' ],
            heading: {
                options: [
                    { modelElement: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { modelElement: 'heading1', viewElement: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { modelElement: 'heading2', viewElement: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
        .catch( error => {
            console.log( error );
        } );
    </script>
@endsection