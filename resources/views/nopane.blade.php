<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web GIS</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <link rel="stylesheet" href="{{ asset('leaflet/css/MarkerCluster.css')}}">
    <link rel="stylesheet" href="{{ asset('leaflet/css/MarkerCluster.Default.css')}}">
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <style>
        #map {
            height: 950px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="map"></div>
</body>

<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/"></script>
<script type="text/javascript" src="{{ asset('leaflet/js/leaflet.ajax.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('leaflet/js/leaflet.markercluster.js')}}"></script>
<script src="{{ asset('data/data.js')}}"></script>
<!-- <script src="{{ asset('data/kabupaten.js')}}"></script> -->
<script src="{{ asset('data/kabupaten1.js')}}"></script>
<script src="{{ asset('data/kelurahan.js')}}"></script>
<script src="{{ asset('data/provinsi.js')}}"></script>
<script src="{{ asset('data/kabupatenn.js')}}"></script>

<script>
    var map = L.map("map").setView([-7.460517719883772, 112.73071289062499], 6);

    var tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 15,
        minZoom: 6,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    const bencanaP = L.icon({
        iconUrl: "{{ asset('icons/bencana_p.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const bencanaS = L.icon({
        iconUrl: "{{ asset('icons/bencana_s.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const bencanaT = L.icon({
        iconUrl: "{{ asset('icons/bencana_t.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const kriminalP = L.icon({
        iconUrl: "{{ asset('icons/kriminal_p.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const kriminalS = L.icon({
        iconUrl: "{{ asset('icons/kriminal_s.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const kriminalT = L.icon({
        iconUrl: "{{ asset('icons/kriminal_t.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const kesehatanT = L.icon({
        iconUrl: "{{ asset('icons/kesehatan_t.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const kesehatanS = L.icon({
        iconUrl: "{{ asset('icons/kesehatan_s.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const kesehatanP = L.icon({
        iconUrl: "{{ asset('icons/kesehatan_p.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const ekonomiT = L.icon({
        iconUrl: "{{ asset('icons/ekonomi_t.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const ekonomiS = L.icon({
        iconUrl: "{{ asset('icons/ekonomi_s.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const ekonomiP = L.icon({
        iconUrl: "{{ asset('icons/ekonomi_p.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const olahragaT = L.icon({
        iconUrl: "{{ asset('icons/olahraga_t.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const olahragaS = L.icon({
        iconUrl: "{{ asset('icons/olahraga_s.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const olahragaP = L.icon({
        iconUrl: "{{ asset('icons/olahraga_p.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const kecelakaanT = L.icon({
        iconUrl: "{{ asset('icons/kecelakaan_t.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const kecelakaanS = L.icon({
        iconUrl: "{{ asset('icons/kecelakaan_s.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    const kecelakaanP = L.icon({
        iconUrl: "{{ asset('icons/kecelakaan_p.png')}}",
        iconSize: [40, 40], // size of the icon
        iconAnchor: [2, 2], // point of the icon which will correspond to marker's location
        popupAnchor: [0, -2] // point from which the popup should open relative to the iconAnchor
    });

    let kabupaten = [],
        provinsi = [];

    //kecamatan
    var geojson3 = L.geoJson(dataKecamatan, {
        pointToLayer: function(feature, latlng) {
            let icon;
            if (feature.properties.Kategori == "Bencana" && feature.properties.Jumlah < 50) {
                icon = L.marker(latlng, {
                    icon: bencanaT
                });
            } else if (feature.properties.Kategori == "Bencana" && feature.properties.Jumlah > 50 && feature.properties.Jumlah < 100) {
                icon = L.marker(latlng, {
                    icon: bencanaS
                });
            } else if (feature.properties.Kategori == "Bencana" && feature.properties.Jumlah > 100) {
                icon = L.marker(latlng, {
                    icon: bencanaP
                });
            } else if (feature.properties.Kategori == "Kriminalitas" && feature.properties.Jumlah < 50) {
                icon = L.marker(latlng, {
                    icon: kriminalT
                });
            } else if (feature.properties.Kategori == "Kriminalitas" && feature.properties.Jumlah > 50 && feature.properties.Jumlah < 100) {
                icon = L.marker(latlng, {
                    icon: kriminalS
                });
            } else if (feature.properties.Kategori == "Kriminalitas" && feature.properties.Jumlah > 100) {
                icon = L.marker(latlng, {
                    icon: kriminalP
                });
            } else if (feature.properties.Kategori == "Kesehatan" && feature.properties.Jumlah < 50) {
                icon = L.marker(latlng, {
                    icon: kesehatanT
                });
            } else if (feature.properties.Kategori == "Kesehatan" && feature.properties.Jumlah > 50 && feature.properties.Jumlah < 100) {
                icon = L.marker(latlng, {
                    icon: kesehatanS
                });
            } else if (feature.properties.Kategori == "Kesehatan" && feature.properties.Jumlah > 100) {
                icon = L.marker(latlng, {
                    icon: kesehatanP
                });
            } else if (feature.properties.Kategori == "Ekonomi" && feature.properties.Jumlah < 50) {
                icon = L.marker(latlng, {
                    icon: ekonomiT
                });
            } else if (feature.properties.Kategori == "Ekonomi" && feature.properties.Jumlah > 50 && feature.properties.Jumlah < 100) {
                icon = L.marker(latlng, {
                    icon: ekonomiS
                });
            } else if (feature.properties.Kategori == "Ekonomi" && feature.properties.Jumlah > 100) {
                icon = L.marker(latlng, {
                    icon: ekonomiP
                });
            } else if (feature.properties.Kategori == "Olahraga" && feature.properties.Jumlah < 50) {
                icon = L.marker(latlng, {
                    icon: olahragaT
                });
            } else if (feature.properties.Kategori == "Olahraga" && feature.properties.Jumlah > 50 && feature.properties.Jumlah < 100) {
                icon = L.marker(latlng, {
                    icon: olahragaS
                });
            } else if (feature.properties.Kategori == "Olahraga" && feature.properties.Jumlah > 100) {
                icon = L.marker(latlng, {
                    icon: olahragaP
                });
            } else if (feature.properties.Kategori == "Kecelakaan" && feature.properties.Jumlah < 50) {
                icon = L.marker(latlng, {
                    icon: kecelakaanT
                });
            } else if (feature.properties.Kategori == "Kecelakaan" && feature.properties.Jumlah > 50 && feature.properties.Jumlah < 100) {
                icon = L.marker(latlng, {
                    icon: kecelakaanS
                });
            } else if (feature.properties.Kategori == "Kecelakaan" && feature.properties.Jumlah > 100) {
                icon = L.marker(latlng, {
                    icon: kecelakaanP
                });
            }
            return icon
        },
        style: {
            opacity: 0,
            fillOpacity: 0
        },
        onEachFeature: onEachFeature3
    });

    var markersKecamatan = new L.FeatureGroup();
    markersKecamatan.addLayer(geojson3);

    //kabupaten
    var geojson2 = L.geoJson(dataKabupaten, {
        style: {
            opacity: 0,
            fillOpacity: 0
        },
        onEachFeature: onEachFeature2
    });
    var markersKabupaten = new L.FeatureGroup();
    markersKabupaten.addLayer(geojson2);

    //provinsi
    var geojson = L.geoJson(dataProvinsi, {
        style: {
            opacity: 0,
            fillOpacity: 0
        },
        onEachFeature: onEachFeature
    }).addTo(map);
    var markersProvinsi = new L.FeatureGroup();
    markersProvinsi.addLayer(geojson);

    map.on('zoomend', function(e) {
        var zoomLevel = map.getZoom();
        if (zoomLevel > 5 && zoomLevel < 9) {
            map.addLayer(markersProvinsi);
            // console.log("1");
        } else {
            map.removeLayer(markersProvinsi);
            // console.log("2");
        }
        if (zoomLevel > 8 && zoomLevel < 13) {
            map.addLayer(markersKabupaten);
            // console.log("3");
        } else {
            map.removeLayer(markersKabupaten);
            // console.log("4");
        }
        if (zoomLevel > 12) {
            map.addLayer(markersKecamatan);
            // console.log("3");
        } else {
            map.removeLayer(markersKecamatan);
            // console.log("4");
        }
        console.log(zoomLevel);
    });

    function hitungKabupaten(feature) {
        let kategori = feature.properties.Kategori;
        let jumlah = feature.properties.Jumlah;
        if (kabupaten.filter(kab => kab?.name == feature.properties.Kabupaten).length == 0) {
            let bencana = 0,
                kriminalitas = 0,
                kesehatan = 0,
                ekonomi = 0,
                olahraga = 0,
                kecelakaan = 0;
            if (kategori == "Bencana") {
                bencana += jumlah;
            } else if (kategori == "Kriminalitas") {
                kriminalitas += jumlah;
            } else if (kategori == "Kesehatan") {
                kesehatan += jumlah;
            } else if (kategori == "Ekonomi") {
                ekonomi += jumlah;
            } else if (kategori == "Olahraga") {
                olahraga += jumlah;
            } else if (kategori == "Kecelakaan") {
                kecelakaan += jumlah;
            }
            let kab = {
                name: feature.properties.Kabupaten,
                bencana: bencana,
                kriminalitas: kriminalitas,
                kesehatan: kesehatan,
                ekonomi: ekonomi,
                olahraga: olahraga,
                kecelakaan: kecelakaan
            };
            kabupaten.push(kab);
        } else {
            let idx = kabupaten.findIndex(kab => kab.name == feature.properties.Kabupaten);
            if (kategori == "Bencana") {
                kabupaten[idx].bencana += jumlah;
            } else if (kategori == "Kriminalitas") {
                kabupaten[idx].kriminalitas += jumlah;
            } else if (kategori == "Kesehatan") {
                kabupaten[idx].kesehatan += jumlah;
            } else if (kategori == "Ekonomi") {
                kabupaten[idx].ekonomi += jumlah;
            } else if (kategori == "Olahraga") {
                kabupaten[idx].olahraga += jumlah;
            } else if (kategori == "Kecelakaan") {
                kabupaten[idx].kecelakaan += jumlah;
            }
        }
    }

    function hitungProvinsi(feature) {
        let kategori = feature.properties.Kategori;
        let jumlah = feature.properties.Jumlah;
        if (provinsi.filter(prov => prov?.name == feature.properties.Provinsi).length == 0) {
            let bencana = 0,
                kriminalitas = 0,
                kesehatan = 0,
                ekonomi = 0,
                olahraga = 0,
                kecelakaan = 0;
            if (kategori == "Bencana") {
                bencana += jumlah;
            } else if (kategori == "Kriminalitas") {
                kriminalitas += jumlah;
            } else if (kategori == "Kesehatan") {
                kesehatan += jumlah;
            } else if (kategori == "Ekonomi") {
                ekonomi += jumlah;
            } else if (kategori == "Olahraga") {
                olahraga += jumlah;
            } else if (kategori == "Kecelakaan") {
                kecelakaan += jumlah;
            }
            let prov = {
                name: feature.properties.Provinsi,
                bencana: bencana,
                kriminalitas: kriminalitas,
                kesehatan: kesehatan,
                ekonomi: ekonomi,
                olahraga: olahraga,
                kecelakaan: kecelakaan
            };
            provinsi.push(prov);
        } else {
            let idx = provinsi.findIndex(prov => prov.name == feature.properties.Provinsi);
            if (kategori == "Bencana") {
                provinsi[idx].bencana += jumlah;
            } else if (kategori == "Kriminalitas") {
                provinsi[idx].kriminalitas += jumlah;
            } else if (kategori == "Kesehatan") {
                provinsi[idx].kesehatan += jumlah;
            } else if (kategori == "Ekonomi") {
                provinsi[idx].ekonomi += jumlah;
            } else if (kategori == "Olahraga") {
                provinsi[idx].olahraga += jumlah;
            } else if (kategori == "Kecelakaan") {
                provinsi[idx].kecelakaan += jumlah;
            }
        }
    }

    function onEachFeature3(feature, layer) {
        hitungKabupaten(feature);
        hitungProvinsi(feature);
        layer.bindPopup('Kecamatan : ' + feature.properties.Kecamatan + '<br>Kategori : ' + feature.properties.Kategori + '<br>Jumlah : ' + feature.properties.Jumlah);
    }

    console.log(geojson3);
    console.log(markersKecamatan);

    function onEachFeature2(feature, layer) {
        const kab = kabupaten.filter(k => k?.name == feature.properties.Kabupaten)[0];
        let bencana = 0,
            kriminalitas = 0,
            kesehatan = 0,
            ekonomi = 0,
            olahraga = 0,
            kecelakaan = 0;
        if (kab) {
            bencana = kab.bencana;
            kriminalitas = kab.kriminalitas;
            kesehatan = kab.kesehatan;
            ekonomi = kab.ekonomi;
            olahraga = kab.olahraga;
            kecelakaan = kab.kecelakaan;
        }
        layer.bindPopup('Kabupaten : ' + feature.properties.Kabupaten + '<br>Bencana : ' + kab.bencana + '<br>Kriminalitas : ' + kab.kriminalitas + '<br>Kesehatan : ' +
            kab.kesehatan + '<br>Ekonomi : ' + kab.ekonomi + '<br>Olahraga : ' + kab.olahraga + '<br>Kecelakaan : ' + kab.kecelakaan);
    }

    function onEachFeature(feature, layer) {
        const prov = provinsi.filter(p => p?.name == feature.properties.Provinsi)[0];
        let bencana = 0,
            kriminalitas = 0,
            kesehatan = 0,
            ekonomi = 0,
            olahraga = 0,
            kecelakaan = 0;
        if (prov) {
            bencana = prov.bencana;
            kriminalitas = prov.kriminalitas;
            kesehatan = prov.kesehatan;
            ekonomi = prov.ekonomi;
            olahraga = prov.olahraga;
            kecelakaan = prov.kecelakaan;
        }
        layer.bindPopup('Provinsi : ' + feature.properties.Provinsi + '<br>Bencana : ' + prov.bencana + '<br>Kriminalitas : ' + prov.kriminalitas + '<br>Kesehatan : ' +
            prov.kesehatan + '<br>Ekonomi : ' + prov.ekonomi + '<br>Olahraga : ' + prov.olahraga + '<br>Kecelakaan : ' + prov.kecelakaan);
    }

    map.attributionControl.addAttribution('Tingkat Keparahan &copy; Peta Kabar</a>');
</script>

</html>