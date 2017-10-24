@extends("shared.base")

@section("title", "Beranda")

@section("body")
    @include('shared.navbar', ["page" => "Laporan", "page_category" => "report"])
    <div class="container-fluid container-medium">
        
        @if (session("message-success"))
        <div class="alert alert-success">
            {{ session("message-success") }}
        </div>
        @endif
        
        <h1> Laporan </h1>
        <hr/>
        <div class="alert alert-info">
            Laporkan hal di sekitar Anda mengenai perburuan liar, penangkapan, penjualan dan juga konflik antara manusia dan satwa dengan mengisi formulir dibawah ini.
        </div>
        <form method="POST" enctype="multipart/form-data" action="{{ route('report.save') }}">
            <div class="form-group">
                <label class="col-form-label"> Judul: </label>
                <input value="{{ old("title") }}" type="text" name="title" class="form-control {{ $errors->has("title") ? "is-invalid" : "" }}">
                @if ($errors->has("title"))
                <div class="invalid-feedback">
                    {{ $errors->first("title") }}
                </div>
                @endif
                <small class="form-text text-muted"> Contoh: Macan Tutul Masuk Area Pemukiman </small>
                
            </div>
            <div class="form-group">
                <label class="col-form-label"> Keterangan: </label>
                <textarea class="form-control {{ $errors->has("description") ? "is-invalid" : "" }}" name="description">{{ old("description") }}</textarea>
                @if ($errors->has("description"))
                <div class="invalid-feedback">
                    {{ $errors->first("description") }}
                </div>
                @endif
                <small class="form-text text-muted"> Penjelasan mengenai situasi, misalnya kondisi hewan liar terkait, dsb. </small>
            </div>
            <div class="form-group">
                <label class="col-form-label"> Lokasi Kejadian: </label>
                <input type="text" value="{{ old("location") }}" class="form-control {{ $errors->has("location") ? "is-invalid" : "" }}" name="location"/>
                @if ($errors->has("location"))
                <div class="invalid-feedback">
                    {{ $errors->first("location") }}
                </div>
                @endif
                <small class="form-text text-muted"> Contoh: Jl. Sejahtera, Kecamatan Bantar Gebang, Kota Bekasi, Jawa Barat </small>
            </div>
            <div class="form-group">
                <label class="col-form-label"> Tanggal Kejadian: </label>
                <input value="{{ old("date") }}" class="form-control {{ $errors->has("date") ? "is-invalid" : "" }}" type="date" name="date">
                @if ($errors->has("date"))
                <div class="invalid-feedback">
                    {{ $errors->first("date") }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label class="col-form-label"> Bukti Foto: </label>
                <input class="form-control-file {{ $errors->has("image") ? "is-invalid" : "" }}" type="file" accept="img/*" name="image">
                @if ($errors->has('image'))
                <p class="text-danger form-text">
                    {{ $errors->first('image') }}
                </p>
                @endif
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