<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
  #container {
    height: 400px;
  }

  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }

  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
  }

  #container {
    height: 400px;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }
</style>
<?php

$slider = $this->db->get('slider')->row();
$setting = $this->db->get('setting')->row();
$kawin = $this->db->query("select * from penduduk where status_kawin='Kawin'")->num_rows();
$belum = $this->db->query("select * from penduduk where status_kawin='Belum Kawin'")->num_rows();
$ceraihidup = $this->db->query("select * from penduduk where status_kawin='Cerai Hidup'")->num_rows();
$ceraimati = $this->db->query("select * from penduduk where status_kawin='Cerai Mati'")->num_rows();
$sd = $this->db->query("select * from penduduk where pendidikan='SD'")->num_rows();
$smp = $this->db->query("select * from penduduk where pendidikan='SMP'")->num_rows();
$sma = $this->db->query("select * from penduduk where pendidikan='SMA'")->num_rows();
$smk = $this->db->query("select * from penduduk where pendidikan='SMK'")->num_rows();
$d1 = $this->db->query("select * from penduduk where pendidikan='D1'")->num_rows();
$d2 = $this->db->query("select * from penduduk where pendidikan='D2'")->num_rows();
$d3 = $this->db->query("select * from penduduk where pendidikan='D3'")->num_rows();
$s1 = $this->db->query("select * from penduduk where pendidikan='S1'")->num_rows();
$s2 = $this->db->query("select * from penduduk where pendidikan='S2'")->num_rows();
$s3 = $this->db->query("select * from penduduk where pendidikan='S3'")->num_rows();
$laki = $this->db->query("select * from penduduk where pendidikan='S3'")->num_rows();
$cwo = $this->db->query("select * from penduduk where jk='Laki-laki'")->num_rows();
$cwe = $this->db->query("select * from penduduk where jk='Perempuan'")->num_rows();
$islam = $this->db->query("select * from penduduk where agama='Islam'")->num_rows();
$kristen = $this->db->query("select * from penduduk where agama='Kristen'")->num_rows();
$katolik = $this->db->query("select * from penduduk where agama='Katolik'")->num_rows();
$budha = $this->db->query("select * from penduduk where agama='Budha'")->num_rows();
$hindhu = $this->db->query("select * from penduduk where agama='Hindhu'")->num_rows();
$konghucu = $this->db->query("select * from penduduk where agama='Konghucu'")->num_rows();
$lain = $this->db->query("select * from penduduk where agama='Lain-lain'")->num_rows();
?>

<?php $struktur = $this->db->get('struktur')->row();
?>
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(image/<?php echo $slider->gambar1 ?>);">
        <div class="carousel-container">
          <div class="carousel-content animate__animated animate__fadeInUp">
            <p><?php echo $slider->judul1 ?></p>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image: url(image/<?php echo $slider->gambar2 ?>);">
        <div class="carousel-container">
          <div class="carousel-content animate__animated animate__fadeInUp">
            <p><?php echo $slider->judul2 ?></p>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item" style="background-image: url(image/<?php echo $slider->gambar3 ?>);">
        <div class="carousel-container">
          <div class="carousel-content animate__animated animate__fadeInUp">
            <p><?php echo $slider->judul3 ?></p>
          </div>
        </div>
      </div>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

  </div>
