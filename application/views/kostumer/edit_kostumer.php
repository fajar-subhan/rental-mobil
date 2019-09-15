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
          <li class="breadcrumb-item active">Edit Mobil</li>
        </ol>
      </nav>
      <br>
      <h4 class="text-uppercase">Edit Kostumer</h4>
      <hr>
      <?php echo form_open('Kostumer/edit_kostumer_proses') ?>
      <input type="hidden" name="id" value="<?php echo $kostumer->kostumer_id?>">
      <div class="form-group">
        <label class="font-weight-bold">Nama Kostumer</label>
        <?php echo form_input($nama,$kostumer->kostumer_nama) ?>
        <?php echo form_error('nama') ?>
      </div>

      <div class="form-group">
        <label class="font-weight-bold">Jk</label>
        <?php echo form_dropdown($jk,$option,$kostumer->kostumer_jk) ?>
        <?php echo form_error('jk') ?>
      </div>

      <div class="form-group">
        <label class="font-weight-bold">Alamat</label>
        <?php echo form_input($alamat,$kostumer->kostumer_alamat)?>
        <?php echo form_error('alamat') ?>
      </div>

      <div class="form-group">
        <label class="font-weight-bold">No Hp</label>
        <?php echo form_input($no_hp,$kostumer->kostumer_hp) ?>
        <?php echo form_error('no_hp') ?>
      </div>

      <div class="form-group">
        <label class="font-weight-bold">No Ktp</label>
        <?php echo form_input($no_ktp,$kostumer->kostumer_ktp) ?>
        <?php echo form_error('no_ktp') ?>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Edit" class="btn btn-success">
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>
