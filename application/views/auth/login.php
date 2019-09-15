<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="author" content="fajarsubhan">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css') ?>" type="text/css">
  <!-- Login CSS -->
  <link rel="stylesheet" href="<?php echo base_url('asset/css/login.css') ?>" type="text/css">
  <!-- Custom All CSS -->
  <link rel="stylesheet" href="<?php echo base_url('asset/css/custom_all.css') ?>" type="text/css">
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="<?php echo base_url('asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>" type="text/css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('asset/images/cars.png') ?>" type="image/ico">

  <style>
    /* URL background image jangan lupa di ganti */
    body {
      background-image: url('http://localhost/rental_mobil/asset/images/background-login.jpg');
      background-size: cover;
    }
  </style>

  <title><?php echo $title ?></title>
</head>

<body>

  <div class="container login">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="login1 text-white font-weight-bold">Aplikasi Rental Mobil</h3>
        <h4 class="login2 mt-4 text-white font-weight-bold">Login</h4>
        <br>
        <div class="col-lg-5 m-auto">
          <?php echo $this->session->userdata('belum_login') ?>
          <?php echo $this->session->userdata('logout') ?>
          <?php echo $this->session->userdata('session') ?>
        </div>
        <?php echo form_open('Auth/login_proses') ?>
        <div class="card m-auto" style="width:27rem;">
          <div class="card-body p-5">
            <!-- Username -->
            <div class="form-group">
              <div class="input-group-prepend mb-1">
                <div class="input-group-text">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <input type="text" name="admin_username" class="form-control" placeholder="username">
              </div>
              <?php echo form_error('admin_username') ?>
              <?php if (isset($_GET["pesan1"]) == "username tidak sessuai") {
                echo "<div class='alert alert-danger'>Username tidak sessuai</div>";
              } ?>
            </div>
            <!-- Password -->
            <div class="form-group">
              <div class="input-group-prepend mb-1">
                <div class="input-group-text">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                </div>
                <input type="password" name="admin_password" autocomplete="off" class="form-control" placeholder="password">
              </div>
              <?php echo form_error('admin_password') ?>
              <?php if (isset($_GET["pesan2"]) == "Password tidak sessuai") {
                echo "<div class='alert alert-danger'>Password tidak sesuai</div>";
              } ?>
            </div>
            <!-- Submit -->
            <input type="submit" name="submit" value="Login" class="btn btn-success">
          </div>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
  <!-- Jquery  JS-->
  <script src="<?php echo base_url('asset/js/jquery-3.3.1.min.js') ?>" type="text/javascript"></script>
  <!-- Boostrstrap JS -->
  <script src="<?php echo base_url('asset/js/bootstrap.min.js') ?>" type="text/javascript"></script>
</body>

</html>