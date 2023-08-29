<?php 
 
 $label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
 for($bulan = 1;$bulan < 13;$bulan++)
 {
   // $query = mysqli_query($koneksi,"select sum(jumlah) as jumlah from tb_penjualan where MONTH(tgl_penjualan)='$bulan'");
   $query = $this->db->query("select *,count(*) as jml from penduduk where MONTH(tgl_daftar)='$bulan'")->result();
   foreach($query as $query){
     $jml[] = $query->jml;
   }
   // $row = $query->fetch_array();
   // $jumlah_produk[] = $row['jumlah'];
 }
 
  
 $label2 = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
 for($bulan = 1;$bulan < 13;$bulan++)
 {
   // $query = mysqli_query($koneksi,"select sum(jumlah) as jumlah from tb_penjualan where MONTH(tgl_penjualan)='$bulan'");
   $query = $this->db->query("select *,count(*) as jml from pengaduan where MONTH(date)='$bulan'")->result();
   foreach($query as $query){
     $jmlngadu[] = $query->jml;
   }
   // $row = $query->fetch_array();
   // $jumlah_produk[] = $row['jumlah'];
 }  
?>
<!-- Main Content -->
<?php 
  $setting = $this->db->get('setting')->row();
  $laki = $this->db->query("select * from penduduk where jk='Laki-laki'")->num_rows();
  $cw = $this->db->query("select * from penduduk where jk='Perempuan'")->num_rows();
  $non = $this->db->query("select * from penduduk where status='0'")->num_rows();
  $aktif = $this->db->query("select * from penduduk where status='1'")->num_rows();
  $kawin = $this->db->query("select * from penduduk where status_kawin='Kawin'")->num_rows();
  $belum = $this->db->query("select * from penduduk where status_kawin='Belum Kawin'")->num_rows();
  $ceraihidup = $this->db->query("select * from penduduk where status_kawin='Cerai Hidup'")->num_rows();
  $ceraimati = $this->db->query("select * from penduduk where status_kawin='Cerai Mati'")->num_rows();
?> 
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
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="alert alert-warning" role="alert">
              <strong><?php
                        if (function_exists('date_default_timezone_set'))
                            date_default_timezone_set('Asia/Jakarta');
                        ?> <span id="clock">&nbsp;</span> </strong>
            </div>
            <div class="alert alert-info" role="alert">
              <strong>Selamat datang  </strong> <?php echo $this->session->userdata("nama") ?> di <?php echo $setting->web ?> <?php  
echo 'User IP Address - '.$_SERVER['REMOTE_ADDR'];  
?>  
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-purple">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $laki ?>
                        </h3>
                        <span class="text-muted">Laki-laki</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-green">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $cw ?>
                        </h3>
                        <span class="text-muted">Perempuan</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-cyan">
                    <i class="fas fa-sync-alt"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $aktif ?>
                        </h3>
                        <span class="text-muted">Status Aktif</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-orange">
                    <i class="fas fa-power-off"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $non ?>
                        </h3>
                        <span class="text-muted">Status Non Aktif</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="row">
            <div class="col-lg-6">
            <div class="card">
  <div class="card-body">
  <div  class="text-center">
		<canvas style="width: 600px; height: 535px;" id="myChart"></canvas>
	</div>
  </div>
</div>
            </div>
      
            <div class="col-lg-6">
            <div class="card">
  <div class="card-body">
    <div id="wisata"></div>
  </div>
</div>
            </div>
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                <div id="kawin"></div>
                </div>
              </div>
              </div>
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                <div  class="text-center">
		<canvas style="width: 600px; height: 400px;" id="ngadu"></canvas>
	</div>
                </div>
              </div>
              </div>
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                <div id="map" style="height: 600px;"></div>		
                </div>
              </div>
              </div>
            
      


          </div>
        </section>
     
      </div>
     
      <?php 
                  $chrome=$this->db->query("SELECT * FROM pengunjung WHERE pengunjung_perangkat='Chrome'")->num_rows();
                  $firefox=$this->db->query("SELECT * FROM pengunjung WHERE pengunjung_perangkat='Firefox' OR pengunjung_perangkat='Mozilla'")->num_rows();
                  $googlebot=$this->db->query("SELECT * FROM pengunjung WHERE pengunjung_perangkat='Googlebot'")->num_rows();
                  $opera=$this->db->query("SELECT * FROM pengunjung WHERE pengunjung_perangkat='Opera'")->num_rows();
                  $other=$this->db->query("SELECT * FROM pengunjung WHERE pengunjung_perangkat='Other' OR pengunjung_perangkat='Internet Explorer'")->num_rows();
             
      ?>
       
