<?php
    $setting = $this->db->get('setting')->row();
?>
<!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->

               
                <div class="card mr-3 col-lg-12">
                    <div class="card-header bg-blue">
                        
                    </div>
                    <div class="card-body">
                    <div id="map" style="width: 100%; height: 400px;"></div>
                    </div>
                    </div>
                    <div class="card col-lg-12">
                    <div class="card-header bg-blue">
                    
                    </div>
                    <div class="card-body">
                      <form action="main/updatewilayah" enctype="multipart/form-data" id="save" method="post">
                      


					<div class="form-group">
						<label>Jalur GeoJSON</label>
						<textarea name="geo" placeholder="Titik ke maps agar mendapatkan luas wilayah..." rows="4" class="form-control"><?php echo $setting->wilayah ?></textarea>
					</div>


					<div class="form-group">
						<button type="submit" class="btn btn-primary w-100">Simpan</button>
					</div>
                      </form>
                    </div>
                    </div>

          </div>
        </section>
     
      </div>
     
<script>
     $("#save").on("submit",function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function (response) {
                Swal.fire({
                    title: "Informasi",
                    text: "Berhasil setting wilayah desa!",
                    icon: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        window.location.reload();
                    })
            },
            error : function (e){
               alert("Ada kesalahan sistem");
            }
        });
    });
        
        var map = L.map("map",{
    center : [<?php echo $setting->lat.','.$setting->lng ?>],
    zoom  : 8,
    layers:[]
  });
  var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',{
    // maxZoom: 12,
    attribution: "<?php echo $setting->web ?>"
  }).addTo(map);
  var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 12,
    attribution: '<?php echo $setting->web ?>'
  });
  var mapdark = L.tileLayer(
                          "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
                            attribution: "<?php echo $setting->web ?>",
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
  attribution: "<?php echo $setting->web ?>",
});

var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3'],
    attribution: "<?php echo $setting->web ?>",
});
  L.control.scale({maxWidth : 150}).addTo(map);

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
 

  
  var options = {
    contaner_width : "300px",
    group_maxHeight :"80px",
    exclusive : false,
    collapsed : true,
    position : "topright"
  }
  var control = L.Control.styledLayerControl(baseMaps, options);
  map.addControl(control);
 



	// FeatureGroup is to store editable layers
    var drawnItems = new L.geoJSON(<?= $setting->wilayah ?>);
	map.addLayer(drawnItems);
	var drawControl = new L.Control.Draw({
		draw: {
			polygon: true,
			marker: false,
			circle: false,
			circlemarker: false,
			rectangle: false,
			polyline: false,
		},
		edit: {
			featureGroup: drawnItems
		}
	});
	map.addControl(drawControl);

	//membuat draw
	map.on('draw:created', function(event) {
		var layer = event.layer;
		var feature = layer.feature = layer.feature || {};
		feature.type = feature.type || "Feature";
		var props = feature.properties = feature.properties || {};
		drawnItems.addLayer(layer);
		$("[name=geo]").html(JSON.stringify(drawnItems.toGeoJSON()));
	});

	//edit draww
	map.on('draw:edited', function(e) {
		$("[name=geo]").html(JSON.stringify(drawnItems.toGeoJSON()));
	});

	//delete draw
	map.on('draw:deleted', function(e) {
		$("[name=geo]").html(JSON.stringify(drawnItems.toGeoJSON()));
	});
 
</script>