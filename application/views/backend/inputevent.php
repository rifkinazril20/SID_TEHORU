<?php $this->load->view("backend/atas");
$setting = $this->db->get('setting')->row();


?>


<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->
      <div class="row">
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header">
              Lokasi (Drag And Drop Marker Untuk Mengambil Coordinat)

            </div>
            <div class="card-body table-responsive">
              <div id="map" style="height: 400px;"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="card">
            <div class="card-header">
              Input Data Event
            </div>
            <div class="card-body table-responsive">
              <form action="main/saveevent" id="save" method="post" enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td>Judul Event</td>
                    <td colspan="3">
                      <input type="text" placeholder="Judul Event" class="form-control" name="judul">
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Mulai</td>
                    <td>
                      <input type="text" class="form-control waktu" name="mulai">
                    </td>
                    <td>Tanggal Selesai</td>
                    <td>
                      <input type="text" class="form-control waktu" name="selesai">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Lattitude
                    </td>
                    <td>
                      <input name="lat" id="Latitude" type="text" class="form-control" placeholder="Latitude" required>
                    </td>
                    <td>
                      Longitude
                    </td>
                    <td>
                      <input name="lng" id="Longitude" type="text" class="form-control" placeholder="Longitude" required>
                    </td>
                  </tr>

                  <tr>
                    <td>Gambar 1</td>
                    <td colspan="3">
                      <input type="file" placeholder="Judul Event" class="form-control" name="gambar1">
                    </td>
                  </tr>

                  <tr>
                    <td>Gambar 2</td>
                    <td colspan="3">
                      <input type="file" placeholder="Judul Event" class="form-control" name="gambar2">
                    </td>
                  </tr>

                  <tr>
                    <td>Gambar 3</td>
                    <td colspan="3">
                      <input type="file" placeholder="" class="form-control" name="gambar3">
                    </td>
                  </tr>

                  <tr>
                    <td>Lokasi Event</td>
                    <td colspan="3">
                      <textarea class="summernote" name="lokasi"></textarea>
                    </td>
                  </tr>
                  </tr>

                  <tr>
                    <td>Keterangan / Deskripsi</td>
                    <td colspan="3">
                      <textarea class="summernote" name="ket"></textarea>
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
  $("#save").on("submit", function(e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      async: false,
      success: function(response) {
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
          $('#proses').waiting('done');
        })
        $(".bersih").val('');
      },
      error: function(e) {
        $.notify("Gagal Simpan", "error");
      }
    });
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
  var curLocation = [0, 0];
  if (curLocation[0] == 0 && curLocation[1] == 0) {
    curLocation = [<?php echo $setting->lat . ',' . $setting->lng ?>];
  }

  var map = L.map("map", {
    center: [<?php echo $setting->lat . ',' . $setting->lng ?>],
    zoom: 8,
    layers: []
  });
  var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
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
  var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: "<?php echo $setting->web ?>",
  });

  var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: "<?php echo $setting->web ?>",
  });
  L.control.scale({
    maxWidth: 150
  }).addTo(map);

  //base maps
  var baseMaps = [{
    groupName: "Base Maps",
    expanded: true,
    layers: {
      "Satellite": GoogleSatelliteHybrid,
      "Open Street Map Mapnik": OpenStreetMap_Mapnik,
      "Open Street Map Dark": mapdark,
      "Google Street": googleStreets,
      "Google Terrain": googleTerrain
    }
  }];



  var options = {
    contaner_width: "300px",
    group_maxHeight: "80px",
    exclusive: false,
    collapsed: true,
    position: "topright"
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

  $(".waktu").daterangepicker({
    locale: {
      format: "YYYY-MM-DD hh:mm"
    },
    singleDatePicker: true,
    timePicker: true,
    timePicker24Hour: true
  });
</script>

<?php $this->load->view("backend/bawah") ?>