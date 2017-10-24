@extends("shared.admin-base")

@section("title", "Pengguna")

@section("main-content")
    <h1> Daftar Pengajuan Izin Penangkaran </h1>
    <hr>

    <table class="table table-striped table-sm">
        <thead class="thead thead-light">
            <tr>
                <th scope="col"> # </th>
                <th scope="col"> Pengaju </th>
                <th scope="col"> Spesies </th>
                <th scope="col"> Indukan </th>
                <th scope="col"> Berkas </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permits as $permit)
            <tr>
                <td> {{ $loop->iteration }}. </td>
                <td> {{ $permit->user->name }} </td>
                <td> {{ $permit->species }} </td>
                <td>
                    <button class="btn btn-small btn-info btn-view-parent" data-url="{{ route('permit.father', $permit) }}">
                        <i class="fa fa-mars"></i>
                        Jantan
                    </button> 
                    <button class="btn btn-small btn-info btn-view-parent" data-url="{{ route('permit.mother', $permit) }}">
                        <i class="fa fa-venus"></i>
                        Betina
                    </button>
                </td>
                <td>
                    <a href="{{ route('permit.proposal', $permit) }}" class="btn btn-dark btn-small">
                        <i class="fa fa-file-pdf-o"></i>
                        Proposal
                    </a>
                    <button class="btn btn-dark btn-small btn-view-reference" data-url="{{ route('permit.reference', $permit) }}">
                        <i class="fa fa-eye"></i>
                        SK Kecamatan
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="parentPreviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Data Indukan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl>
                        <dt> Nama: </dt>
                        <dd id="parent-name"> </dd>
                        <dt> Tempat, Tanggal Lahir: </dt>
                        <dd id="parent-birthinfo">  </dd>
                        <dt> Kode Sertifikat: </dt>
                        <dd id="parent-cert-code">  </dd>
                        <dt> Generasi: </dt>
                        <dd id="parent-generatiion">  </dd>
                    </dl>

                    <img id="certificateImage" src="" class="img-fluid" alt="Responsive image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="previewReferenceModal" tabindex="-1" role="dialog" aria-labelledby="previewReferenceModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewReferenceModal"> SK Kecamatan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="referenceImage" src="#" class="img-fluid" alt="Responsive image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("extra-script")
<script>
    $(document).ready(function() {
        $(".btn-view-parent").each(function() {
            $(this).click(function() {
                var parentUrl = $(this).data("url");
                $.getJSON(parentUrl, function(data) {
                    $("#certificateImage").attr("src", data.certificateImageUrl);
                    $("#parent-name").html(data.name);
                    $("#parent-birthinfo").html(data.birthplace + ", " + data.birthdate);
                    $("#parent-cert-code").html(data.certificateCode);
                    $("#parent-generatiion").html(data.generation);
                    $("#parentPreviewModal").modal("toggle");
                });

            });
        });

        $(".btn-view-reference").each(function() {
            $(this).click(function() {
                var referenceUrl = $(this).data("url");
                $("#referenceImage").attr("src", referenceUrl);
                $("#previewReferenceModal").modal("toggle");
            });
        });
    });
</script>
@endsection