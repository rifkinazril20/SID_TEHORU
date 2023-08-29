<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$setting = $this->db->get('setting');
$row = $setting->row();
?>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Wilayah Desa</h2>
          <ol>
            <li><a href="home/index">Home</a></li>
            <li>Wilayah Desa</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
      <div class="section-title" data-aos="fade-up">
          <h2>Wilayah Desa <?php echo $row->web ?></h2>
        </div>
      <div class="card">
          
  <div class="card-body">
    <div id="map" style="width: 100%; height: 700px;"></div>
  </div>
</div>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <script>

var gruplahan = L.layerGroup();
	var grupirigasi = L.layerGroup();
  
  var map = L.map("map",{
    center : [<?php echo $row->lat.','.$row->lng ?>],
    zoom  : 8,
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
 
  var polygon = <?php echo $row->wilayah ?>;
    var geojsonLayer = new L.GeoJSON(polygon);
    map.addLayer(geojsonLayer);

    </script>