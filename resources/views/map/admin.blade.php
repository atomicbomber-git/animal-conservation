@extends("shared.admin-base")

@section("title", "Administrasi")

@section("main-content")
    
    <h1> Peta Lokasi Persebaran </h1>
    <hr/>

    <div class="row">
        <div class="col-3">
            <h5> Daftar Lokasi </h5>
            <div class="list-group" style="max-height: 600px; overflow-y: scroll;">
                @foreach ($locations as $location)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col font-weight-weight">
                            {{ $location->name }}
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-dark btn-sm">
                                <i class="fa fa-list"> </i>
                            </button>
                            <button class="btn btn-dark btn-sm">
                                <i class="fa fa-map-marker"> </i>
                            </button>
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
                            <input class="form-control form-control-sm {{ $errors->has("name") ? "is-invalid" : "" }}" type="text" name="name" id="name">
                        </div>
                        <div class="form-group col-4">
                            <label for="longitude"> Posisi Bujur: </label>
                            <input class="form-control form-control-sm" type="text" name="longitude" id="longitude">
                        </div>
                        <div class="form-group col-4">
                            <label for="latitude"> Posisi Lintang: </label>
                            <input class="form-control form-control-sm" type="text" name="latitude" id="latitude">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description"> Deskripsi: </label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="image"> Gambar Lokasi: </label>
                            <input type="file" class="form-control-file" name="image" id="image">
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
@endsection

@section("extra-script")
    <script type="text/javascript">

        var positions = [];

        function initMap() {
            var uluru = {lat: -6.1751, lng: 106.8650};


            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: uluru
            });

            var pointerMarker = new google.maps.Marker({
                map: map,
                position: uluru
            });

            map.addListener("click", function(e) {
                pointerMarker.setPosition(e.latLng);
                $("#latitude").val(e.latLng.lat());
                $("#longitude").val(e.latLng.lng());
            });

            $.getJSON("{{ route('map.positions') }}", function(positions) {
                positions.forEach(function(position) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: {lat: position.latitude, lng: position.longitude}
                    });
                    positions.push({url: "", marker: marker});
                });
            });

        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSEZS-P3unkD_iaagcAcv2lslGsh3v4PQ&callback=initMap">
    </script>
@endsection