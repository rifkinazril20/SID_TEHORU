<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$setting = $this->db->get('setting');
$row = $setting->row();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="<?php echo base_url() ?>">
<meta name="description" content="<?php echo $row->web; ?>">
	<meta name="author" content="<?php echo $row->web; ?>">
	<meta name="generator" content="<?php echo $row->web; ?>">
  <title><?php echo $row->web ?></title><!-- Meta tag Keywords -->
    <link rel="apple-touch-icon" href="image/<?php echo $row->logo ?>" sizes="180x180">
	<link rel="icon" href="image/<?php echo $row->logo ?>" sizes="32x32" type="image/png">
	<link rel="icon" href="image/<?php echo $row->logo ?>" sizes="16x16" type="image/png">
	<link rel="mask-icon" href="image/<?php echo $row->logo ?>" color="#563d7c">
	<link rel="icon" href="image/<?php echo $row->logo ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Report Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="login/css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <link rel="stylesheet" href="login/css/font-awesome.min.css" type="text/css" media="all">
	<script src="assets/js/app.min.js"></script>
    <script src="plugin/sweetalert2.all.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="plugin/sweetalert2.min.css">

</head>

<body>

    <!-- form section start -->
    <section class="w3l-hotair-form">
        <h1></h1>
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-hotair">
                    <div class="content-wthree">
                        <h2>Login <?php echo $row->web ?></h2>
                        <form action="welcome/cekid" id="masuk" method="post">
                            <input type="text" autocomplete="off" class="text" name="username" placeholder="User Name" required="" autofocus>
                            <input type="password" class="password" name="password" placeholder="User Password" required="" autofocus>
                            <button class="btn" type="submit">Log In</button>
                        </form>
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
					  'Incorrect username or password!',
					  'warning'
					)
				}else{
					window.location=dt
				}
			  }
			});
		});
		});
	</script>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="login/images/1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
        <!-- copyright-->
        <div class="copyright text-center">
            <p class="copy-footer-29">© <?php echo date('Y') ?> <?php echo $row->web ?> All rights reserved </p>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->
</body>

</html>