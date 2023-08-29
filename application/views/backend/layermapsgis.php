
<?php 
$setting = $this->db->get('setting')->row();


?>

<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-body table-responsive">
            <table class="table">
                  <td>
                  <input type="text" name="latNow" value="" class="form-control">      </td>
                  <td>
                  <input type="text" name="lngNow" value="" class="form-control">        </td>
                    <td>
                  <button class="dariSini btn btn-info"><i class="fa fa-map-marker"></i> Mulai dari Posisi Kita</button>
                    </td>
                  </tr>
              </table>
              <div id="map" style="width: 100%; height: 430px;"></div>
              <br>
              <br>
             
            </div>
          </div>
          </div>
        </section>
        
      </div>
<script>
    	//=====MAP=======
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
                    text: "Titik lokasi berhasil diupdate!",
                    icon: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        window.location.reload();
                        $('#proses').waiting('done');
                    })
                $(".bersih").val('');
            },
            error : function (e){
                $.notify("Gagal Simpan", "error");
            }
        });
    });  

    var gruplahan = L.layerGroup();
	var grupirigasi = L.layerGroup();
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
	// ambil titik
	getLocation();
	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else {
	    x.innerHTML = "Geolocation is not supported by this browser.";
	  }
	}

	function showPosition(position) {
	  $("[name=latNow]").val(position.coords.latitude);
	  $("[name=lngNow]").val(position.coords.longitude);
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
				"<a href='<?= base_url('home/detail_lahan/' . $value->id) ?>' class='btn btn-sm btn-default btn-block'>Detail</a>" +
				"</p>");
		});
	<?php } ?>

</script>
