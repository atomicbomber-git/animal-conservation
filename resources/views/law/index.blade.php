@extends("shared.admin-base")

@section("title", "Peraturan Pemerintah")

@section("main-content")
    <h3> Tambahkan Peraturan Pemerintah Baru </h3>
    <hr/>
    @if (session("message-success"))
        <div class="alert alert-success">
            {{ session("message-success") }}
        </div>
    @endif
    <form method="POST" enctype="multipart/form-data" style="max-width: 400px" action="{{ route('law.save') }}">
        <div class="form-group">
            <label for="name"> Nama Peraturan: </label>
            <input value="{{ old("name") }}" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" type="text" name="name" id="name">
            @if ($errors->has("name"))
            <div class="invalid-feedback">
                {{ $errors->first("name") }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="document"> Dokumen: </label>
            <input class="form-control-file {{ $errors->has("document") ? "is-invalid" : "" }}" type="file" name="document" id="document">
            @if ($errors->has('document'))
            <p class="text-danger form-text">
                {{ $errors->first('document') }}
            </p>
            @endif
        </div>
        <div class="text-right">
            <button class="btn btn-primary btn-sm">
                Tambahkan
                <i class="fa fa-plus"></i>
            </button>
        </div>
        {{ csrf_field() }}
    </form>

    <div style="height: 40px"></div>

    <h1> Daftar Peraturan Pemerintah </h1>
    <hr/>
    <table class="table table-sm">
        <thead>
            <tr>
                <th> # </th>
                <th> Judul </th>
                <th> Kendali </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laws as $law)
            <tr>
                <td> {{ $loop->iteration }}. </td>
                <td> {{ $law->name }} </td>
                <td>
                    <a href="{{ route('law.download', $law) }}" class="btn btn-dark btn-sm"> Unduh
                        <i class="fa fa-file-pdf-o"></i>
                    </a>
                    <form style="display: inline;" method="POST" action="{{ route('law.delete', $law) }}">
                        <button class="btn btn-danger btn-sm">
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
@endsection