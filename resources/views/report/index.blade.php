@extends("shared.admin-base")

@section("title", "Laporan")

@section("main-content")
    <h1> Daftar Laporan Masuk </h1>
    <hr>

    <table class="table table-striped table-sm">
        <thead class="thead thead-dark">
            <tr>
                <th scope="col"> # </th>
                <th scope="col"> Judul </th>
                <th scope="col"> Pelapor </th>
                <th scope="col"> Hari / Tanggal </th>
                <th scope="col"> Lokasi </th>
                <th scope="col"> Detail </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td> {{ $loop->iteration }}. </td>
                    <td> {{ $report->title }} </td>
                    <td> {{ $report->user->name }} </td>
                    <td> {{ $report->formattedDate() }} </td>
                    <td> {{ $report->location }}  </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary btn-view-detail" data-url="{{ route('report.detail', $report) }}">
                            <i class="fa fa-list"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modalTitle" class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="imagePreview" src="" class="img-thumbnail" alt="Responsive image">
                    <p id="imageDescription"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup </button>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 800px"></div>
@endsection

@section("extra-script")
<script>
    $(document).ready(function() {
        $(".btn-view-detail").each(function() {
            $(this).click(function() {
                var detailUrl = $(this).data("url");

                $.getJSON(detailUrl, function (data) {
                    $("#modalTitle").html(data.title);
                    $("#imageDescription").html(data.description);
                    $("#imagePreview").attr("src", data.imageUrl);
                    $("#detailModal").modal("toggle");
                });

            });
        });
    });
</script>
@endsection