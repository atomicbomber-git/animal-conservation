@extends("shared.base")

@section("title", "Perizinan Tumbuhan")

@section("body")
    @include("shared.navbar")

    <div class="container-fluid container-medium">

        @if (session("message-success"))
        <div class="alert alert-success">
            {{ session("message-success") }}
        </div>
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('plant_permit.save') }}">
            <h1> Pengajuan Izin Penangkaran Tumbuhan </h1>
            <hr/>

            <div class="alert alert-info">
                Disini Anda dapat mengajukan proposal ke BKSDA untuk melakukan penangkaran terhadap tumbuhan yang bertstatus dilindungi.
            </div>

            <div class="form-group">
                <label class="col-form-label"> Jenis / Spesies Tumbuhan: </label>
                <input value="{{ old("species") }}" type="text" name="species" class="form-control {{ $errors->has("species") ? "is-invalid" : "" }}" />
                @if ($errors->has("species"))
                <div class="invalid-feedback">
                    {{ $errors->first("species") }}
                </div>
                @endif
            </div>

            <div style="height: 40px"></div>

            <h5> Data Indukan </h5>
            <hr/>

            <div class="form-group">
                <label class="col-form-label"> Nama: </label>
                <input value="{{ old("parent_name") }}" type="text" name="parent_name" class="form-control {{ $errors->has("parent_name") ? "is-invalid" : "" }}" />
                @if ($errors->has("parent_name"))
                <div class="invalid-feedback">
                    {{ $errors->first("parent_name") }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="col-form-label"> No Sertifikat: </label>
                <input value="{{ old("parent_certificate_code") }}" type="text" name="parent_certificate_code" class="form-control {{ $errors->has("parent_certificate_code") ? "is-invalid" : "" }}" />
                @if ($errors->has("parent_certificate_code"))
                <div class="invalid-feedback">
                    {{ $errors->first("parent_certificate_code") }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-form-label"> Tempat Penangkaran: </label>
                        <input type="text" value="{{ old("parent_birthplace") }}" name="parent_birthplace" class="form-control {{ $errors->has("parent_birthplace") ? "is-invalid" : "" }}" />
                        @if ($errors->has("parent_birthplace"))
                        <div class="invalid-feedback">
                            {{ $errors->first("parent_birthplace") }}
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label"> Tanggal Perkembangbiakan: </label>
                        <input type="date" value="{{ old("parent_birthdate") }}" name="parent_birthdate" class="form-control {{ $errors->has("parent_birthdate") ? "is-invalid" : "" }}" />
                        @if ($errors->has("parent_birthdate"))
                        <div class="invalid-feedback">
                            {{ $errors->first("parent_birthdate") }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label"> Generasi (F): </label>
                <input value="{{ old("parent_generation") }}" type="number" min="0" name="parent_generation" class="form-control {{ $errors->has("parent_generation") ? "is-invalid" : "" }}" />
                @if ($errors->has("parent_generation"))
                <div class="invalid-feedback">
                    {{ $errors->first("parent_generation") }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="col-form-label"> Sertifikat Indukan Tumbuhan: </label>
                <input type="file" name="parent_certificate_image" class="form-control-file {{ $errors->has("parent_certificate_image") ? "is-invalid" : "" }}" />
                @if ($errors->has('parent_certificate_image'))
                <p class="text-danger form-text">
                    {{ $errors->first('parent_certificate_image') }}
                </p>
                @endif
                <small class="form-text text-muted"> Gambar hasil scan sertifikat dalam format jpg, jpeg, atau png </small>
            </div>

            <div style="height: 40px"></div>

            <div class="form-group">
                <label class="col-form-label"> Proposal Penangkaran: </label>
                <input type="file" name="proposal_document" class="form-control-file {{ $errors->has("proposal_document") ? "is-invalid" : "" }}" />
                @if ($errors->has('proposal_document'))
                <p class="text-danger form-text">
                    {{ $errors->first('proposal_document') }}
                </p>
                @endif
                <small class="form-text text-muted"> Dokumen proposal penangkaran dalam format pdf </small>
            </div>

            <div class="form-group">
                <label class="col-form-label"> SK Kecamatan: </label>
                <input type="file" name="reference_image" class="form-control-file {{ $errors->has("reference_image") ? "is-invalid" : "" }}" />
                @if ($errors->has('reference_image'))
                <p class="text-danger form-text">
                    {{ $errors->first('reference_image') }}
                </p>
                @endif
                <small class="form-text text-muted"> Hasil scan SK Kecamatan dalam format jpg, jpeg, atau png </small>
            </div>

            <div style="height: 40px"></div>

            <div class="alert alert-info">
                Dengan mengajukan formulir ini, saya telah membaca dan memahami isi dari PP no 7 tahun 1999.
            </div>

            <div class="text-right">
                <button class="btn btn-primary">
                    Setujui dan Ajukan
                    <i class="fa fa-check"></i>
                </button>
            </div>
            {{ csrf_field() }}
        </form>

        <div style="height: 50px"></div>

    </div>
@endsection