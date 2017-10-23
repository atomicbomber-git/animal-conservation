@extends("shared.base")

@section("title", "Pengguna");

@section("body")
    @include("shared.navbar-admin", ["page" => "Seluruh Pengguna", "page_category" => "user"])
    
    <div class="container-fluid container-medium">
        <h1> Daftar Seluruh Pengguna </h1>
        <hr>

        <table class="table table-striped table-sm">
            <thead class="thead thead-light">
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> Nama Pengguna </th>
                    <th scope="col"> Nama Asli </th>
                    <th scope="col"> E-Mail </th>
                    <th scope="col"> Scan KTP </th>
                    <th scope="col"> Status Verifikasi </th>
                    <th scope="col"> Kendali </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{ $loop->iteration }}. </td>
                        <td> {{ $user->username }}</td>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary btn-view-identity" data-image="{{ route('user.identity_card', $user) }}">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                        <td class="text-center">
                            @if ($user->is_verified)
                                <span class="badge badge-success"> Sudah </span>
                            @else
                                <span class="badge badge-pill badge-dark"> Belum </span>
                            @endif
                        </td>
                        <td>
                            @if ($user->is_verified)
                                <a href="{{ route('user.verify', $user) }}" class="badge badge-danger">
                                    <i class="fa fa-close"></i>
                                    Batalkan Verifikasi
                                </a>
                            @else
                                <a href="{{ route('user.verify', $user) }}" class="badge badge-success">
                                    <i class="fa fa-check"></i>
                                    Verifikasi
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h1> Pengguna yang Belum Diverifikasi </h1>

        <table class="table table-striped table-sm">
            <thead class="thead thead-light">
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> Nama Pengguna </th>
                    <th scope="col"> Nama Asli </th>
                    <th scope="col"> E-Mail </th>
                    <th scope="col"> Scan KTP </th>
                    <th scope="col"> Status Verifikasi </th>
                    <th scope="col"> Kendali </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($verified_users as $user)
                    <tr>
                        <td> {{ $loop->iteration }}. </td>
                        <td> {{ $user->username }}</td>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary btn-view-identity" data-image="{{ route('user.identity_card', $user) }}">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                        <td class="text-center">
                            <span class="badge badge-dark"> Belum </span>
                        </td>
                        <td>
                            <a href="{{ route('user.verify', $user) }}" class="badge badge-success">
                                <i class="fa fa-check"></i>
                                Verifikasi
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>

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