</section><!-- End Hero -->
<main id="main">

  <!-- ======= About Us Section ======= -->

  <!-- ======= Our Clients Section ======= -->
  <section id="clients" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Grafik <?php echo $setting->web ?></h2>
      </div>

      <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

        <div class="col-lg-6 col-md-4 col-6">
          <div id="kawin"></div>
        </div>

        <div class="col-lg-6 col-md-4 col-6">
          <div class="client-logo">
            <div id="pendidikan"></div>


          </div>
        </div>

      </div>
      <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

        <div class="col-lg-6 col-md-4 col-6">
          <div id="agama"></div>
        </div>

        <div class="col-lg-6 col-md-4 col-6">
          <div class="client-logo">
            <div id="jk"></div>


          </div>
        </div>

      </div>

    </div>
  </section><!-- End Our Clients Section -->
  <script>
    Highcharts.chart('agama', {
      chart: {
        type: 'pie',
        options3d: {
          enabled: true,
          alpha: 45,
          beta: 0
        }
      },
      title: {
        text: 'Grafik Agama'
      },
      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          depth: 35,
          dataLabels: {
            enabled: true,
            format: '{point.name}'
          }
        }
      },
      series: [{
        type: 'pie',
        name: 'Total',
        data: [
          ['Islam', <?php echo $islam; ?>],
          ['Kristen', <?php echo $kristen; ?>],
          ['Katolik', <?php echo $katolik; ?>],
          ['Budha', <?php echo $budha; ?>],
          ['Hindhu', <?php echo $hindhu; ?>],
          ['Konghucu', <?php echo $konghucu; ?>],
          {
            name: 'Lain-lain',
            y: <?php echo $lain; ?>,
            sliced: true,
            selected: true
          },
        ]
      }]
    });

    Highcharts.chart('jk', {
      chart: {
        type: 'pie',
        options3d: {
          enabled: true,
          alpha: 45,
          beta: 0
        }
      },
      title: {
        text: 'Grafik Jenis Kelamin'
      },
      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          depth: 35,
          dataLabels: {
            enabled: true,
            format: '{point.name}'
          }
        }
      },
      series: [{
        type: 'pie',
        name: 'Total',
        data: [
          ['Laki-laki', <?php echo $cwo; ?>],
          {
            name: 'Perempuan',
            y: <?php echo $cwe; ?>,
            sliced: true,
            selected: true
          },
        ]
      }]
    });

    Highcharts.chart('kawin', {
      chart: {
        type: 'pie',
        options3d: {
          enabled: true,
          alpha: 45,
          beta: 0
        }
      },
      title: {
        text: 'Grafik Status Perkawinan'
      },
      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          depth: 35,
          dataLabels: {
            enabled: true,
            format: '{point.name}'
          }
        }
      },
      series: [{
        type: 'pie',
        name: 'Total',
        data: [
          ['Sudah Kawin', <?php echo $kawin; ?>],
          ['Cerai Hidup', <?php echo $ceraihidup; ?>],
          ['Cerai Mati', <?php echo $ceraimati; ?>],
          {
            name: 'Belum Kawin',
            y: <?php echo $belum; ?>,
            sliced: true,
            selected: true
          },
        ]
      }]
    });
    Highcharts.chart('pendidikan', {
      chart: {
        type: 'pie',
        options3d: {
          enabled: true,
          alpha: 45,
          beta: 0
        }
      },
      title: {
        text: 'Grafik Pendidikan'
      },
      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          depth: 35,
          dataLabels: {
            enabled: true,
            format: '{point.name}'
          }
        }
      },
      series: [{
        type: 'pie',
        name: 'Total',
        data: [
          ['SD', <?php echo $sd; ?>],
          ['SMP', <?php echo $smp; ?>],
          ['SMA', <?php echo $sma; ?>],
          ['SMK', <?php echo $smk; ?>],
          ['D1', <?php echo $d1; ?>],
          ['D2', <?php echo $d2; ?>],
          ['D3', <?php echo $d3; ?>],
          ['S1', <?php echo $s1; ?>],
          ['S2', <?php echo $s2; ?>],
          ['S3', <?php echo $s3; ?>],
          {
            name: 'S3',
            y: <?php echo $belum; ?>,
            sliced: true,
            selected: true
          },
        ]
      }]
    });
  </script>
  <section id="clients" class="about">


    </div>
  </section><!-- End Our Clients Section -->

  <!-- ======= Services Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Agenda Terbaru Di <?php echo $setting->web ?></h2>
      </div>

      <div class="row">
        <?php
        $wisata = $this->db->query("select * from event  order by id desc limit 8");
        foreach ($wisata->result() as $w) {
        ?>

          <div class="col-lg-3 col-md-6">
            <div class="box">
              <ul>
                <li>
                  <img src="image/<?php echo $w->gambar ?>" class="img img-fluid img-thumbnail" alt="...">

                </li>
                <li>
                  <h5><?php echo $w->judul ?></h5>
                </li>
                <li>
                  <h5><?php echo 'Tanggal ' . $w->mulai ?></h5>
                </li>
              </ul>
              <div class="btn-wrap">
                <a href="home/eventpage/<?php echo $w->slug ?>" class="btn-buy">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

        <?php  } ?>

      </div>

    </div>
  </section><!-- End Services Section -->
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Pengumuman Terbaru Di <?php echo $setting->web ?></h2>
      </div>

      <div class="row">
        <?php
        $wisata = $this->db->query("select * from pengumuman  order by id desc limit 8");
        foreach ($wisata->result() as $w) {
        ?>

          <div class="col-lg-3 col-md-6">
            <div class="box">
              <ul>
                <li>
                  <img src="image/<?php echo $w->gambar ?>" class="img img-fluid img-thumbnail" alt="...">

                </li>
                <li>
                  <h5><?php echo $w->judul ?></h5>
                </li>
                <li>
                  <h5><?php echo 'Tanggal ' . $w->date ?></h5>
                </li>
              </ul>
              <div class="btn-wrap">
                <a href="home/pengumumanpage/<?php echo $w->slug ?>" class="btn-buy">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

        <?php  } ?>

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Services Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Berita Terbaru</h2>
      </div>

      <div class="row">
        <?php
        $wisata = $this->db->query("select * from berita  order by id desc limit 6");
        foreach ($wisata->result() as $w) {
        ?>

          <div class="col-lg-4 col-md-6 mb-3">
            <div class="box">
              <ul>
                <li>
                  <img src="image/<?php echo $w->gambar ?>" class="img img-fluid img-thumbnail" alt="...">

                </li>
                <li>
                  <h5><?php echo $w->judul ?></h5>
                </li>
                <li>
                  <p>Tanggal Post <?php echo date("d F Y", strtotime($w->date)) ?></p>
                </li>
                <li>
                  <p>Jumlah Views <?php echo $w->views ?></p>
                </li>
                <li>
                  <p><?php echo substr($w->ket, 0, 100) ?>....</p>
                </li>
              </ul>
              <div class="btn-wrap">
                <a href="home/detailberita/<?php echo $w->slug ?>" class="btn-buy">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

        <?php  } ?>

      </div>

    </div>

    <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    $setting = $this->db->get('setting');
    $row = $setting->row();
    ?>
    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Wilayah <?php echo $row->web ?></h2>
        </div>

        <div class="map-section">
          <div id="map" style="height: 600px;"></div>
        </div>
      </div>
    </section><!-- End Our Clients Section -->

