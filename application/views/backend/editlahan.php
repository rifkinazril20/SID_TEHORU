<?php 
    $q = $this->db->query("select * from lahan where id='$id'");
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
                      <form action="main/updatelahan/<?php echo $id; ?>" enctype="multipart/form-data" id="save" method="post">
                      <div class="form-group">
						<label>Nama Lahan</label>
						<input type="text" name="nama_lahan" value="<?php echo $row->lahan ?>" class="form-control" placeholder="Nama Lahan">
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Luas Lahan</label>
								<input type="text" name="luas_lahan" <?php echo $row->luas ?> class="form-control" placeholder="Luas Lahan">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label>Isi Lahan</label>
								<select name="isi_lahan" class="form-control">
									<option value="Padi" <?php if($row->isi == 'Padi') echo 'selected'; ?>>Padi</option>
									<option value="Jagung" <?php if($row->isi == 'Jagung') echo 'selected'; ?>>Jagung</option>
									<option value="Cabe" <?php if($row->isi == 'Cabe') echo 'selected'; ?>>Cabe</option>
									<option value="Sawit" <?php if($row->isi == 'Sawit') echo 'selected'; ?>>Sawit</option>
									<option value="Kelapa" <?php if($row->isi == 'Kelapa') echo 'selected'; ?>>Kelapa</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Pemilik Lahan</label>
						<input type="text" name="pemilik_lahan" value="<?php echo $row->pemilik_lahan ?>" class="form-control" placeholder="Pemilik Lahan">
					</div>

					<div class="form-group">
						<label>Alamat Pemilik</label>
						<input type="text" name="alamat_pemilik" value="<?php echo $row->alamat_pemilik ?>"  class="form-control" placeholder="Alamat Pemilik">
					</div>

					<div class="form-group">
						<label>Denah GeoJSON</label>
						<textarea name="denah_geojson" rows="4" class="form-control"><?php echo $row->geojson ?></textarea>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Warna Denah</label>
								<div class="input-group my-colorpicker2">
									<input type="text" autocomplete="off" value="<?php echo $row->warna ?>" name="warna" class="form-control">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-square"></i></span>
									</div>
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
    maxZoom: 19,
    attribution: '<?php echo $setting->web ?>'
  });
  var mapdark = L.tileLayer(
                          "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
                              attribution: "Copyleft &copy; <?php echo $setting->web ?>",
                      
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
  var overlays = [
    {
    groupName:"Peta Besar",
      expanded : true,
      layers : { }
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
 


	// FeatureGroup is to store editable layers
    var drawnItems = new L.geoJSON(<?= $row->geojson ?>);
	var drawnItems;
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
		$("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
	});

	//edit draww
	map.on('draw:edited', function(e) {
		$("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
	});

	//delete draw
	map.on('draw:deleted', function(e) {
		$("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
	});
    $(function() {
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        })
</script>