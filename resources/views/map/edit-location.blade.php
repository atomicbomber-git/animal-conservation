@extends("shared.admin-base")

@section("title", "Administrasi")

@section("main-content")
    
    <h1> Sunting Lokasi </h1>
    <hr/>

    @if (session("message-success"))
        <div id="message-success" class="alert alert-success">
            {{ session("message-success") }}
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div id="map" style="border: thin solid black; width: 100%; height: 600px"></div>
        </div>
        <div class="col">
            <div class="card position">
                <div class="card-header">
                    <i class="fa fa-check"></i>
                    Sunting Lokasi
                </div>

                <div class="card-body" style="">
                    <div class="container">
                        <form method="POST" action="{{ route('map.location.update', $location) }}" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="name"> Nama Lokasi: </label>
                                    <input value="{{ old("name") ?: $location->name }}" class="form-control form-control-sm {{ $errors->has("name") ? "is-invalid" : "" }}" type="text" name="name" id="name">
                                        @if ($errors->has("name"))
                                        <div class="invalid-feedback">
                                            {{ $errors->first("name") }}
                                        </div>
                                        @endif
                                </div>
                                <div class="form-group col-4">
                                    <label for="longitude"> Posisi Bujur: </label>
                                    <input value="{{ old("longitude") ?: $location->longitude }}" class="form-control form-control-sm {{ $errors->has("longitude") ? "is-invalid" : "" }}" type="text" name="longitude" id="longitude">
                                    @if ($errors->has("longitude"))
                                    <div class="invalid-feedback">
                                        {{ $errors->first("longitude") }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group col-4">
                                    <label for="latitude"> Posisi Lintang: </label>
                                    <input value="{{ old("latitude") ?: $location->latitude }}" class="form-control form-control-sm {{ $errors->has("latitude") ? "is-invalid" : "" }}" type="text" name="latitude" id="latitude">
                                    @if ($errors->has("latitude"))
                                    <div class="invalid-feedback">
                                        {{ $errors->first("latitude") }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="address"> Alamat: </label>
                                    <textarea class="form-control {{ $errors->has("address") ? "is-invalid" : "" }}" name="address" id="address">{{ old("address") ?: $location->address }}</textarea>
                                    @if ($errors->has("address"))
                                    <div class="invalid-feedback">
                                        {{ $errors->first("address") }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="description"> Deskripsi: </label>
                                    <textarea class="form-control {{ $errors->has("description") ? "is-invalid" : "" }}" name="description" id="description">{{ old("description") ?: $location->description }}</textarea>
                                        @if ($errors->has("description"))
                                        <div class="invalid-feedback">
                                            {{ $errors->first("description") }}
                                        </div>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <h5> Gambar Lokasi Sekarang:</h5>
                                    <div style="text-align: center; background: gray">
                                        <img style="max-width: 300px" src="{{ route('map.location.image', $location) }}" class="img-fluid" alt="Gambar Lama Lokasi">
                                    </div>
                                </div>

                                <div class="alert alert-warning">
                                    Biarkan kolom dibawah ini kosong seandainya Anda tidak ingin memperbaharui gambar.
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
                                    Setujui Perubahan
                                    <i class="fa fa-check"> </i>
                                </button>
                            </div>

                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 20px"></div>
@endsection

@section("extra-script")
    <script type="text/javascript">

        var positions = [];

        function initMap() {
            var currentPlace = {lat: {{ $location->latitude }}, lng: {{ $location->longitude }} };

            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: currentPlace
            });

            var placeIcon = "{{ asset("icons/ic_place_black_36px.svg") }}";
            var currentPlaceIcon = "{{ asset("icons/ic_my_location_black_36px.svg") }}";

            var pointerMarker = new google.maps.Marker({
                map: map,
                icon: currentPlaceIcon
            });

            var currentPlaceMarker = new google.maps.Marker({
                map: map,
                position: currentPlace,
                icon: placeIcon
            });

            map.addListener("click", function(e) {
                pointerMarker.setPosition(e.latLng);
                $("#latitude").val(e.latLng.lat());
                $("#longitude").val(e.latLng.lng());
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
