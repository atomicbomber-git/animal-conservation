@extends("shared.admin-base")

@section("title", "Pengguna")

@section("main-content")
    <h1> Daftar Seluruh Pengguna </h1>
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
            @foreach ($users as $user)
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Tampilan Hasil Scan KTP </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="imagePreview" src="{{ route('user.identity_card', $user) }}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("extra-script")
<script>
    $(document).ready(function() {
        $(".btn-view-identity").each(function() {
            var imageUrl = $(this).data("image");
            $(this).click(function() {
                $("#imagePreview").attr("src", imageUrl);
                $("#imagePreviewModal").modal("toggle");
            });
        });
    });
</script>
@endsection