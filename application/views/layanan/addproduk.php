<?php
$setting = $this->db->get('setting')->row();
?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Beranda</h2>
      <ol>
        <li><a href="home/index">Home</a></li>
        <li>Beranda</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">
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
            Input Data Produk Warga
          </div>
          <div class="card-body table-responsive">
            <form action="layanan/saveprodukwarga" id="save" method="post" enctype="multipart/form-data">
              <table class="table">
                <tr>
                  <td>Nama Produk</td>
                  <td colspan="3">
                    <input type="text" placeholder="Nama Produk" class="form-control" name="produk">
                  </td>
                </tr>
                <tr>
                  <td>Harga </td>
                  <td>
                    <input type="text" placeholder="Harga Produk..." autocomplete="off" class="form-control uang" name="harga">
                  </td>
                  <td>No. Handphone Pemilik</td>
                  <td>
                    <input type="number" placeholder="No. Handphone Pemilik" class="form-control" name="telp">
                  </td>
                </tr>

                <tr>
                  <td>Pemlik </td>
                  <td colspan="3">
                    <input type="text" placeholder="Pemilik produkk.." value="<?php echo $this->session->userdata("nama") ?>" readonly class="form-control" name="pemilik">
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
                  <td>Gambar </td>
                  <td colspan="3">
                    <input type="file" placeholder="Judul Event" class="form-control" name="gambar">
                  </td>
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
  </div>
</section><!-- End Services Section -->

</main><!-- End #main -->
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

  $(".summernote").summernote({
    dialogsInBody: true,
    minHeight: 250
  });

  $('.uang').inputmask("numeric", {
    removeMaskOnSubmit: true,
    radixPoint: ".",
    groupSeparator: ",",
    digits: 2,
    autoGroup: true,
    rightAlign: false,
  });
</script>