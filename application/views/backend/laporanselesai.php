 <!-- Main Content -->
 
<?php 
 
 $label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
 for($bulan = 1;$bulan < 13;$bulan++)
 {
   // $query = mysqli_query($koneksi,"select sum(jumlah) as jumlah from tb_penjualan where MONTH(tgl_penjualan)='$bulan'");
   $query = $this->db->query("select *,count(*) as jml from pengaduan where MONTH(date)='$bulan'")->result();
   foreach($query as $query){
     $jml[] = $query->jml;
   }
   // $row = $query->fetch_array();
   // $jumlah_produk[] = $row['jumlah'];
 }  
?>
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
 
        <div class="card">
            <div class="card-header bg-blue text-light">
              Grafik Pengaduan
            </div>
            <div class="card-body table-responsive">
            <div  class="text-center">
		<canvas style="width: 600px; height: 405px;" id="myChart"></canvas>
	</div>
            </div>
            </div>
       



          </div>
        </section>
     
      </div>
      <script>
   	var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Grafik Pengaduan Perbulan',
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
     </script>