<body class="fix-menu">
  <div class="theme-loader">
    <div class="ball-scale">
      <div class='contain'>
        <div class="ring">
          <div class="frame"></div>
        </div>
      </div>
    </div>
  </div>

  <section class="login-block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <form method="POST" action="<?= base_url('DoLogin')?>" class="md-float-material form-material">
            <div class="text-center">
              <img src="<?= base_url('assets/images/bnnk.jpg')?>" width="15%" alt="logo.png">
            </div>
            <div class="auth-box card">
              <div class="card-block">
                <div class="row m-b-20">
                  <div class="col-md-12">
                    <h3 class="text-center">Login</h3>
                  </div>
                </div>
                <div class="form-group form-primary">
                  <input type="text" name="username" class="form-control" required="" placeholder="Username">
                  <span class="form-bar"></span>
                </div>
                <div class="form-group form-primary">
                  <input type="password" name="password" class="form-control" required="" placeholder="Password">
                  <span class="form-bar"></span>
                </div>
                <div class="row m-t-30">
                  <div class="col-md-12">
                    <input type="submit" name="loginSubmit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20" value="Login">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>