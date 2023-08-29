<?php $this->load->view("backend/atas");
$setting = $this->db->get('setting')->row();
$q = $this->db->query("select * from event where id='$id'");
$row = $q->row();
?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
                <div class="row">
                    
                <div class="card col-lg-5 mr-3">
                <div class="card-body table-responsive">
                    <div class="alert alert-info" role="alert">
                        <strong>Detail event</strong> <?php echo $row->judul ?>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <td>Judul Event</td>
                            <td><?php echo $row->judul ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Mulai</td>
                            <td><?php echo date("d F Y H:s",strtotime($row->mulai)) ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Selesai</td>
                            <td><?php echo date("d F Y H:s",strtotime($row->selesai)) ?></td>
                        </tr>
                        <tr>
                            <td>Lokasi Event</td>
                            <td><?php echo $row->lokasi ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi / Keterangan Event</td>
                            <td><?php echo $row->ket ?></td>
                        </tr>
                        <tr>
                            <td class="table-info"><?php echo $row->lat ?></td>
                            <td class="table-warning"><?php echo $row->lng ?></td>
                        </tr>
                        <tr>
                            <td>Gambar / Foto 1</td>
                            <td>
                                <img src="image/<?php echo $row->gambar ?>" width="250" class="img img-thumbnail img-fluid" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>Gambar / Foto 2</td>
                            <td>
                                <img src="image/<?php echo $row->gambar2 ?>" width="250" class="img img-thumbnail img-fluid" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>Gambar / Foto 3</td>
                            <td>
                                <img src="image/<?php echo $row->gambar3 ?>" width="250" class="img img-thumbnail img-fluid" alt="">
                            </td>
                        </tr>
                    </table>
                </div>
                </div>


                <div class="card col-lg-6">
                <div class="card-body table-responsive">
                    <div class="alert alert-info" role="alert">
                        <strong>Lokasi </strong> <?php echo $row->judul ?>
                    </div>
                    <div id="map" style="width: 100%; height: 1500px;"></div>
                </div>
                </div>
                </div>
            <!--  -->
          </div>
        </section>
        
      </div>


	 <!-- MAP LEAFLET SCRIPTS -->
   <script>
 var curLocation = [0, 0];
			if (curLocation[0] == 0 && curLocation[1] == 0) {
				curLocation = [<?php echo $setting->lat.','.$setting->lng ?>];
			}
  
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
  var marker = L.marker([<?php echo $row->lat ?>, <?php echo $row->lng ?>]).addTo(map)
		.bindPopup('<b>Lokasi Event <?php echo $row->judul ?></b><br />').openPopup();
</script>

      <?php $this->load->view("backend/bawah") ?>