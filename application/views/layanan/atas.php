<?php
defined('BASEPATH') or exit('No direct script access allowed');
$setting = $this->db->get('setting');
$row = $setting->row();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta name="description" content="<?php echo $row->web; ?>">
  <meta name="author" content="<?php echo $row->web; ?>">
  <meta name="generator" content="<?php echo $row->web; ?>">
  <title><?php echo $row->web ?></title>
  <link rel="apple-touch-icon" href="image/<?php echo $row->logo ?>" sizes="180x180">
  <link rel="icon" href="image/<?php echo $row->logo ?>" sizes="32x32" type="image/png">
  <link rel="icon" href="image/<?php echo $row->logo ?>" sizes="16x16" type="image/png">
  <link rel="mask-icon" href="image/<?php echo $row->logo ?>" color="#563d7c">
  <link rel="icon" href="image/<?php echo $row->logo ?>">
  <!-- Favicons -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="frontend/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="frontend/vendor/aos/aos.css" rel="stylesheet">
  <link href="frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="assets/js/app.min.js"></script>
  <!-- Template Main CSS File -->
  <link rel="stylesheet" type="text/css" href="plugin/sweetalert2.min.css">
  <script src="plugin/sweetalert2.all.min.js"></script>
  <link href="frontend/css/desa.css" rel="stylesheet">
  <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f964082dcc7c50019f9d475&product=sop' async='async'></script>


  <script src="plugin/bootstrapdatepicker/bootstrap-datepicker.js"></script>

  <link rel="stylesheet" type="text/css" href="plugin/bootstrapdatepicker/bootstrap-datepicker.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <!-- Leaflet Draw -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

  <link rel="stylesheet" href="plugin/MarkerCluster.css" />
  <link rel="stylesheet" href="plugin/MarkerCluster.Default.css" />
  <script src="plugin/leaflet.markercluster-src.js"></script>

  <link rel="stylesheet" href="plugin/css/styledLayerControl.css" />
  <script src="plugin/src/styledLayerControl.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <!-- <script src="https://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyBXTXgQ7wZPndgKZilAsFVZjT5YWMr9WFs"></script> -->

  <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
  <!-- end -->
  <link rel="stylesheet" href="plugin/maps.css">
  <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
  <!-- Template CSS -->
  <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
  <!-- <link rel="stylesheet" href="assets/css/components.css"> -->
  <link rel="stylesheet" href="plugin/dist/Control.MiniMap.min.css" />
  <script src="plugin/dist/Control.MiniMap.min.js" type="text/javascript"></script>
  <!-- <link rel="stylesheet" type="text/css" href="src/leaflet.css"/> -->
  <link rel="stylesheet" type="text/css" href="src/L.Control.ZoomBar.css" />

  <!-- <script type="text/javascript" src="src/leaflet.js"></script> -->
  <script type="text/javascript" src="src/L.Control.ZoomBar.js"></script>
  <script type="text/javascript" src="plugin/dist/Leaflet.Coordinates-0.1.5.min.js"></script>
  <link rel="stylesheet" href="plugin/dist/Leaflet.Coordinates-0.1.5.css" />
  <link rel="stylesheet" href="plugin/dist/L.Control.Locate.min.css" />
  <script src="plugin/src/L.Control.Locate.js"></script>
  <script src="plugin/src/leaflet-compass.js"></script>
  <script src='plugin/Leaflet.LocationShare.js'></script>
  <link rel="stylesheet" href="plugin/src/leaflet-compass.css" />
  <script src="plugin/L.Control.Window.js"></script>
  <link rel="stylesheet" href="plugin/L.Control.Window.css" />
  <script src="plugin/dist/Control.FullScreen.js"></script>
  <link rel="stylesheet" href="plugin/dist/Control.FullScreen.css" />
  <script src="plugin/src/Control.GlobeMiniMap.js"></script>
  <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
  <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <script src="plugin/jquery.inputmask.bundle.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="home/index"><img class="img img-fluid " src="image/<?php echo $row->logo ?>" alt="" width=""> <?php echo $row->web ?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="frontend/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="layanan/index" class="<?php if ($this->uri->segment(2) == 'index') echo 'active' ?>">Beranda</a></li>
          <li><a href="layanan/pengaduan" class="<?php if ($this->uri->segment(2) == 'pengaduan') echo 'active' ?>">Pengaduan</a></li>
          <li><a href="layanan/logout" class="logout">Logout</a></li>
          <li><a>Hai, <?php echo $this->session->userdata("nama") ?></a></li>


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="<?php echo $row->email ?>" class="twitter"><i class="bu bi-envelope"></i></a>
        <a href="<?php echo $row->email ?>" class="facebook"><i class="bu bi-facebook"></i></a>
        <a href="<?php echo $row->email ?>" class="instagram"><i class="bu bi-instagram"></i></a>
        <a href="<?php echo $row->email ?>" class="linkedin"><i class="bu bi-youtube"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->