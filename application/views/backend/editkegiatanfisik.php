<?php 
$setting = $this->db->get('setting')->row();

$q = $this->db->query("select kegiatan.*,jenis.jenis_kegiatan,sumberdana.sumberdana from kegiatan inner join jenis on jenis.id = kegiatan.idjenis inner join sumberdana on sumberdana.id = kegiatan.idsumberdana order by kegiatan.id desc ");
$xrow = $q->row();
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="row">
              <div class="col-lg-5">
              <div class="card">
            <div class="card-header bg-info text-light">
          Lokasi (Drag And Drop Marker Untuk Mengambil Coordinat)

            </div>
            <div class="card-body table-responsive">
            <div id="map" style="height: 400px;"></div>		
            </div>
            </div>
              </div>

              <div class="col-lg-7">
              <div class="card">
            <div class="card-header bg-info text-light">
              Form Kegiatan Fisik <?php echo $xrow->kegiatan ?>
            </div>
            <div class="card-body table-responsive">
            <form action="main/ubahkegiatanfisik/<?php echo $id; ?>" id="save" method="post" enctype="multipart/form-data">
              <table class="table">
                <tr>
                  <td>Nama Kegiatan</td>
                  <td colspan="3">
                    <input type="text" placeholder="Nama Kegiatan" value="<?php echo $xrow->kegiatan ?>" class="form-control" name="kegiatan">
                  </td>
                </tr>
                <tr>
                  <td>Jenis Kegiatan</td>
                  <td colspan="3">
                      <select name="jenis" id="" class="form-control select2">
                          <option value="<?php echo $xrow->idjenis ?>"><?php echo $xrow->jenis_kegiatan ?></option>
                          <?php 
                            $q = $this->db->query("select * from jenis");
                            foreach($q->result() as $row){
                          ?>
                          <option value="<?php echo $row->id ?>"><?php echo $row->jenis_kegiatan ?></option>
                          <?php } ?>
                      </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    Lattitude
                  </td>
                  <td>
                  <input name="lat" id="Latitude" value="<?php echo $xrow->lat ?>" type="text" class="form-control" placeholder="Latitude" required >
                  </td>
                  <td>
                    Longitude
                  </td>
                  <td>
                  <input name="lng" id="Longitude" value="<?php echo $xrow->lng ?>" type="text" class="form-control" placeholder="Longitude" required>
                  </td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td colspan="3">
                    <input type="text" placeholder="Alamat" value="<?php echo $xrow->alamat ?>" class="form-control" name="alamat" autocomplete="off">
                  </td>
                </tr>
            
                <tr>
                  <td>Sumber Dana</td>
                  <td colspan="3">
                      <select name="sumberdana" id="" class="form-control select2">
                          <option value="<?php echo $xrow->idsumberdana ?>"><?php echo $xrow->sumberdana ?></option>
                          <?php 
                            $q = $this->db->query("select * from sumberdana");
                            foreach($q->result() as $row){
                          ?>
                          <option value="<?php echo $row->id ?>"><?php echo $row->sumberdana ?></option>
                          <?php } ?>
                      </select>
                  </td>
                </tr>
                <tr>
                  <td>Anggaran</td>
                  <td colspan="3">
                    <input type="text" placeholder="Anggaran" value="<?php echo $xrow->anggaran ?>" class="form-control uang" name="anggaran">
                  </td>
                </tr>
                <tr>
                  <td>Volume</td>
                  <td colspan="3">
                    <input type="text" placeholder="Volume" value="<?php echo $xrow->volume ?>" class="form-control" name="volume">
                  </td>
                </tr>
                <tr>
                  <td>Pelaksana</td>
                  <td colspan="3">
                    <input type="text" placeholder="Pelaksana" value="<?php echo $xrow->pelaksana ?>" class="form-control" name="pelaksana">
                  </td>
                </tr>
                <tr>
                  <td>Tahun</td>
                  <td colspan="3">
                    <input type="text" placeholder="Tahun" value="<?php echo $xrow->tahun ?>" class="form-control tahun" autocomplete="off" name="tahun">
                  </td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td colspan="3">
                      <textarea name="desk" id="" class="summernote" cols="30" rows="10"><?php echo $xrow->desk ?></textarea>
                  </td>
                </tr>

                <tr>
                  <td></td>
                  <td>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-sync-alt"></i> Batal</button>
                  </td>
                </tr>
              </table>
            </form>
            </div>
            </div>
              </div>
            </div>
            <!--  -->
          </div>
        </section>
        
      </div>


	 <!-- MAP LEAFLET SCRIPTS -->
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
                    text: "Data kegiatan berhasil diubah!",
                    icon: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        window.location.reload();
                    })
                // $(".bersih").val('');
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
	
	var curLocation = [0, 0];
			if (curLocation[0] == 0 && curLocation[1] == 0) {
				curLocation = [<?php echo $setting->lat.','.$setting->lng ?>];
			}
  
            var map = L.map("map",{
    center : [<?php echo $setting->lat.','.$setting->lng ?>],
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
  var overlays = [
    // {
    //     // groupName:"Lahan Dan Irigasi",
    //   expanded : true,
    //   layers : {
    //       "Group Lahan" : gruplahan,
    //       "Group Irigasi" : grupirigasi
    //    }
    // }
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
 

  map.attributionControl.setPrefix(false);

var marker = new L.marker(curLocation, {
draggable: 'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position, {
draggable: 'true'
}).bindPopup(position).update();
$("#Latitude").val(position.lat);
$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function() {
  var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
  marker.setLatLng(position, {
  draggable: 'true'
  }).bindPopup(position).update();
  map.panTo(position);
});

map.addLayer(marker);


		</script>