<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$setting = $this->db->get('setting');
$row = $setting->row();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="description" content="<?php echo $row->web; ?>">
	<meta name="author" content="<?php echo $row->web; ?>">
	<meta name="generator" content="<?php echo $row->web; ?>">
  <title><?php echo $row->web ?></title>
 <!-- General CSS Files -->
  <!-- Template CSS -->
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <script src="assets/js/app.min.js"></script>

    <link rel="apple-touch-icon" href="image/<?php echo $row->logo ?>" sizes="180x180">
	<link rel="icon" href="image/<?php echo $row->logo ?>" sizes="32x32" type="image/png">
	<link rel="icon" href="image/<?php echo $row->logo ?>" sizes="16x16" type="image/png">
	<link rel="mask-icon" href="image/<?php echo $row->logo ?>" color="#563d7c">
	<link rel="icon" href="image/<?php echo $row->logo ?>">


	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
	<!-- Leaflet Draw -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
	
  <link rel="stylesheet" href="plugin/MarkerCluster.css" />
	<link rel="stylesheet" href="plugin/MarkerCluster.Default.css" />
	<script src="plugin/leaflet.markercluster-src.js"></script>
  
  <link rel="stylesheet" href="plugin/css/styledLayerControl.css" />
		<script src="plugin/src/styledLayerControl.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<!-- <script src="https://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyBXTXgQ7wZPndgKZilAsFVZjT5YWMr9WFs"></script> -->

<script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
  <!-- end -->
  <link rel="stylesheet" href="plugin/maps.css">
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" href="plugin/dist/Control.MiniMap.min.css" />
	<script src="plugin/dist/Control.MiniMap.min.js" type="text/javascript"></script>
  <!-- <link rel="stylesheet" type="text/css" href="src/leaflet.css"/> -->
<link rel="stylesheet" type="text/css" href="src/L.Control.ZoomBar.css"/>

<!-- <script type="text/javascript" src="src/leaflet.js"></script> -->
<script type="text/javascript" src="src/L.Control.ZoomBar.js"></script>
<script type="text/javascript" src="plugin/dist/Leaflet.Coordinates-0.1.5.min.js"></script>
	<link rel="stylesheet" href="plugin/dist/Leaflet.Coordinates-0.1.5.css"/>
  <link rel="stylesheet" href="plugin/dist/L.Control.Locate.min.css" />
  <script src="plugin/src/L.Control.Locate.js" ></script>
  <script src="plugin/src/leaflet-compass.js"></script>
  <script src='plugin/Leaflet.LocationShare.js'></script>
  <link rel="stylesheet" href="plugin/src/leaflet-compass.css" />
  <script src="plugin/L.Control.Window.js"></script>
     <link rel="stylesheet" href="plugin/L.Control.Window.css" />
     <script src="plugin/dist/Control.FullScreen.js"></script>
     <link rel="stylesheet" href="plugin/dist/Control.FullScreen.css" />
     <script src="plugin/src/Control.GlobeMiniMap.js"></script>
</head>
<body  >
<div id="map"></div>
    <script>

var gruplahan = L.layerGroup();
	var grupirigasi = L.layerGroup();
  
  var map = L.map("map",{
    center : [<?php echo $row->lat.','.$row->lng ?>],
    zoom  : 12,
    zoomControl: false,
    layers:[],
    fullscreenControl: true,
			fullscreenControlOptions: { // optional
				title:"Show me the fullscreen !",
				titleCancel:"Exit fullscreen mode"
			}
  });
  var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',{
    // maxZoom: 12,
    attribution: "<?php echo $row->web ?>"
  }).addTo(map);
  var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 12,
    attribution: '<?php echo $row->web ?>'
  });
  var mapdark = L.tileLayer(
                          "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
                            attribution: "<?php echo $row->web ?>",
                              maxZoom: 18,
                              minZoom: 7,
                              id: "mapbox/dark-v10",
                              tileSize: 512,
                              zoomOffset: -1,
                              accessToken: "pk.eyJ1Ijoic25vd3JleCIsImEiOiJjazhmbTd4cG8wNXN0M2ZzMDFpZGNoaWpmIn0.GgO0rwaNrkc-eqVt6DeM3g",
                          });
var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
  maxZoom: 20,
  subdomains:['mt0','mt1','mt2','mt3'],
  attribution: "<?php echo $row->web ?>",
});

