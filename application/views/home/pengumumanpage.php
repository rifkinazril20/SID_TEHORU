
<?php 
    $setting = $this->db->get('setting')->row();
    

?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Pengumuman</h2>
      <ol>
        <li><a href="home/index">Home</a></li>
        <li><a href="home/pengumuman">Pengumuman  <?php echo $setting->web ?></a></li>
        <li>Pengumuman</li>
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
            <img src="image/<?php echo $image; ?>" class="img img-thumbnail img-fluid" alt="">

            <!-- <img src="" alt="" class="img-fluid"> -->
          </div>

          <h2 class="entry-title">
            <a href="home/detailakomodasi/<?php echo $slug ?>"><?php echo $judul ?></a>
          </h2>

          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="home/detailakomodasi/<?php echo $slug ?>"><?php echo $view ?> Views</a></li>
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="home/detailakomodasi/<?php echo $slug ?>"><?php echo $nama ?></a></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="home/detailakomodasi/<?php echo $slug ?>"><time datetime="2020-01-01"><?php echo date("d F Y",strtotime($date)) ?></time></a></li>
            </ul>
          </div>

          <div class="entry-content">
  
            
            <p>
                <?php echo $ket ?>
            </p>


            <!-- <div class="sharethis-inline-follow-buttons"></div> -->
            <div class="sharethis-inline-reaction-buttons"></div>

          </div>


        </article><!-- End blog entry -->
      
        <div class="blog-comments">

        

        </div><!-- End blog comments -->

      </div><!-- End blog entries list -->

      <div class="col-lg-4">

        <div class="sidebar">
        <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="home/searchPengumuman" method="get">
                  <input type="text" name="keyword" autocomplete="off">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->


              <h3 class="sidebar-title">Pengumuman Yang Akan Datang</h3>
              <div class="sidebar-item recent-posts">
              <?php 
                foreach($populer as $z){
              ?>
                <div class="post-item clearfix">
                  <img src="image/<?php echo $z->gambar ?>" alt="">
                  <h4><a href="home/pengumumanpage/<?php echo $z->slug ?>"><?php echo $z->judul ?></a></h4>
                  <time datetime="2020-01-01"><?php echo date("d F Y",strtotime($z->date)) ?></time>
                </div>
            <?php }  ?>

              </div><!-- End sidebar recent posts-->
            

        </div><!-- End sidebar -->

      </div><!-- End blog sidebar -->

    </div>

  </div>
</section><!-- End Detail Akomodasi  Section -->

</main><!-- End #main -->

