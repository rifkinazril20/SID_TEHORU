
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
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
      <div class="section-title" data-aos="fade-up">
          <h2>Login Pengaduan Online</h2>
        </div>

        <div class="card">
  <div class="card-header text-light bg-info">
    Jika Tidak Punya Akun Silahkan Daftarkan Diri Anda Tersebut!
  </div>
  <div class="card-body table-responsive">
    <form action="home/login" id="masuk" method="post">
        <table class="table">
            <tr>
                <td>Nik</td>
                <td>
                    <input type="number" autocomplete="off" class="form-control" name="nik" placeholder="Masukan dengan benar NIK anda agar bisa login...">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="reset" class="btn btn-warning">Batal</button>
                    <button type="submit" class="btn btn-success">Login</button>
                </td>
            </tr>
        </table>
    </form>
    <a href="home//daftar" class="">Daftar Akun</a>
  </div>
</div>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->
  <script type="text/javascript">
	$(document).ready(function()
	{
		$("#masuk").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'NIK anda salah atau akun anda belum diaktifkan oleh admin!',
					  'error'
					)
				}else{
					window.location=dt
				}
			  }
			});
		});
		});
	</script>