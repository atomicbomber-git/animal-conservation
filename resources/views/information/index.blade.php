@extends("shared.admin-base")

@section("title", "Daftar Seluruh Artikel")

@section("extra-head")
@endsection

@section("main-content")
    <div class="container-fluid">
        @if (session("message-success"))
        <div class="alert alert-success">
            {{ session("message-success") }}
        </div>
        @endif

        <a href="{{ route('information.create') }}" class="btn btn btn-primary">
            Tambahkan Artikel Baru
            <i class="fa fa-plus"></i>
        </a>

        <div style="height: 40px"></div>

        <h1> Daftar Seluruh Artikel </h1>
        <hr/>
        
        <table class="table table-sm">
            <thead>
                <tr>
                    <td> # </td>
                    <td> Judul </td>
                    <td> Tanggal Publikasi </td>
                    <td> Kelola </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <td> {{ $loop->iteration }}. </td>
                    <td> {{ $article->title }} </td>
                    <td> {{ $article->formattedDate() }} </td>
                    <td>
                        <a href="{{ route('information.detail', $article) }}" class="btn btn-sm btn-dark">
                            Lihat
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('information.edit', $article) }}" class="btn btn-sm btn-dark">
                            Sunting
                            <i class="fa fa-pencil"></i>
                        </a>
                        <form action="{{ route('information.delete', $article) }}" method="POST" style="display: inline;">
                            <button class="btn btn-sm btn-danger">
                                Hapus
                                <i class="fa fa-trash"></i>
                            </button>
                            {{ csrf_field() }}
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

@section("extra-script")
@endsection