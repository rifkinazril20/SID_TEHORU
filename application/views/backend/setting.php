
<?php
$query  = $this->db->query("select * from setting");
    $row = $query->row();
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="row">
                <div class="col-lg-5">
                <div class="card">
            <div class="card-header bg-info text-light">
            Setting Logo Website 
            </div>
            <div class="card-body table-responsive">
              
            <form action="main/setlogo" id="save" method="post" enctype="multipart/form-data">
<div class="table-responsive">
<table class='table table-sm'>
	
	<tr>
                  <td colspan="4">
                  <center>             <img id="blah" class='img img-fluid mb-3' width='280' src="image/<?php echo $row->logo ?>" alt="your image" /></center>
                              <input type="file"  name="gambar" class="form-control mb-3"  onchange="readURL(this);"  aria-describedby="inputGroupFileAddon01">
                              <span class="badge badge-warning"><strong>Informasi</strong> Input Gambar Hanya Bisa Bertype JPG,JPEG,PNG Dan Maksimal 2mb !</span> 

                  </td>
                </tr>
	
	<tr>
		<td></td>
		<td><input type="submit" class='btn btn-primary' name="save" value="SIMPAN" /></td>	
	</tr>
</table>
</div>
</form>

            </div>
            </div>
            

            
                </div>

                <div class="col-lg-7">
                <div class="card">
            <div class="card-header bg-info text-light">
            Setting Website
            </div>
            <div class="card-body table-responsive">
              
<form method="post" id="setting" action="main/updatesetting/">
<div id="notif"></div>
<div class="table-responsive">
<table class='table table-sm'>
	
	<tr>
		<td>Nama Website</td>
		<td>
            <div class="form-group">
              <input type="text"
                class="form-control" name="a" value="<?php echo $row->web ?>" id="" aria-describedby="helpId" placeholder="">
            </div>
        </td>
	</tr>
	<tr>
		<td>Keywords</td>
		<td>
            <div class="form-group">
              <input type="text"
                class="form-control" name="b" value="<?php echo $row->keyword ?>" id="" aria-describedby="helpId" placeholder="">
            </div>
        </td>
	</tr>
	<tr>
		<td>Nomor Telepon</td>
		<td>
            <div class="form-group">
              <input type="text"
                class="form-control" name="c" value="<?php echo $row->telp ?>" id="" aria-describedby="helpId" placeholder="">
            </div>
        </td>
	</tr>
	<tr>
		<td>Alamat Email</td>
		<td>
            <div class="form-group">
              <input type="text"
                class="form-control" name="d" value="<?php echo $row->email ?>" id="" aria-describedby="helpId" placeholder="">
            </div>
        </td>
	</tr>
	<tr>
		<td>URL Youtube</td>
		<td>
            <div class="form-group">
              <input type="text"
                class="form-control" name="e" value="<?php echo $row->yt ?>" id="" aria-describedby="helpId" placeholder="">
            </div>
        </td>
	</tr>
	<tr>
		<td>URL Facebook</td>
		<td>
            <div class="form-group">
              <input type="text"
                class="form-control" name="f" value="<?php echo $row->fb ?>" id="" aria-describedby="helpId" placeholder="">
            </div>
        </td>
	</tr>
	<tr>
		<td>URL Instagram</td>
		<td>
            <div class="form-group">
              <input type="text"
                class="form-control" name="g" value="<?php echo $row->ig ?>" id="" aria-describedby="helpId" placeholder="">
            </div>
        </td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>
            <div class="form-group">
                <textarea name="h" id="" cols="30" rows="2" class="form-control"><?php echo $row->alamat ?></textarea>
            </div>
        </td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" class='btn btn-primary' name="save" value="SIMPAN" /></td>	
	</tr>
</table>
</div>
</form>

            </div>
            </div>
            
                </div>
            </div>
            <!--  -->
          </div>
        </section>
        
      </div>
   
<script type="text/javascript">
	//<![CDATA[
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#save").on("submit",function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function (response) {
                Swal.fire({
                    title: "Informasi",
                    text: "Berhasil mengubah logo website!",
                    icon: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        window.location.reload();
                    })
            },
            error : function (e){
                alert(
                    "Ada kesalahan sistem"
                )
            }
        });
    });
	$("#setting").on('submit',function(e){
				e.preventDefault();
					$.ajax({
						url:  $(this).attr('action'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){	
							$(".bersih").val('');
                            $("#notif").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Informasi</strong> Berhasil Setting Website !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						},
						error: function(dt){
							alert("Ada kesalahan sistem");
						},
					});//end of ajax()
				}); 
	//]]>
</script>
