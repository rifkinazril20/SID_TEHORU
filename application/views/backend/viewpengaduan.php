<?php $this->load->view("backend/atas");
$setting = $this->db->get('setting')->row();
$q = $this->db->query("select pengaduan.*,kategori_komplain.kat,penduduk.nama from pengaduan inner join kategori_komplain on kategori_komplain.id = pengaduan.idkat inner join penduduk on penduduk.id = pengaduan.idpenduduk where pengaduan.id='$id'");
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
                        <strong>Detail Pengaduan</strong> <?php echo $row->nopengaduan ?>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <td>Nama Pelapor</td>
                            <td><?php echo $row->nama ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td><?php echo date("d F Y H:s",strtotime($row->date)) ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><?php echo $row->kat ?></td>
                        </tr>
                        <tr>
                            <td>Pesan</td>
                            <td><?php echo $row->isi ?></td>
                        </tr>
                        
                    </table>
                   
                </div>
             
                </div>
             

                <div class="card col-lg-6">
                <div class="card-body table-responsive">
                    <div class="alert alert-info" role="alert">
                        <strong>Lokasi Kejadian</strong> <?php echo $row->nopengaduan ?>
                    </div>
                    <div id="map" style="width: 100%; height: 600px;"></div>
                </div>
                </div>
                </div>
             
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td align="center" class="table-info mb-3">Lampiran</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="image/<?php echo $row->lampiran ?>" alt="" class="img img-fluid img-thumbnail">
                                </td>
                            </tr>
                          
                        </table>
                    </div>
                </div>
                <form action="main/verifikasi/<?php echo $id; ?>" id="save" method="post">
                        <button type="submit" class="btn btn-primary w-100 mb-3"><i class="fa fa-paper-plane"></i> Verifikasi</button>
                        </form>
            <!--  -->
          </div>
        </section>
        
      </div>


	 <!-- MAP LEAFLET SCRIPTS -->
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
                    text: "Berhasil verifikasi pengaduan!",
                    icon: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        window.location = "main/respon";
                    })
                $(".bersih").val('');
            },
            error : function (e){
                alert("Ada kesalahan sistem");
            }
        });
    });
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
		.bindPopup('<b>Lokasi Event <?php echo $row->nama ?></b><br />').openPopup();
</script>