</main><!-- End #main -->
<script>
  var gruplahan = L.layerGroup();
  var grupirigasi = L.layerGroup();

  var map = L.map("map", {
    center: [<?php echo $row->lat . ',' . $row->lng ?>],
    zoom: 8,
    zoomControl: false,
    layers: [],
    fullscreenControl: true,
    fullscreenControlOptions: { // optional
      title: "Show me the fullscreen !",
      titleCancel: "Exit fullscreen mode"
    }
  });
  var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    // maxZoom: 12,
    attribution: "<?php echo $row->web ?>"
  }).addTo(map);
  var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 12,
    attribution: '<?php echo $row->web ?>'
  });
  var mapdark = L.tileLayer(
    "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
      attribution: "<?php echo $row->web ?>",
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
    attribution: "<?php echo $row->web ?>",
  });

  var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: "<?php echo $row->web ?>",
  });
  //minimap
  var osmUrl = 'https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}';
  var osmAttrib = 'Map data &copy; OpenStreetMap contributors';
  var osm = new L.TileLayer(osmUrl, {
    minZoom: 5,
    maxZoom: 18,
    attribution: osmAttrib
  });
  var osm2 = new L.TileLayer(osmUrl, {
    minZoom: 0,
    maxZoom: 13,
    attribution: osmAttrib
  });
  var miniMap = new L.Control.MiniMap(osm2, {
    toggleDisplay: true
  }).addTo(map);
  var lc = L.control.locate({
    position: 'topleft',
    strings: {
      title: "Cari lokasi saya"
    }
  }).addTo(map);

  //shhow location
  //window
  // Creating window object


  // detect fullscreen toggling
  map.on('enterFullscreen', function() {
    if (window.console) window.console.log('enterFullscreen');
  });
  map.on('exitFullscreen', function() {
    if (window.console) window.console.log('exitFullscreen');
  });
  ///show kompas
  var comp = new L.Control.Compass({
    autoActive: true,
    showDigit: true,
    position: 'topleft'
  });

  map.addControl(comp);

  var north = L.control({
    position: "bottomleft"
  });
  north.onAdd = function(map) {
    var div = L.DomUtil.create("div", "info legend");
    div.innerHTML = "<img src='assets/arrow.png' style='width:120px' >";
    return div;
  }
  north.addTo(map);
  //untuk buat skala
  //zommba
  var zoom_bar = new L.Control.ZoomBar({
    position: 'topleft'
  }).addTo(map);
  L.control.coordinates({
    position: "topright",
    decimals: 2,
    decimalSeperator: ",",
    labelTemplateLat: "Latitude: {y}",
    labelTemplateLng: "Longitude: {x}"
  }).addTo(map);
  L.control.scale({
    maxWidth: 150,
    position: 'topright'
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
  var overlays = [

  ];


  var options = {
    contaner_width: "300px",
    group_maxHeight: "80px",
    exclusive: false,
    collapsed: true,
    position: "topright"
  }
  var control = L.Control.styledLayerControl(baseMaps, overlays, options);
  map.addControl(control);

  var polygon = <?php echo $row->wilayah ?>;
  var geojsonLayer = new L.GeoJSON(polygon);
  map.addLayer(geojsonLayer);
</script>