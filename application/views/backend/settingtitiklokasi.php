
<?php 
$setting = $this->db->get('setting')->row();


?>

<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-body table-responsive">
              <div id="map" style="width: 100%; height: 430px;"></div>
              <br>
              <br>
              <form action="main/updatetitiklokasi" id="save" method="post">
              <table class="table">
                  <tr>
                    <tr>
                    <td>
                    Lattitude
                  </td>
                  <td>
                  <input name="lat" id="Latitude" value="<?php echo $setting->lat ?>" type="text" class="form-control" placeholder="Latitude" required >
                  </td>
                  <td>
                    Longitude
                  </td>
                  <td>
                  <input name="lng" id="Longitude" value="<?php echo $setting->lng ?>" type="text" class="form-control" placeholder="Longitude" required>
                  </td>
                    </tr>
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