<script>
 
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

 Highcharts.chart('wisata', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45,
      beta: 0
    }
  },
  title: {
    text: 'Browser Pengunjung'
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
      ['Chrome', <?php echo $chrome; ?>],
      ['Mozilla Firefox', <?php echo $firefox; ?>],
      ['Opera', <?php echo $opera; ?>],
      ['Lainnya', <?php echo $other; ?>],
      {
        name: 'Googlebot',
        y: <?php echo $googlebot; ?>,
        sliced: true,
        selected: true
      },
    ]
  }]
});

   
var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Grafik Daftar Penduduk',
					data: <?php echo json_encode($jml); ?>,
          borderWidth: 2,
          backgroundColor: '#6777ef',
          borderColor: '#6777ef',
          borderWidth: 2.5,
          pointBackgroundColor: '#ffffff',
          pointRadius: 4
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});

    var ctx = document.getElementById("ngadu").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label2); ?>,
				datasets: [{
					label: 'Grafik Pengaduan Perbulan',
					data: <?php echo json_encode($jmlngadu); ?>,
          borderWidth: 2,
          backgroundColor: '#6777ef',
          borderColor: '#6777ef',
          borderWidth: 2.5,
          pointBackgroundColor: '#ffffff',
          pointRadius: 4
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
   
    var d = new Date();
    var hours = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();
    var hari = d.getDay();
    var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    hariIni = namaHari[hari];
    var tanggal = ("0" + d.getDate()).slice(-2);
    var month = new Array();
    month[0] = "Januari";
    month[1] = "Februari";
    month[2] = "Maret";
    month[3] = "April";
    month[4] = "Mei";
    month[5] = "Juni";
    month[6] = "Juli";
    month[7] = "Agustus";
    month[8] = "September";
    month[9] = "Oktober";
    month[10] = "Nopember";
    month[11] = "Desember";
    var bulan = month[d.getMonth()];
    var tahun = d.getFullYear();
    var date = Date.now(),
        second = 1000;

    function pad(num) {
        return ('0' + num).slice(-2);
    }

    function updateClock() {
        var clockEl = document.getElementById('clock'),
            dateObj;
        date += second;
        dateObj = new Date(date);
        clockEl.innerHTML = '' + hariIni + ',  ' + tanggal + ' ' + bulan + ' ' + tahun + ' | ' + pad(dateObj.getHours()) + ':' + pad(dateObj.getMinutes()) + ':' + pad(dateObj.getSeconds());
    }
    setInterval(updateClock, second);

    
 var gruplahan = L.layerGroup();
	var grupirigasi = L.layerGroup();
  
  var map = L.map("map",{
    center : [<?php echo $setting->lat.','.$setting->lng ?>],
    zoom  : 8,
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
//minimap
		var osmUrl='https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}';
		var osmAttrib='Map data &copy; OpenStreetMap contributors';
		var osm = new L.TileLayer(osmUrl, {minZoom: 5, maxZoom: 18, attribution: osmAttrib});
		var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13, attribution: osmAttrib });
		var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true }).addTo(map);
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
		map.on('enterFullscreen', function(){
			if(window.console) window.console.log('enterFullscreen');
		});
		map.on('exitFullscreen', function(){
			if(window.console) window.console.log('exitFullscreen');
		});
   ///show kompas


var north = L.control({position:"bottomleft"});
north.onAdd = function(map){
  var div = L.DomUtil.create("div","info legend");
  div.innerHTML = "<img src='assets/arrow.png' style='width:120px' >";
  return div;
}
north.addTo(map);
  //untuk buat skala
//zommba
var zoom_bar = new L.Control.ZoomBar({position: 'topleft'}).addTo(map);
L.control.coordinates({
			position:"topright",
			decimals:2,
			decimalSeperator:",",
			labelTemplateLat:"Latitude: {y}",
			labelTemplateLng:"Longitude: {x}"
		}).addTo(map);
  L.control.scale({maxWidth : 150,position: 'topright'}).addTo(map);
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
 
  var polygon = <?php echo $setting->wilayah ?>;
    var geojsonLayer = new L.GeoJSON(polygon);
    map.addLayer(geojsonLayer);
</script>