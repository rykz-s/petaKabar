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
    <link rel="stylesheet" href="{{ asset('leaflet/css/style.css')}}">

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- <style>
        #map {
            height: 950px;
            width: 100%;
        }
    </style> -->
</head>

<body>

    <div id="map" style="width: 100%;">
        <button id="refreshButton">
            Scrap!
        </button>
    </div>

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

    var dataApi = {!! json_encode($response) !!}
    console.log(dataApi);

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
        const kabupatens = dataApi.filter(k => k?.kabupaten.toLowerCase() == feature.properties.Kabupaten.toLowerCase())
      let bencana = 0,
          kriminalitas = 0,
          kesehatan = 0,
          ekonomi = 0,
          olahraga = 0,
          kecelakaan = 0;
      kabupatens.forEach(k => {
        if (k.kategori.toLowerCase() == "bencana") {
            bencana += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "kriminalitas") {
            kriminalitas += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "kesehatan") {
            kesehatan += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "ekonomi") {
            ekonomi += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "olahraga") {
            olahraga += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "kecelakaan") {
            kecelakaan += k.tingkat_keparahan;
        }
      })
      return {
        bencana: bencana,
        kriminalitas: kriminalitas,
        kesehatan: kesehatan,
        ekonomi: ekonomi,
        olahraga: olahraga,
        kecelakaan: kecelakaan
      };
    }

    function hitungProvinsi(feature) {
        const provinsis = dataApi.filter(p => p?.provinsi.toLowerCase() == feature.properties.Provinsi.toLowerCase())
      let bencana = 0,
          kriminalitas = 0,
          kesehatan = 0,
          ekonomi = 0,
          olahraga = 0,
          kecelakaan = 0;
      provinsis.forEach(k => {
        if (k.kategori.toLowerCase() == "bencana") {
            bencana += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "kriminalitas") {
            kriminalitas += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "kesehatan") {
            kesehatan += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "ekonomi") {
            ekonomi += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "olahraga") {
            olahraga += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "kecelakaan") {
            kecelakaan += k.tingkat_keparahan;
        }
      })
      return {
        bencana: bencana,
        kriminalitas: kriminalitas,
        kesehatan: kesehatan,
        ekonomi: ekonomi,
        olahraga: olahraga,
        kecelakaan: kecelakaan
      };
    }

    function hitungKecamatan(feature){
      const kecamatans = dataApi.filter(k => k?.kecamatan.toLowerCase() == feature.properties.Kecamatan.toLowerCase())
      let bencana = 0,
          kriminalitas = 0,
          kesehatan = 0,
          ekonomi = 0,
          olahraga = 0,
          kecelakaan = 0;
      kecamatans.forEach(k => {
        if (k.kategori.toLowerCase() == "bencana") {
            bencana += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "kriminalitas") {
            kriminalitas += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "kesehatan") {
            kesehatan += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "ekonomi") {
            ekonomi += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "olahraga") {
            olahraga += k.tingkat_keparahan;
        } else if (k.kategori.toLowerCase() == "kecelakaan") {
            kecelakaan += k.tingkat_keparahan;
        }
      })
      return {
        bencana: bencana,
        kriminalitas: kriminalitas,
        kesehatan: kesehatan,
        ekonomi: ekonomi,
        olahraga: olahraga,
        kecelakaan: kecelakaan
      };
    }

    function onEachFeature3(feature, layer) {
        // hitungKabupaten(feature);
        // hitungProvinsi(feature);
        var kecamatan = hitungKecamatan(feature)
        let popUpText = 'Kecamatan : ' + feature.properties.Kecamatan;
        if (kecamatan.bencana > 0) {
          popUpText += ('<br>Kategori : Bencana' + '<br>Tingkat Keparahan : ' + kecamatan.bencana)
        }
        if (kecamatan.kriminalitas > 0) {
          popUpText += ('<br>Kategori : Kriminalitas' + '<br>Tingkat Keparahan : ' + kecamatan.kriminalitas)
        }
        if (kecamatan.kesehatan > 0) {
          popUpText += ('<br>Kategori : kesehatan' + '<br>Tingkat Keparahan : ' + kecamatan.kesehatan)
        }
        if (kecamatan.ekonomi > 0) {
          popUpText += ('<br>Kategori : ekonomi' + '<br>Tingkat Keparahan : ' + kecamatan.ekonomi)
        }
        if (kecamatan.olahraga > 0) {
          popUpText += ('<br>Kategori : olahraga' + '<br>Tingkat Keparahan : ' + kecamatan.olahraga)
        }
        if (kecamatan.kecelakaan > 0) {
          popUpText += ('<br>Kategori : kecelakaan' + '<br>Tingkat Keparahan : ' + kecamatan.kecelakaan)
        }
        layer.bindPopup(popUpText);
    }

    console.log(geojson3);
    console.log(markersKecamatan);

    function onEachFeature2(feature, layer) {
        var kabupaten = hitungKabupaten(feature)
        let popUpText = 'Kabupaten/Kota : ' + feature.properties.Kabupaten;
        if (kabupaten.bencana > 0) {
          popUpText += ('<br>Kategori : Bencana' + '<br>Tingkat Keparahan : ' + kabupaten.bencana)
        }
        if (kabupaten.kriminalitas > 0) {
          popUpText += ('<br>Kategori : Kriminalitas' + '<br>Tingkat Keparahan : ' + kabupaten.kriminalitas)
        }
        if (kabupaten.kesehatan > 0) {
          popUpText += ('<br>Kategori : kesehatan' + '<br>Tingkat Keparahan : ' + kabupaten.kesehatan)
        }
        if (kabupaten.ekonomi > 0) {
          popUpText += ('<br>Kategori : Ekonomi' + '<br>Tingkat Keparahan : ' + kabupaten.ekonomi)
        }
        if (kabupaten.olahraga > 0) {
          popUpText += ('<br>Kategori : Olahraga' + '<br>Tingkat Keparahan : ' + kabupaten.olahraga)
        }
        if (kabupaten.kecelakaan > 0) {
          popUpText += ('<br>Kategori : Kecelakaan' + '<br>Tingkat Keparahan : ' + kabupaten.kecelakaan)
        }
        layer.bindPopup(popUpText);
    }

    function onEachFeature(feature, layer) {
        var provinsi = hitungProvinsi(feature)
        let popUpText = 'Provinsi : ' + feature.properties.Provinsi;
        if (provinsi.bencana > 0) {
          popUpText += ('<br>Kategori : Bencana' + '<br>Tingkat Keparahan : ' + provinsi.bencana)
        }
        if (provinsi.kriminalitas > 0) {
          popUpText += ('<br>Kategori : Kriminalitas' + '<br>Tingkat Keparahan : ' + provinsi.kriminalitas)
        }
        if (provinsi.kesehatan > 0) {
          popUpText += ('<br>Kategori : kesehatan' + '<br>Tingkat Keparahan : ' + provinsi.kesehatan)
        }
        if (provinsi.ekonomi > 0) {
          popUpText += ('<br>Kategori : Ekonomi' + '<br>Tingkat Keparahan : ' + provinsi.ekonomi)
        }
        if (provinsi.olahraga > 0) {
          popUpText += ('<br>Kategori : Olahraga' + '<br>Tingkat Keparahan : ' + provinsi.olahraga)
        }
        if (provinsi.kecelakaan > 0) {
          popUpText += ('<br>Kategori : Kecelakaan' + '<br>Tingkat Keparahan : ' + provinsi.kecelakaan)
        }
        layer.bindPopup(popUpText);
    }

    map.attributionControl.addAttribution('Tingkat Keparahan &copy; Peta Kabar</a>');
</script>

</html>