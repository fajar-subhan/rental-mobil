<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('Mobil') ?>">Data Mobil</a></li>
          <li class="breadcrumb-item active">Tambah Mobil</li>
        </ol>
      </nav>
      <br>
      <h4 class="text-uppercase">Mobil Baru</h4>
      <hr>
      <?php echo form_open('Mobil/tambah_mobil_proses') ?>
      <!-- Merk Mobil -->
      <div class="form-group">
        <label for="merk_mobil" class="font-weight-bold">Merk Mobil</label>
        <?php echo form_input($merk_mobil) ?>
        <?php echo form_error('merk_mobil') ?>
      </div>
      <!-- Plat mobil -->
      <div class="form-group">
        <label for="plat" class="font-weight-bold">No. Plat Mobil</label>
        <?php echo form_input($plat) ?>
        <?php echo form_error('plat') ?>
      </div>
      <!-- Warna -->
      <div class="form-group">
        <label for="warna" class="font-weight-bold">Warna Mobil</label>
        <?php echo form_input($warna) ?>
        <?php echo form_error('warna') ?>
      </div>

      <!-- Tahun -->
      <div class="form-group">
        <label for="tahun" class="font-weight-bold">Tahun Mobil</label>
        <select name="tahun" class="form-control">
          <?php
          for ($i = 2000; $i <= 2019; $i++) {
            echo "<option value='$i' selected>$i</option>";
          }
          ?>
        </select>
      </div>
      <!-- Status Mobil -->
      <div class="form-group">
        <label for="status" class="font-weight-bold">Status Mobil</label>
        <?php echo form_dropdown($status, $option_status) ?>
      </div>
      <!-- Submit -->
      <div class="form-group">
        <?php echo form_input($submit) ?>
        <?php echo form_input($reset) ?>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>