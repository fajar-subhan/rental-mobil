<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Laporan Transaksi</li>
        </ol>
      </nav>
      <br>
      <h4 class="text-uppercase">Laporan Transaksi</h4>
      <hr>
      <br>
      <?php echo form_open('Laporan/laporan_pdf') ?>
      <div class="col-lg-4 offset-lg-4">
        <div class="form-group">
          <label for="tgl_awal" class="font-weight-bold">Tanggal Awal</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-calendar" aria-hidden="true"></i>
              </div>
            </div>
            <input type="text" name="tgl_awal" id="tgl_awal" class="form-control" placeholder="dd-mm-yyyy" aria-label="Input group example" aria-describedby="btnGroupAddon">
            <?php echo form_error('tgl_awal') ?>
          </div>
        </div>

        <div class="form-group">
          <label for="tgl_akhir" class="font-weight-bold">Tanggal Akhir</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-calendar" aria-hidden="true"></i>
              </div>
            </div>
            <input type="text" name="tgl_akhir" id="tgl_akhir" class="form-control" placeholder="dd-mm-yyyy" aria-label="Input group example" aria-describedby="btnGroupAddon">
          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary float-right">
            <i class="fa fa-download" aria-hidden="true"></i>
          </button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <br>
<?php $this->load->view('footer') ?>
<script>
$(document).ready(function() {
  $('#tgl_awal').datepicker({
    autoclose:true,
    format:'dd-mm-yyyy',
  });
  $('#tgl_akhir').datepicker({
    autoclose:true,
    format:'dd-mm-yyyy',
  });
});
</script>
