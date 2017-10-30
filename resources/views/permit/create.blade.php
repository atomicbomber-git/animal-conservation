@extends("shared.base")

@section("title", "Perizinan Hewan")

@section("body")
    @include("shared.navbar")

    <div class="container-fluid container-medium">

        @if (session("message-success"))
        <div class="alert alert-success">
            {{ session("message-success") }}
        </div>
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('permit.save') }}">
            <h1> Pengajuan Izin Penangkaran Hewan </h1>
            <hr/>

            <div class="alert alert-info">
                Disini Anda dapat mengajukan proposal ke BKSDA untuk melakukan penangkaran terhadap hewan yang bertstatus dilindungi.
            </div>

            <div class="form-group">
                <label class="col-form-label"> Jenis / Spesies Hewan: </label>
                <input value="{{ old("species") }}" type="text" name="species" class="form-control {{ $errors->has("species") ? "is-invalid" : "" }}" />
                @if ($errors->has("species"))
                <div class="invalid-feedback">
                    {{ $errors->first("species") }}
                </div>
                @endif
            </div>

            <div style="height: 40px"></div>

            <h5> Data Indukan Jantan </h5>
            <hr/>

            <div class="form-group">
                <label class="col-form-label"> Nama Indukan Jantan: </label>
                <input value="{{ old("father_name") }}" type="text" name="father_name" class="form-control {{ $errors->has("father_name") ? "is-invalid" : "" }}" />
                @if ($errors->has("father_name"))
                <div class="invalid-feedback">
                    {{ $errors->first("father_name") }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="col-form-label"> No Sertifikat: </label>
                <input value="{{ old("father_certificate_code") }}" type="text" name="father_certificate_code" class="form-control {{ $errors->has("father_certificate_code") ? "is-invalid" : "" }}" />
                @if ($errors->has("father_certificate_code"))
                <div class="invalid-feedback">
                    {{ $errors->first("father_certificate_code") }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-form-label"> Tempat Lahir: </label>
                        <input type="text" value="{{ old("father_birthplace") }}" name="father_birthplace" class="form-control {{ $errors->has("father_birthplace") ? "is-invalid" : "" }}" />
                        @if ($errors->has("father_birthplace"))
                        <div class="invalid-feedback">
                            {{ $errors->first("father_birthplace") }}
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label"> Tanggal Lahir: </label>
                        <input type="date" value="{{ old("father_birthdate") }}" name="father_birthdate" class="form-control {{ $errors->has("father_birthdate") ? "is-invalid" : "" }}" />
                        @if ($errors->has("father_birthdate"))
                        <div class="invalid-feedback">
                            {{ $errors->first("father_birthdate") }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label"> Generasi (F): </label>
                <input value="{{ old("father_generation") }}" type="number" min="0" name="father_generation" class="form-control {{ $errors->has("father_generation") ? "is-invalid" : "" }}" />
                @if ($errors->has("father_generation"))
                <div class="invalid-feedback">
                    {{ $errors->first("father_generation") }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="col-form-label"> Sertifikat Indukan Jantan: </label>
                <input type="file" name="father_certificate_image" class="form-control-file {{ $errors->has("father_certificate_image") ? "is-invalid" : "" }}" />
                @if ($errors->has('father_certificate_image'))
                <p class="text-danger form-text">
                    {{ $errors->first('father_certificate_image') }}
                </p>
                @endif
                <small class="form-text text-muted"> Gambar hasil scan sertifikat dalam format jpg, jpeg, atau png </small>
            </div>

            <div style="height: 40px"></div>

            <h5> Data Indukan Betina </h5>
            <hr/>

            <div class="form-group">
                <label class="col-form-label"> Nama Indukan Betina: </label>
                <input type="text" name="mother_name" value="{{ old("mother_name") }}" class="form-control {{ $errors->has("mother_name") ? "is-invalid" : "" }}" />
                @if ($errors->has("mother_name"))
                <div class="invalid-feedback">
                    {{ $errors->first("mother_name") }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="col-form-label"> No Sertifikat: </label>
                <input type="text" name="mother_certificate_code" value="{{ old("mother_certificate_code") }}" class="form-control {{ $errors->has("mother_certificate_code") ? "is-invalid" : "" }}" />
                @if ($errors->has("mother_certificate_code"))
                <div class="invalid-feedback">
                    {{ $errors->first("mother_certificate_code") }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-form-label"> Tempat Lahir: </label>
                        <input type="text" name="mother_birthplace" value="{{ old("mother_birthplace") }}" class="form-control {{ $errors->has("mother_birthplace") ? "is-invalid" : "" }}" />
                        @if ($errors->has("mother_birthplace"))
                        <div class="invalid-feedback">
                            {{ $errors->first("mother_birthplace") }}
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label"> Tanggal Lahir: </label>
                        <input type="date" name="mother_birthdate" value="{{ old("mother_birthdate") }}" class="form-control {{ $errors->has("mother_birthdate") ? "is-invalid" : "" }}" />
                        @if ($errors->has("mother_birthdate"))
                        <div class="invalid-feedback">
                            {{ $errors->first("mother_birthdate") }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label"> Generasi (F): </label>
                <input value="{{ old("mother_generation") }}" type="number" min="0" name="mother_generation" class="form-control {{ $errors->has("mother_generation") ? "is-invalid" : "" }}" />
                @if ($errors->has("mother_generation"))
                <div class="invalid-feedback">
                    {{ $errors->first("mother_generation") }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="col-form-label"> Sertifikat Indukan Jantan: </label>
                <input type="file" name="mother_certificate_image" class="form-control-file {{ $errors->has("mother_certificate_image") ? "is-invalid" : "" }}" />
                @if ($errors->has('mother_certificate_image'))
                <p class="text-danger form-text">
                    {{ $errors->first('mother_certificate_image') }}
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