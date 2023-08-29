<?php 

$slider  = $this->db->get('slider')->row();
?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-header bg-info text-light">
    Form Setting Slider
  </div>
            <div class="card-body table-responsive">
            <form action="main/updateslider" id="save" method="post" enctype="multipart/form-data">

             <table class="table">
               <tr>
                 <td>Gambar / Foto 1</td>
                 <td>
                   <img src="image/<?php echo $slider->gambar1 ?>" class="img img-thumbnail mb-3" width="120" alt="">
                 <input type="file" value="" placeholder="Judul Event" class="form-control mb-3" name="gambar1">
                 </td>
                 <td>Judul / Keterangan 1</td>
                 <td>
                   <input type="text" value="<?php echo $slider->judul1 ?>" class="form-control mb-3" name="judul1">
                 </td>
               </tr>
               <tr>
                 <td>Gambar / Foto 2</td>
                 <td>
                 <img src="image/<?php echo $slider->gambar2 ?>" class="img img-thumbnail mb-3" width="120" alt="">

                 <input type="file" placeholder="Judul Event" class="form-control mb-3" name="gambar2">
                 </td>
                 <td>Judul / Keterangan2</td>
                 <td>
                   <input type="text" value="<?php echo $slider->judul2 ?>" class="form-control mb-3" name="judul2">
                 </td>
               </tr>
               <tr>
                 <td>Gambar / Foto 3</td>
                 <td>
                 <img src="image/<?php echo $slider->gambar3 ?>" class="img img-thumbnail mb-3" width="120" alt="">

                 <input type="file" placeholder="" class="form-control mb-3" name="gambar3">
                 </td>
                 <td>Judul / Keterangan3</td>
                 <td>
                   <input type="text" value="<?php echo $slider->judul3 ?>" class="form-control mb-3" name="judul3">
                 </td>
               </tr>
               <tr>
                 <td colspan="4">
                   <button type="submit" class="btn btn-primary w-100"><i class="fa fa-paper-plane"></i> Simpan</button>
                 </td>
               </tr>
             </table>
              </form>
            </div>
          </div>
          </div>
        </section>
        
      </div>
<script>
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
                    text: "Data slider berhasil diperbarui!",
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
              alert("Ada kesalahan sistem");
            }
        });
    });
</script>
