<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Password</li>
        </ol>
      </nav>
      <br>
      <h4 class="text-uppercase">Edit Password</h4>
      <?php echo $this->session->userdata('password_berhasil') ?>
      <hr>
      <div class="col-lg-5 offset-lg-4 ">
        <form action="<?php echo base_url('Auth/edit_pass_proses') ?>" method="post" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="id" value="<?php echo $_SESSION["admin_id"] ?>">
          <div class="form-group">
            <label for="password_baru" class="font-weight-bold">Password Baru</label>
            <input type="password" class="form-control mb-1" id="password_baru" placeholder="silahkan masukan password baru" name="password_baru">
            <?php echo form_error('password_baru'); ?>
          </div>
          <div class="form-group">
            <label for="ulangi_password" class="font-weight-bold">Ulangi Password</label>
            <input type="password" class="form-control mb-1" id="ulangi_password" placeholder="silahkan ulangi password" name="ulangi_password">
                <?php echo form_error('ulangi_password'); ?>
                <?php echo $this->session->userdata('ulangi_password_error') ?>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Edit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>