var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3'],
    attribution: "<?php echo $row->web ?>",
});
//minimap
		var osmUrl='https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}';
		var osmAttrib='Map data &copy; OpenStreetMap contributors';
		var osm = new L.TileLayer(osmUrl, {minZoom: 5, maxZoom: 18, attribution: osmAttrib});
		var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13, attribution: osmAttrib });
		var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true }).addTo(map);
    var lc = L.control.locate({
    position: 'topleft',
    strings: {
        title: "Cari lokasi saya"
    }
}).addTo(map);

    //shhow location
    //window
    // Creating window object
   
	
		// detect fullscreen toggling
		map.on('enterFullscreen', function(){
			if(window.console) window.console.log('enterFullscreen');
		});
		map.on('exitFullscreen', function(){
			if(window.console) window.console.log('exitFullscreen');
		});
   ///show kompas
   var comp = new L.Control.Compass({autoActive: true, showDigit:true, position: 'topleft'});

map.addControl(comp);

var north = L.control({position:"bottomleft"});
north.onAdd = function(map){
  var div = L.DomUtil.create("div","info legend");
  div.innerHTML = "<img src='assets/arrow.png' style='width:120px' >";
  return div;
}
north.addTo(map);
  //untuk buat skala
//zommba
var zoom_bar = new L.Control.ZoomBar({position: 'topleft'}).addTo(map);
L.control.coordinates({
			position:"topright",
			decimals:2,
			decimalSeperator:",",
			labelTemplateLat:"Latitude: {y}",
			labelTemplateLng:"Longitude: {x}"
		}).addTo(map);
  L.control.scale({maxWidth : 150,position: 'topright'}).addTo(map);
  //base maps
  var baseMaps = [
    {
      groupName:"Base Maps",
      expanded : true,
      layers : {
        "Satellite" : GoogleSatelliteHybrid,
        "Open Street Map Mapnik" : OpenStreetMap_Mapnik,
        "Open Street Map Dark" : mapdark,
        "Google Street" : googleStreets, 
        "Google Terrain" : googleTerrain 
      }
    }
  ];
  var overlays = [
    {
        groupName:"Lahan Dan Irigasi",
      expanded : true,
      "Lahan": gruplahan,
    "Irigasi": grupirigasi,
      layers : {
          "Group Lahan" : gruplahan,
          "Group Irigasi" : grupirigasi
       }
    }
  ];

  
  var options = {
    contaner_width : "300px",
    group_maxHeight :"80px",
    exclusive : false,
    collapsed : true,
    position : "topright"
  }
  var control = L.Control.styledLayerControl(baseMaps, overlays, options);
  map.addControl(control);
 

  <?php 
  $lahan = $this->db->query("select * from lahan order by id desc");
  foreach ($lahan->result() as $key => $value) { ?>
		var lahan = L.geoJSON(<?= $value->geojson; ?>, {
			style: {
				color: '<?= $value->warna ?>',
				dashArray: '3',
				lineCap: 'butt',
				lineJoin: 'miter',
				fillColor: '<?= $value->warna ?>',
				fillOpacity: 1.0,
			},
		}).addTo(gruplahan);
		lahan.eachLayer(function(layer) {
			layer.bindPopup("<p><img src='<?= base_url('image/' . $value->gambar) ?>' width='280px'><br><br>" +
				"Nama Lahan : <?= $value->lahan ?></br>" +
				"Luas Lahan : <?= $value->luas ?></br>" +
				"Pemilik Lahan : <?= $value->pemilik_lahan ?></br>" +
				"Alamat Pemilik : <?= $value->alamat_pemilik ?></br>" +
				"Isi Lahan : <?= $value->isi ?></br></br>" +
        "<a href='<?= base_url('main/detaillahan/' . $this->secure->encrypt_url($value->id)) ?>' class='text-light btn btn-sm btn-warning'><i class='fa fa-eye'></i> Detail</a>" +

				"</p>");
		});
	<?php } ?>
    <?php 
    $irigasi =  $this->db->query("select * from irigasi ");
    foreach ($irigasi->result() as $key => $value) { ?>
		var irigasi = L.geoJSON(<?= $value->geojson; ?>, {
			style: {
				color: "<?= $value->warna ?>",
				weight: <?= $value->ketebalan ?>,
			},
		}).addTo(grupirigasi);
		irigasi.eachLayer(function(layer) {
			layer.bindPopup("<p><img src='<?= base_url('image/' . $value->gambar) ?>' width='280px'><br><br>" +
				"Nama Irigasi : <?= $value->irigasi ?></br>" +
				"Panjang Jalur : <?= $value->panjang_jalur ?></br>" +
				"Lebar Jalur : <?= $value->lebar?></br>" +
				"<a href='<?= base_url('main/detailirigasi/' . $this->secure->encrypt_url($value->id)) ?>' class='text-light btn btn-sm btn-warning'><i class='fa fa-eye'></i> Detail</a>" +
				"</p>");
		});
	<?php } ?>
    
    </script>
</body>
</html>

