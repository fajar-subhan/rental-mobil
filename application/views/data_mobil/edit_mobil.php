<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('Mobil')?>">Data Mobil</a></li>
          <li class="breadcrumb-item active">Edit Mobil</li>
        </ol>
      </nav>
      <br>
      <h4 class="text-uppercase">Edit Mobil</h4>
      <hr>
      <?php echo form_open('Mobil/edit_mobil_proses') ?>
      <input type="hidden" name="id" value="<?php echo $mobil->mobil_id ?>">
      <!-- Merk Mobil -->
      <div class="form-group">
        <label for="merk_mobil" class="font-weight-bold">Merk Mobil</label>
        <?php echo form_input($merk_mobil,$mobil->mobil_merk) ?>
        <?php echo form_error('merk_mobil')?>
      </div>
      <!-- Plat mobil -->
      <div class="form-group">
        <label for="plat" class="font-weight-bold">No. Plat Mobil</label>
        <?php echo form_input($plat,$mobil->mobil_plat)?>
        <?php echo form_error('plat') ?>
      </div>
      <!-- Warna -->
      <div class="form-group">
        <label for="warna" class="font-weight-bold">Warna Mobil</label>
        <?php echo form_input($warna,$mobil->mobil_warna)?>
        <?php echo form_error('warna') ?>
      </div>

      <!-- Tahun -->
      <div class="form-group">
        <label for="tahun" class="font-weight-bold">Tahun Mobil</label>
        <?php echo form_input($tahun,$mobil->mobil_tahun) ?>
        <?php echo form_error('tahun') ?>
      </div>
      <!-- Status Mobil -->
      <div class="form-group">
        <label for="status" class="font-weight-bold">Status Mobil</label>
        <?php echo form_dropdown($status,$option_status,$mobil->mobil_status) ?>
      </div>
      <!-- Submit -->
      <div class="form-group">
        <?php echo form_input($submit) ?>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>
