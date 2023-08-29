<?php $this->load->view("backend/atas");
$setting = $this->db->get('setting')->row();
// $row = $q->row();
?>


<?php 
$setting = $this->db->get('setting')->row();
$q = $this->db->query("select produk_warga.*,admin.nama from produk_warga inner join admin on admin.id = produk_warga.iduser where produk_warga.id='$id'");
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
                        <strong>Detail Produk Warga</strong> <?php echo $row->produk.'-'.$row->pemilik ?>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <td>Nama Produk</td>
                            <td><?php echo $row->produk ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td> Rp. <?php echo number_format($row->harga,0,',','.') ?></td>
                        </tr>
                        <tr>
                            <td>No. Telepon Pemilik</td>
                            <td><?php echo $row->telppemilik ?></td>
                        </tr>
                        <tr>
                            <td>Views</td>
                            <td><?php echo $row->view ?> View</td>
                        </tr>
                        <tr>
                            <td>Deskripsi / Keterangan</td>
                            <td><?php echo $row->ket ?></td>
                        </tr>
                        <tr>
                            <td class="table-info"><?php echo $row->lat ?></td>
                            <td class="table-warning"><?php echo $row->lng ?></td>
                        </tr>
                        <tr>
                            <td>Gambar</td>
                            <td>
                                <img src="image/<?php echo $row->gambar ?>" width="250" class="img img-thumbnail img-fluid" alt="">
                            </td>
                        </tr>
                    </table>
                </div>
                </div>


                <div class="card col-lg-6">
                <div class="card-body table-responsive">
                    <div class="alert alert-info" role="alert">
                    <strong>Detail Lokasi Produk Warga</strong> <?php echo $row->produk.'-'.$row->pemilik ?>
                    </div>
                    <div id="map" style="width: 100%; height: 500px;"></div>
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
    center : [<?php echo $row->lat.','.$row->lng ?>],
    zoom  : 19,
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
		.bindPopup('<b>Lokasi <?php echo $row->pemilik.'-'.$row->telppemilik ?></b><br />').openPopup();
</script>
<?php $this->load->view('backend/bawah');
 ?>