<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
          <!-- Page-header start -->
          <div class="page-header">
            <div class="row align-items-end">
              <div class="col-lg-8">
                <div class="page-header-title">
                  <div class="d-inline">
                    <h4><?= $titel ?></h4>
                    <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                  <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                      <a href="<?= base_url() ?>"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('surat-masuk')?>"><?= $titel ?></a>
                    <!-- </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('input-surat-masuk')?>">Input</a>
                    </li> -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Page-header end -->
          <!-- Zero config.table start -->
          <div class="card">
            <div class="card-block">
              <div class="dt-responsive table-responsive">
                <table id="simpletable" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tahun</th>
                      <th>Tgl. Surat</th>
                      <th>No. Surat</th>
                      <th>Dari</th>
                      <th>Status</th>
                      <th style="width: 30%">&nbsp;</th>
                  </thead>
                  <tbody>
                    <?php $no = $this->uri->segment(3) + 1;
                    foreach ($surat->result_array() as $key => $value) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value['tahun_sm']; ?></td>
                        <td><?php echo $value['tgl_sm']; ?></td>
                        <td><?php echo $value['no_sm']; ?></td>
                        <td><?php echo $value['dari']; ?></td>
                        <td><?php echo $value['diterima']; ?></td>
                        <td>
                          <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>detail-surat-masuk/<?php echo $value['id_sm']; ?>"> Detail</a>
                          <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>edit-surat-masuk/<?php echo $value['id_sm']; ?>"> Edit</a>
                          <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>edit-lampiran-surat-masuk/<?php echo $value['id_sm']; ?>"> Edit Lampiran</a>
                          <?php if ($this->session->userdata('userlvl') == '1' || $this->session->userdata('userlvl') == '2') { ?>
                            <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>disposisi-surat-masuk/<?php echo $value['id_sm']; ?>">Disposisi</a>
                            <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>edit-lampiran-disposisi-surat-masuk/<?php echo $value['id_sm']; ?>">Lampiran Disposisi</a>
                            <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>DoDeleteSM/<?php echo $value['id_sm']; ?>"> Delete</a>
                          <?php } ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Zero config.table end -->
        </div>
      </div>
      <div id="styleSelector"></div>
    </div>
  </div>
</div>