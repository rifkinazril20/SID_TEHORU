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
                    <div class="card-body">
                      <form action="main/updateirigasi/<?php echo $id ?>" enctype="multipart/form-data" id="save" method="post">
                      <div class="form-group">
						<label>Nama Irigasi</label>
						<input type="text" name="nama_irigasi" value="<?php echo $row->irigasi ?>" class="form-control" placeholder="Nama Irigasi">
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Panjang Jalur</label>
								<input type="text" name="panjang_jalur" value="<?php echo $row->panjang_jalur ?>" class="form-control" placeholder="Panjang Jalur">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label>Lebar Jalur</label>
								<input type="text" name="lebar_jalur" value="<?php echo $row->lebar ?>" class="form-control" placeholder="Lebar Jalur">
							</div>
						</div>
					</div>


					<div class="form-group">
						<label>Jalur GeoJSON</label>
						<textarea name="jalur_geojson"  rows="4" class="form-control"><?php echo $row->geojson ?></textarea>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Warna Jalur</label>
								<div class="input-group my-colorpicker2">
									<input type="text" value="<?php echo $row->warna ?>" name="warna" class="form-control">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-square"></i></span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label>Ketebalan</label>
								<select name="ketebalan" class="form-control">
									<option value="">--Pilih--</option>
									<option value="1" <?php if($row->ketebalan == '1') echo 'selected' ?>>1</option>
									<option value="2" <?php if($row->ketebalan == '2') echo 'selected' ?>>2</option>
									<option value="3" <?php if($row->ketebalan == '3') echo 'selected' ?>>3</option>
									<option value="4" <?php if($row->ketebalan == '4') echo 'selected' ?>>4</option>
									<option value="5" <?php if($row->ketebalan == '5') echo 'selected' ?>>5</option>
									<option value="6" <?php if($row->ketebalan == '6') echo 'selected' ?>>6</option>
									<option value="7" <?php if($row->ketebalan == '7') echo 'selected' ?>>7</option>
									<option value="8" <?php if($row->ketebalan == '8') echo 'selected' ?>>8</option>
									<option value="9" <?php if($row->ketebalan == '9') echo 'selected' ?>>9</option>
									<option value="10" <?php if($row->ketebalan == '10') echo 'selected' ?>>10</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Gambar</label>
                        <center>   
                                    <img id="blah" class='img-fluid mb-3' width='280' src="image/<?php echo $row->gambar ?>" alt="your image" /></center>
                              <input type="file"     name="gambar" class="form-control mb-3 bersih"  onchange="readURL(this);"  aria-describedby="inputGroupFileAddon01">
                              <span class="badge badge-warning"><strong>Informasi</strong> Input Gambar Maksimal 2mb !</span> 

					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-warning">Reset</button>
					</div>
                      </form>
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