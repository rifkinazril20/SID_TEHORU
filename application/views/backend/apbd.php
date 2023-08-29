 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header  bg-blue">
                    <h4 class="text-light">Manual Input Anggaran dan Realisasi APBDes</h4>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                          aria-controls="home" aria-selected="true">Pendapatan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                          aria-controls="profile" aria-selected="false">Belanja</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                          aria-controls="contact" aria-selected="false">Pembiayaan</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div id="pendapatan"></div>
                    </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div id="belanja"></div>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div id="biaya"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!--  -->
          </div>
        </section>
     
      </div>
     <script>
       $("#pendapatan").load("main/loadpendapatan");
       $("#belanja").load("main/loadbelanja");
       $("#biaya").load("main/loadbiaya");
     </script>