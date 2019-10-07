
<body>
<div class="theme-loader">
  <div class="ball-scale">
    <div class='contain'>
      <div class="ring">
        <div class="frame"></div>
      </div>
    </div>
  </div>
</div>
<div id="pcoded" class="pcoded">
  <div class="pcoded-overlay-box"></div>
  <div class="pcoded-container navbar-wrapper">
    <nav class="navbar header-navbar pcoded-header">
      <div class="navbar-wrapper">
        <div class="navbar-logo">
          <a class="mobile-menu" id="mobile-collapse" href="#!">
            <i class="feather icon-menu"></i>
          </a>
          <a href="index-1.htm">
            <img class="img-fluid" src="<?= base_url('assets/images/favicon.ico') ?>" alt="Theme-Logo">
            <!-- <strong>APLIKASI SURAT BNN KAB.BLITAR</strong> -->
          </a>
          <a class="mobile-options">
            <i class="feather icon-more-horizontal"></i>
          </a>
        </div>
        <div class="navbar-container container-fluid">
          <ul class="nav-left">
            <li class="header-search">
              <div class="main-search morphsearch-search">
                <div class="input-group">
                  <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                  <input type="text" class="form-control">
                  <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                </div>
              </div>
            </li>
          </ul>
          <ul class="nav-right">
            <li class="user-profile header-notification">
              <div class="dropdown-primary dropdown">
                <div class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url('assets/images/avatar-4.jpg') ?>" class="img-radius" alt="User-Profile-Image">
                  <span><?= $user['username'] ?></span>
                  <i class="feather icon-chevron-down"></i>
                </div>
                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                  <li>
                    <a href="#!">
                      <i class="feather icon-settings"></i> Settings
                    </a>
                  </li>
                  <li>
                    <a href="user-profile.htm">
                      <i class="feather icon-user"></i> Profile
                    </a>
                  </li>
                  <li>
                    <a href="email-inbox.htm">
                      <i class="feather icon-mail"></i> My Messages
                    </a>
                  </li>
                  <li>
                    <a href="auth-lock-screen.htm">
                      <i class="feather icon-lock"></i> Lock Screen
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url('logout')?>">
                      <i class="feather icon-log-out"></i> Logout
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="pcoded-main-container">
      <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
          <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigatio-lavel">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
              <li class="active">
                <a href="<?= base_url()?>">
                  <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                  <span class="pcoded-mtext">Dashboard</span>
                </a>
              </li>
              <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                  <span class="pcoded-micon"><i class="typcn typcn-messages"></i></span>
                  <span class="pcoded-mtext">Surat Masuk</span>
                  <span class="pcoded-badge label label-warning"><?= $masuk ?></span>
                </a>
                <ul class="pcoded-submenu">
                  <li class=" ">
                    <a href="<?= base_url('surat-masuk')?>" target="_blank">
                      <span class="pcoded-mtext">Arsip</span>
                    </a>
                  </li>
                  <li class=" ">
                    <a href="<?= base_url('input-surat-masuk')?>" target="_blank">
                      <span class="pcoded-mtext">Input</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                  <span class="pcoded-micon"><i class="typcn typcn-messages"></i></span>
                  <span class="pcoded-mtext">Surat Keluar</span>
                  <span class="pcoded-badge label label-success"><?= $keluar ?></span>
                </a>
                <ul class="pcoded-submenu">
                  <li class=" ">
                    <a href="<?= base_url('surat-keluar')?>" target="_blank">
                      <span class="pcoded-mtext">Arsip</span>
                    </a>
                  </li>
                  <li class=" ">
                    <a href="<?= base_url('input-surat-keluar')?>" target="_blank">
                      <span class="pcoded-mtext">Input</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                  <span class="pcoded-micon"><i class="typcn typcn-messages"></i></span>
                  <span class="pcoded-mtext">Surat Perintah</span>
                  <span class="pcoded-badge label label-danger"><?= $perintah ?></span>
                </a>
                <ul class="pcoded-submenu">
                  <li class=" ">
                    <a href="<?= base_url('surat-perintah')?>" target="_blank">
                      <span class="pcoded-mtext">Arsip</span>
                    </a>
                  </li>
                  <li class=" ">
                    <a href="<?= base_url('input-surat-perintah')?>" target="_blank">
                      <span class="pcoded-mtext">Input</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                  <span class="pcoded-micon"><i class="typcn typcn-user"></i></span>
                  <span class="pcoded-mtext">Pegawai</span>
                  <span class="pcoded-badge label label-info"><?= $pegawai ?></span>
                </a>
                <ul class="pcoded-submenu">
                  <li class=" ">
                    <a href="<?= base_url('pegawai')?>" target="_blank">
                      <span class="pcoded-mtext">Arsip</span>
                    </a>
                  </li>
                  <li class=" ">
                    <a href="<?= base_url('add-pegawai')?>" target="_blank">
                      <span class="pcoded-mtext">Input</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                  <span class="pcoded-micon"><i class="typcn typcn-user"></i></span>
                  <span class="pcoded-mtext">Users</span>
                  <!-- <span class="pcoded-badge label label-info"><?= $pegawai ?></span> -->
                </a>
                <ul class="pcoded-submenu">
                  <li class=" ">
                    <a href="<?= base_url('users')?>" target="_blank">
                      <span class="pcoded-mtext">Arsip</span>
                    </a>
                  </li>
                  <li class=" ">
                    <a href="<?= base_url('add-users')?>" target="_blank">
                      <span class="pcoded-mtext">Input</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>