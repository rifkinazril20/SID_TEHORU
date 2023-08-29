<?php 
    $q = $this->db->query("select * from irigasi where id='$id'");
    $row = $q->row();
    $setting = $this->db->get('setting')->row();

 ?>
 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->

                <div class="row">
                <div class="card mr-3 col-lg-6">
                    <div class="card-header bg-blue">
                        
                    </div>
                    <div class="card-body">
                    <div id="map" style="width: 100%; height: 600px;"></div>
                    </div>
                    </div>
                    <div class="card col-lg-5">
                    <div class="card-header bg-blue">
                    
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <tr>    
                                <td>Nama Irigasi</td>
                                <td>
                                    <?php echo $row->irigasi ?>
                                </td>
                                
                            </tr>
                            <tr>
                            <td>Panjang Jalur</td>
                                <td>
                                    <?php echo $row->panjang_jalur ?>
                                </td>
                            </tr>
                            <tr>
                            <td>Lebar </td>
                                <td>
                                    <?php echo $row->lebar ?>
                                </td>
                            </tr>
                            <tr>    
                                <td>Ketebalan</td>
                                <td>
                                    <?php echo $row->ketebalan ?>
                                </td>
                                
                            </tr>
                            <tr>
                            <td>Warna</td>
                                <td>
                                    <?php echo $row->warna ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Foto / Gambar</td>
                                <td>
                                    <img src="image/<?php echo $row->gambar ?>" alt="" class="img img-fluid img-thumbnail">
                                </td>
                            </tr>
                        </table>
                    </div>
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
                    text: "Data berhasil disimpan!",
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
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        var map = L.map("map",{
    center : [<?php echo $setting->lat.','.$setting->lng ?>],
    zoom  : 12,
    layers:[]
  });
  var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',{
    maxZoom: 12,
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
  //untuk buat skala
  var g_roadmap = new L.Google("ROADMAP");
  var g_satellite = new L.Google("SATELLITE");
  var g_terrain = new L.Google("TERRAIN");

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
        "Google Satellite"  : g_satellite,
        "Road Map"    : g_roadmap,
        "Terreno" : g_terrain 
      }
    }
  ];
//   var overlays = [
//     {
//         groupName:"Lahan Dan Irigasi",
//       expanded : true,
//       layers : {
        
//        }
//     }
//   ];
  
  
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
	var drawnItems = new L.geoJSON(<?= $row->geojson ?>);
	map.addLayer(drawnItems);
	var drawControl = new L.Control.Draw({
		draw: {
			polygon: false,
			marker: false,
			circle: false,
			circlemarker: false,
			rectangle: false,
			polyline: true,
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
		$("[name=jalur_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
	});

	//edit draw
	map.on('draw:edited', function(e) {
		$("[name=jalur_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
	});

	//delete draw
	map.on('draw:deleted', function(e) {
		$("[name=jalur_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
	});

	map.fitBounds(drawnItems.getBounds());
    $(function() {
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        })
</script>