@extends("shared.admin-base")

@section("title", "Administrasi")

@section("main-content")
    
    <h1> Peta Lokasi Persebaran Penangkaran di Indonesia </h1>
    <hr/>

    @if (session("message-success"))
        <div id="message-success" class="alert alert-success">
            {{ session("message-success") }}
        </div>
    @endif

    <div class="row">
        <div class="col-4">
            <h5> Daftar Lokasi </h5>
            <div class="list-group" style="max-height: 600px; overflow-y: scroll;">
                @foreach ($locations as $location)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col font-weight-weight">
                            {{ $location->name }}
                        </div>
                        <div class="col text-right">
                            <a href="{{ route("map.location.edit", $location) }}" class="btn btn-dark btn-sm">
                                <i class="fa fa-pencil"> </i>
                            </a>
                            <button class="btn btn-dark btn-sm btn-pointer" data-lat="{{ $location->latitude }}" data-lng="{{ $location->longitude
                             }}">
                                <i class="fa fa-map-marker"> </i>
                            </button>
                            <form style="display: inline" action="{{ route("map.location.delete", $location) }}" method="POST">
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>  
                    
                </div>
                @endforeach
            </div>
        </div>
        <div class="col">
            <div id="map" style="border: thin solid black; width: 100%; height: 600px"></div>
        </div>
    </div>

    
    
    <div style="height: 20px"></div>

    <div class="card position-relative">
        <div class="card-header">
            <i class="fa fa-check"></i>
            Tambah Lokasi
        </div>

        <div class="card-body">
            <div class="container">
                <form method="POST" action="{{ route('map.addLocation') }}" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="name"> Nama Lokasi: </label>
                            <input value="{{ old("name") }}" class="form-control form-control-sm {{ $errors->has("name") ? "is-invalid" : "" }}" type="text" name="name" id="name">
                                @if ($errors->has("name"))
                                <div class="invalid-feedback">
                                    {{ $errors->first("name") }}
                                </div>
                                @endif
                        </div>
                        <div class="form-group col-4">
                            <label for="longitude"> Posisi Bujur: </label>
                            <input value="{{ old("longitude") }}" class="form-control form-control-sm {{ $errors->has("longitude") ? "is-invalid" : "" }}" type="text" name="longitude" id="longitude">
                            @if ($errors->has("longitude"))
                            <div class="invalid-feedback">
                                {{ $errors->first("longitude") }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-4">
                            <label for="latitude"> Posisi Lintang: </label>
                            <input value="{{ old("latitude") }}" class="form-control form-control-sm {{ $errors->has("latitude") ? "is-invalid" : "" }}" type="text" name="latitude" id="latitude">
                            @if ($errors->has("latitude"))
                            <div class="invalid-feedback">
                                {{ $errors->first("latitude") }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="address"> Alamat: </label>
                            <textarea class="form-control {{ $errors->has("address") ? "is-invalid" : "" }}" name="address" id="address">{{ old("address") }}</textarea>
                            @if ($errors->has("address"))
                            <div class="invalid-feedback">
                                {{ $errors->first("address") }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description"> Deskripsi: </label>
                            <textarea class="form-control {{ $errors->has("description") ? "is-invalid" : "" }}" name="description" id="description">{{ old("description") }}</textarea>
                                @if ($errors->has("description"))
                                <div class="invalid-feedback">
                                    {{ $errors->first("description") }}
                                </div>
                                @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="image"> Gambar Lokasi: </label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @if ($errors->has("image"))
                            <div class="text-danger">
                                {{ $errors->first("image") }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary">
                            Tambahkan
                            <i class="fa fa-plus"> </i>
                        </button>
                    </div>

                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="locationDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="location-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <dl>
                            <dt> Alamat: </dt>
                            <dd id="location-address"></dd>
                            <dt> Deskripsi: </dt>
                            <dd id="location-description"></dd>
                        </dl>
                        <img id="location-image" src="" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup </button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div>
            </div>
    </div>
@endsection

@section("extra-script")
    <script type="text/javascript">

        var positions = [];

        function initMap() {
            var jakarta = {lat: -6.1751, lng: 106.8650};

            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: jakarta
            });

            var placeIcon = "{{ asset("icons/ic_place_black_36px.svg") }}";
            var currentPlaceIcon = "{{ asset("icons/ic_my_location_black_36px.svg") }}";

            var pointerMarker = new google.maps.Marker({
                map: map,
                position: jakarta,
                icon: currentPlaceIcon,
                animation: google.maps.Animation.DROP,
            });

            map.addListener("click", function(e) {
                pointerMarker.setPosition(e.latLng);
                $("#latitude").val(e.latLng.lat());
                $("#longitude").val(e.latLng.lng());
            });

            $.getJSON("{{ route('map.locations') }}", function(positions) {
                positions.forEach(function(position) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: {lat: position.latitude, lng: position.longitude},
                        icon: placeIcon,
                        animation: google.maps.Animation.DROP
                    });

                    marker.addListener("click", function() {
                        $.getJSON(position.detailUrl, function(data) {
                            $("#location-title").html(data.name);
                            $("#location-address").html(data.address);
                            $("#location-description").html(data.description);
                            $("#location-image").attr("src", data.imageUrl);
                            $("#locationDetailModal").modal("show");
                        });
                    });

                    positions.push({url: "", marker: marker});
                });
            });

            $(".btn-pointer").each(function() {
                var latitude = $(this).data("lat");
                var longitude = $(this).data("lng");

                $(this).click(function() {
                    map.setCenter({lat: latitude, lng: longitude});
                });

            });
        }

        $(document).ready(function() {
            window.setTimeout(function() {
                $("#message-success").fadeOut();
            }, 3000);
        });
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSEZS-P3unkD_iaagcAcv2lslGsh3v4PQ&callback=initMap">
    </script>
@endsection
