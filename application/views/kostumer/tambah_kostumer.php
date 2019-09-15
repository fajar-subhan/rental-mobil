<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('Kostumer')?>">Data Kostumer</a></li>
          <li class="breadcrumb-item active">Tambah Kostumer</li>
        </ol>
      </nav>
      <br>
      <h4 class="text-uppercase">Tambah Kostumer</h4>
      <hr>
      <form action="<?php echo base_url('Kostumer/tambah_kostumer_proses') ?>" method="post" enctype="application/x-www-form-urlencoded">
        <!-- Nama Kostumer -->
        <div class="form-group">
          <label for="nama" class="font-weight-bold">Nama Kostumer</label>
          <input type="text" name="nama_kostumer" id="nama" class="form-control">
          <?php echo form_error('nama_kostumer') ?>
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-group">
          <label for="jk" class="font-weight-bold">Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-control">
            <option value="L">L</option>
            <option value="P">P</option>
          </select>
          <?php echo form_error('jenis_kelamin') ?>
        </div>

        <!-- ALamat -->
        <div class="form-group" class="font-weigt-bold">
          <label for="alamat" class="font-weight-bold">Alamat</label>
          <input type="text" name="alamat" id="alamat" class="form-control">
          <?php echo form_error('alamat') ?>
        </div>

        <!-- NO hp -->
        <div class="form-group">
          <label for="no_hp" class="font-weight-bold">No Hp</label>
          <input type="text" name="no_hp" id="no_hp" class="form-control">
          <?php echo form_error('no_hp') ?>
        </div>

        <!-- No Ktp -->
        <div class="form-group">
          <label for="no_ktp" class="font-weight-bold">No Ktp</label>
          <input type="text" name="no_ktp" id="no_ktp" class="form-control">
          <?php echo form_error('no_ktp')?>
        </div>

        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-success" value="Tambah">
        </div>

      </form>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>
