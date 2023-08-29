<?php

    $setting = $this->db->get('setting')->row();
    
?>
<footer class="main-footer">
        <div class="footer-left">
            <?php echo $setting->web ?>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  
</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
</html>


<script>
  $('.uang').inputmask("numeric", {
        removeMaskOnSubmit: true,
        radixPoint: ".",
        groupSeparator: ",",
        digits: 2,
        autoGroup: true,
        rightAlign: false,
      });
      $(document).ready(function(){
   $('.select2').select2();
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
</script>