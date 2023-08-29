<?php 
    $random = 'COMP-'.date('YmdHis');
?>
<?php
$setting = $this->db->get('setting')->row();


?>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs" >
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Pengaduan Online</h2>
          <ol>
            <li><a href="home/index">Home</a></li>
            <li>Pengaduan Online</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
      <div class="card mb-5">
      <div class="card-header text-light bg-info">
          Lokasi (Drag And Drop Marker Untuk Mengambil Coordinat)

            </div>
  <div class="card-body">
  <div id="map" style="height: 400px;"></div>		
  </div>
</div>
      <div class="card">
  <div class="card-header text-light bg-info">
    Tambah Pengaduan Baru
  </div>
  <div class="card-body table-responsive">
    <form action="layanan/savepengaduan" method="post" id="save" enctype="multipart/form-data">
       <table class="table">
           <tr>
               <td>NO. Pengaduan</td>
               <td>
                   <input type="text" value="<?php echo $random ?>" readonly name="no" class="form-control">
               </td>
           </tr>
           <tr>
               <td>Kategori</td>
               <td>
                   <select name="kat" id="" class="form-control">
                       <option value="">Pilih</option>
                       <?php 
                        $q = $this->db->query("select * from kategori_komplain");
                        foreach($q->result() as $row){
                       ?>
                       <option value="<?php echo $row->id ?>"><?php echo $row->kat ?></option>

                       <?php  } ?>
                   </select>
               </td>
           </tr>
           <tr>
                  <td>
                  <input name="lat" id="Latitude" type="text" readonly class="form-control" placeholder="Latitude" required >

                  </td>
                  <td>
                  <input name="lng" id="Longitude" type="text" readonly class="form-control" placeholder="Longitude" required>

                  </td>
                
                </tr>

           <tr>
               <td>Lampiran</td>
               <td>
                            <center>   
                                    <img id="blah" accept="image/*;capture=camera" class='img-fluid mb-3' width='280' src="assets/nofoto.jpg" alt="your image" /></center>
                              <input type="file"     name="gambar" class="form-control mb-3 bersih"  onchange="readURL(this);"  aria-describedby="inputGroupFileAddon01">
                              <span class="badge badge-warning"><strong>Informasi</strong> Input Gambar Maksimal 2mb !</span> 

               </td>
           </tr>
           <tr>
               <td>Deskripsi</td>
               <td>
                   <textarea name="desk" id="" cols="10" rows="5" class="form-control"></textarea>
               </td>
           </tr>
           <tr>
               <td></td>
               <td>
                   <button type="reset" class="btn btn-danger">Batal</button>
                   <button type="submit" class="btn btn-primary">Simpan</button>
               </td>
           </tr>
       </table>
    </form>
  </div>
</div>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->
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
                    text: "Terima kasih, pengaduan anda berhasil disampaikan harap menunggu respon dari admin!",
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
                alert("Ada kesalaha sistem");
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
    var osmUrl='https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}';
    var osmAttrib='Map data &copy; OpenStreetMap contributors'; 
		var osm = new L.TileLayer(osmUrl, {minZoom: 5, maxZoom: 18, attribution: osmAttrib});
		var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13, attribution: osmAttrib });
    var lc = L.control.locate({
    position: 'topleft',
    strings: {
        title: "Cari lokasi saya"
    }
}).addTo(map);	
		// detect fullscreen toggling
		map.on('enterFullscreen', function(){
			if(window.console) window.console.log('enterFullscreen');
		});
		map.on('exitFullscreen', function(){
			if(window.console) window.console.log('exitFullscreen');
		});
   ///show kompas
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
 
 

  map.attributionControl.setPrefix(false);
  var myIcon = L.icon({
     iconUrl: 'warning.png',
     iconSize: [40, 45],
 });

var marker = new L.marker(curLocation,{
draggable: 'true',
icon: myIcon
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position, {
    icon: myIcon
},{
draggable: 'true'
}).bindPopup(position).update();
$("#Latitude").val(position.lat);
$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function() {
  var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
  marker.setLatLng(position,{
    icon: myIcon
}, {
  draggable: 'true'
  }).bindPopup(position).update();
  map.panTo(position);
});

map.addLayer(marker);

 </script>