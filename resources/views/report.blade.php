@extends("shared.base")

@section("title", "Beranda")

@section("body")
    @include('shared.navbar', ["page" => "Laporan", "page_category" => "report"])
    <div class="container-fluid container-medium">
        <div class="alert alert-info">
            Laporkan hal di sekitar Anda mengenai perburuan liar, penangkapan, penjualan dan juga konflik antara manusia dan satwa
        </div>
        <h1> Laporan </h1>
        <hr/>
        <form method="POST" enctype="multipart/form-data" action="{{ route('report.save') }}">
            <div class="form-group">
                <label class="col-form-label"> Judul: </label>
                <input type="text" name="title" class="form-control">
                <small class="form-text text-muted"> Contoh: Macan Tutul Masuk Area Pemukiman </small>
            </div>
            <div class="form-group">
                <label class="col-form-label"> Keterangan: </label>
                <textarea class="form-control"></textarea>
                <small class="form-text text-muted"> Penjelasan mengenai situasi, misalnya kondisi hewan liar terkait, dsb. </small>
            </div>
            <div class="form-group">
                <label class="col-form-label"> Lokasi Kejadian: </label>
                <input type="text" class="form-control"></textarea>
                <small class="form-text text-muted"> Contoh: Jl. Sejahtera, Kecamatan Bantar Gebang, Kota Bekasi, Jawa Barat </small>
            </div>
            <div class="form-group">
                <label class="col-form-label"> Tanggal Kejadian: </label>
                <input class="form-control" type="date" name="date">
            </div>
            <div class="form-group">
                <label class="col-form-label"> Bukti Foto: </label>
                <input class="form-control-file" type="file" accept="img/*" name="image">
            </div>
            <div class="text-right">
                <button class="btn btn-primary">
                    Laporkan
                    <i class="fa fa-check"></i>
                </button>
            </div>

            {{ csrf_field() }}
        </form>
    </div>
@endsection