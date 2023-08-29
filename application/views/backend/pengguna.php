<?php $this->load->view("backend/atas") ?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
                <div class="card-header text-light bg-info">
                    Data Pengguna
                </div>
                <div class="card-body table-responsive">
                    <div id="load"></div>
                </div>
                </div>
          </div>
        </section>
        
      </div>

<script>
    $("#load").load("main/loadpengguna");
</script>
      <?php $this->load->view("backend/bawah") ?>