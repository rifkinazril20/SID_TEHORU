<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$setting = $this->db->get('setting');
$row = $setting->row();
?>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3><?php echo $row->web ?></h3>
            <p>
              <?php echo $row->alamat ?> <br>
              <strong>Phone:</strong><?php echo $row->telp ?><br>
              <strong>Email:</strong> <?php echo $row->email ?><br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Wilayah</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sejarah Desa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Visi & Misi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">BPD</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Galeri</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Surat Online</a></li> -->
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pengaduan Online</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Berita</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Agenda</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span><?php echo $row->web ?></span></strong>. All Rights Reserved
        </div>
   
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="<?php echo $row->fb ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="<?php echo $row->ig ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="<?php echo $row->yt ?>" class="google-plus"><i class="bx bxl-youtube"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="frontend/vendor/aos/aos.js"></script>
  <script src="frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="frontend/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="frontend/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="frontend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="frontend/js/main.js"></script>

</body>

</html>

<script>
 
      $(document).ready(function(){
   $('.tgl').datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				//startView: 2,
				todayBtn: true,
				todayHighlight: true,
				clearBtn: true,
				language: 'id',
			});
    });
      $('.tahun').datepicker({
				format: 'yyyy',
				autoclose: true,
				//startView: 2,
        viewMode: "years",
        minViewMode: "years",
				todayBtn: true,
				todayHighlight: true,
				clearBtn: true,
				language: 'id',
			});
            $('.logout').on('click', function(e) {
		const href = $(this).attr('href');
		e.preventDefault();
			Swal.fire({
				title: 'Informasi',
				text: "Anda Yakin Ingin Logout?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yaa'
				}).then((result) => {
				if (result.value) {
					document.location.href = href;
				}
			})
		});
</script>