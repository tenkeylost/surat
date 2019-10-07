<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card bg-c-yellow update-card">
                <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">
                      <h4 class="text-white"><?= $masuk ?></h4>
                      <h6 class="text-white m-b-0">Surat Masuk</h6>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-1" height="50"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-c-green update-card">
                <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">
                      <h4 class="text-white"><?= $keluar ?></h4>
                      <h6 class="text-white m-b-0">Surat Kelaur</h6>
                    </div>
                    <div class="col-4 text-right">
                      <canvas id="update-chart-2" height="50"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-c-pink update-card">
                <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">
                      <h4 class="text-white"><?= $perintah ?></h4>
                      <h6 class="text-white m-b-0">Surat Perintah</h6>
                    </div>
                    <div class="col-4 text-right">
                      <canvas id="update-chart-3" height="50"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-c-lite-green update-card">
                <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">
                      <h4 class="text-white"><?= $pegawai ?></h4>
                      <h6 class="text-white m-b-0">Pegawai</h6>
                    </div>
                    <div class="col-4 text-right">
                      <canvas id="update-chart-4" height="50"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>      
      </div>
      <div id="styleSelector"></div>
      </div>
    </div>
  </div>
</div>