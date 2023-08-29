<?php
defined('BASEPATH') or exit('No direct script access allowed');
$setting = $this->db->get('setting');
$row = $setting->row();
?>

<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="description" content="<?php echo $row->web; ?>">
  <meta name="author" content="<?php echo $row->web; ?>">
  <meta name="generator" content="<?php echo $row->web; ?>">
  <title><?php echo $row->web ?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <script src="assets/js/app.min.js"></script>
  <script src="plugin/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plugin/sweetalert2.min.css">
  <link rel="stylesheet" href="plugin/dttable/css/dataTables.bootstrap4.min.css" type="text/css" media="" />
  <script type="text/javascript" language="javascript" src="plugin/dttable/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="plugin/dttable/js/dataTables.bootstrap4.min.js"></script>
  <link rel="apple-touch-icon" href="image/<?php echo $row->logo ?>" sizes="180x180">
  <link rel="icon" href="image/<?php echo $row->logo ?>" sizes="32x32" type="image/png">
  <link rel="icon" href="image/<?php echo $row->logo ?>" sizes="16x16" type="image/png">
  <link rel="mask-icon" href="image/<?php echo $row->logo ?>" color="#563d7c">
  <link rel="icon" href="image/<?php echo $row->logo ?>">
  <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
  <script src="plugin/jquery.inputmask.bundle.js"></script>
  <script src="plugin/bootstrapdatepicker/bootstrap-datepicker.js"></script>

  <link rel="stylesheet" type="text/css" href="plugin/bootstrapdatepicker/bootstrap-datepicker.css">
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <!-- Leaflet Draw -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
  <script src="plugin/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <link rel="stylesheet" href="plugin/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

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
  <link rel="stylesheet" href="plugin/dist/Control.MiniMap.min.css" />
  <script src="plugin/dist/Control.MiniMap.min.js" type="text/javascript"></script>
  <!-- <link rel="stylesheet" type="text/css" href="src/leaflet.css"/> -->
  <link rel="stylesheet" type="text/css" href="src/L.Control.ZoomBar.css" />

  <script src="plugin/angular.min.js"></script>
  <link rel="stylesheet" href="plugin/css/styledLayerControl.css" />
  <script src="plugin/src/styledLayerControl.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script src="https://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyBXTXgQ7wZPndgKZilAsFVZjT5YWMr9WFs"></script>

  <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
  <link rel="stylesheet" href="<?= base_url('assets/leaflet-compass.css') ?>" />
  <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
  <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/bundles/chartjs/chart.min.js"></script>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg bg-blue main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>

          </ul>
        </div>
        <ul class="navbar-nav navbar-right">


          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="plugin/pria.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $this->session->userdata('nama') ?></div>
              <div class="dropdown-divider"></div>
              <a href="welcome/logout" onclick="return confirm('Yakin ingin logout?')" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="main/index"> <img alt="image" src="image/<?php echo $row->logo ?>" class="header-logo" /> <span class="logo-name"><?php echo $row->web ?></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <?php if ($this->session->userdata("level") == "1") { ?>
              <li class="dropdown">
                <a href="main/index" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
              </li>
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Penduduk</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="main/penduduk">Data penduduk</a></li>
                  <li><a class="nav-link" href="main/pendudukaktif">Data penduduk Aktif</a></li>
                  <li><a class="nav-link" href="main/pendudukbelumaktif">Data penduduk Belum Aktif</a></li>
                  <li><a class="nav-link" href="main/addpenduduk">Input penduduk</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="edit"></i><span>Profile Desa</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="main/wilayah">Wilayah</a></li>
                  <li><a class="nav-link" href="main/sejarah">Sejarah</a></li>
                  <li><a class="nav-link" href="main/visimisi">Visi & Misi</a></li>
                </ul>
              </li>

              <!-- <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="bookmark"></i><span>Lembaga Masyarakat</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">LPMD</a></li>
                <li><a class="nav-link" href="main/">RT / RW</a></li>
                <li><a class="nav-link" href="main/">Karang Taruna</a></li>
                <li><a class="nav-link" href="main/">PKK</a></li>
                <li><a class="nav-link" href="main/">LIMNAS</a></li>
              </ul>
            </li> -->
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Galeri</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="main/galeri">Data Galeri</a></li>
                  <li><a class="nav-link" href="main/inputgaleri">Input Galeri</a></li>
                </ul>
              </li>
              <!--             
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="flag"></i><span>Layanan Publik</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="main/suratonline">Surat Online</a></li>
              </ul>
            </li> -->




              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="archive"></i><span>Lainnya</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="main/event"> Agenda</a></li>
                  <li><a class="nav-link" href="main/pengumuman"> Pengumuman</a></li>


                </ul>
              </li>




              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="folder"></i><span>E-Complaint</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="main/kategorikomplain"> Category Complaint</a></li>
                  <li><a class="nav-link" href="main/komplain">Complaint</a></li>
                  <li><a class="nav-link" href="main/respon"> Response</a></li>
                  <li><a class="nav-link" href="main/selesai"> Complaint Completed</a></li>
                  <li><a class="nav-link" href="main/laporanpengaduan"> Laporan</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Berita / Artikel</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="main/kategori">Kategori</a></li>
                  <li><a class="nav-link" href="main/berita">Data Berita</a></li>
                  <li><a class="nav-link" href="main/inputberita">Input Berita</a></li>
                  <li><a class="nav-link" href="main/komentarberita">Komentar Berita</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="settings"></i><span>Settings</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="main/settingweb"> Setting Website</a></li>
                  <li><a class="nav-link" href="main/settingtitiklokasi"> Setting Titik Lokasi</a></li>
                  <li><a class="nav-link" href="main/settingslider"> Setting Slider</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Data Pengguna</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="main/pengguna">Data Pengguna</a></li>
                  <li><a class="nav-link" href="main/inputpengguna">Input pengguna baru</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="welcome/logout" onclick="return confirm('Yakin ingin logout?')" class="nav-link"><i data-feather="log-out"></i><span>Logout</span></a>
              </li>
            <?php } else { ?>
              <li class="dropdown">
                <a href="main/index" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
              </li>

              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="archive"></i><span>Lainnya</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="main/event"> Agenda</a></li>
                  <li><a class="nav-link" href="main/pengumuman"> Pengumuman</a></li>
                  <li><a class="nav-link" href="main/produkwarga"> Produk Warga</a></li>
                  <li><a class="nav-link" href="main/produkbumdes"> Produk Bumdes</a></li>
                </ul>
              </li>


              <li class="dropdown">
                <a href="welcome/logout" onclick="return confirm('Yakin ingin logout?')" class="nav-link"><i data-feather="log-out"></i><span>Logout</span></a>
              </li>
            <?php } ?>
          </ul>
        </aside>
      </div>