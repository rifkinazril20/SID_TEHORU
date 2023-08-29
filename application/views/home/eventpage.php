<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>
    <link rel="stylesheet" href="plugin/leaflet-panel-layers.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
<!-- Make sure you put this AFTER Leaflet's CSS -->
 	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

  <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@3.0.2/dist/esri-leaflet.js"
    integrity="sha512-myckXhaJsP7Q7MZva03Tfme/MSF5a6HC2xryjAM4FxPLHGqlh5VALCbywHnzs2uPoF/4G/QVXyYDDSkp5nPfig=="
    crossorigin=""></script>

  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="plugin/leaflet.ajax.js"></script>

<link rel="stylesheet" href="plugin/css/styledLayerControl.css" />
		<script src="plugin/src/styledLayerControl.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyBXTXgQ7wZPndgKZilAsFVZjT5YWMr9WFs"></script>
<script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>

<?php 
    $setting = $this->db->get('setting')->row();
    

?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Agenda Page</h2>
      <ol>
        <li><a href="home/index">Home</a></li>
        <li><a href="home/akomodasi">Agenda  <?php echo $setting->web ?></a></li>
        <li>Agenda Page</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<!-- ======= Detail Akomodasi  Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-8 entries">

        <article class="entry entry-single">

          <div class="entry-img">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/<?php echo $image1 ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/<?php echo $image2 ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/<?php echo $image3 ?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

            <!-- <img src="" alt="" class="img-fluid"> -->
          </div>

          <h2 class="entry-title">
            <a href="home/detailakomodasi/<?php echo $slug ?>"><?php echo $judul ?></a>
          </h2>

          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="home/detailakomodasi/<?php echo $slug ?>"><?php echo $view ?></a></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="home/detailakomodasi/<?php echo $slug ?>">Mulai : <time datetime="2020-01-01"><?php echo date("d F Y",strtotime($mulai)) ?></time></a></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="home/detailakomodasi/<?php echo $slug ?>">Selesai : <time datetime="2020-01-01"><?php echo date("d F Y",strtotime($selesai)) ?></time></a></li>
            </ul>
          </div>

          <div class="entry-content">
            <p>
                Jumlah Baca <?php echo $view ?> View<br><br> 
                Lokasi : <?php echo $lokasi ?>
<br>
                
            </p>

            
            <p>
                <?php echo $ket ?>
            </p>


            <!-- <div class="sharethis-inline-follow-buttons"></div> -->
            <div class="sharethis-inline-reaction-buttons"></div>

          </div>


        </article><!-- End blog entry -->
        <article class="entry entry-single">
        <div id="map" style="height: 400px;"></div>		


        </article><!-- End blog entry -->

        <div class="blog-comments">

        

        </div><!-- End blog comments -->

      </div><!-- End blog entries list -->

      <div class="col-lg-4">

        <div class="sidebar">
        <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="home/searchEvent" method="get">
                  <input type="text" name="keyword" autocomplete="off">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->


              <h3 class="sidebar-title">Agenda Yang Akan Datang</h3>
              <div class="sidebar-item recent-posts">
              <?php 
                foreach($populer as $z){
              ?>
                <div class="post-item clearfix">
                  <img src="image/<?php echo $z->gambar2 ?>" alt="">
                  <h4><a href="home/eventpage/<?php echo $z->slug ?>"><?php echo $z->judul ?></a></h4>
                  <time datetime="2020-01-01"><?php echo date("d F Y",strtotime($z->mulai)) ?> - <?php echo date("d F Y",strtotime($z->selesai)) ?></time> 
                </div>
            <?php }  ?>

              </div><!-- End sidebar recent posts-->

            

        </div><!-- End sidebar -->

      </div><!-- End blog sidebar -->

    </div>

  </div>
</section><!-- End Detail Akomodasi  Section -->

</main><!-- End #main -->
<script>
var map = L.map("map",{
    center : [<?php echo $setting->lat.','.$setting->lng ?>],
    zoom  : 13,
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
  //untuk buat skala

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
    {
    groupName:"Peta Besar",
      expanded : true,
      layers : { }
    }
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

  var marker = L.marker([<?php echo $lat ?>, <?php echo $lng ?>]).addTo(map)
		.bindPopup('<b>Lokasi Agenda <?php echo $judul ?></b><br /><br /><?php echo $lokasi ?>').openPopup();

</script>

