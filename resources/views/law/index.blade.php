@extends("shared.admin-base")

@section("title", "Peraturan Pemerintah")

@section("main-content")
    <h3> Tambahkan Peraturan Pemerintah Baru </h3>
    <hr/>
    <form enctype="multipart/form-data" style="max-width: 400px">
        <div class="form-group">
            <label for="name"> Nama Peraturan: </label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="document"> Dokumen: </label>
            <input class="form-control-file" type="file" name="document" id="document">
        </div>
        <div class="text-right">
            <button class="btn btn-primary">
                
            </button>
        </div>
    </form>

    <div style="height: 40px"></div>

    <h1> Daftar Peraturan Pemerintah </h1>
    <hr/>
    <table class="table table-sm table-dark">
        <thead>
            <tr>
                <th> # </th>
                <th> Judul </th>
                <th> Berkas </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laws as $law)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $law->name }} </td>
                <td> {{ $law->document }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection