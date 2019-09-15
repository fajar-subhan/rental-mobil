<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('Transaksi')?>">Data Transaksi</a></li>
          <li class="breadcrumb-item active">Transaksi Baru</li>
        </ol>
      </nav>
      <br>
      <h4 class="text-uppercase">Transaksi Baru</h4>
      <hr>
      <form action="<?php echo base_url('Transaksi/transaksi_baru_proses') ?>" enctype="multipart/form-data" method="post">
        <!-- Kostumer -->
        <div class="form-group">
          <label for="kostumer" class="font-weight-bold">Kostumer</label>
          <select name="kostumer" class="form-control">
            <option>--Pilih Kostumer--</option>
            <?php
            foreach($kostumer as $kostumer) {
              echo "<option value='$kostumer->kostumer_id'>$kostumer->kostumer_nama</option>";
            }
            ?>
          </select>
        </div>
        <!-- Mobil -->
        <div class="form-group">
          <label for="mobil" class="font-weight-bold">Mobil</label>
          <select name="mobil" class="form-control">
            <option>--Pilih Mobil--</option>
            <?php foreach($mobil as $mobil) {
              echo "<option value='$mobil->mobil_id'>$mobil->mobil_merk</option>";
            } ?>
          </select>
        </div>
        <!-- Tanggal Pinjam -->
        <div class="form-group">
          <label for="tgl_pinjam" class="font-weight-bold">Tanggal Pinjam</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-calendar" aria-hidden="true"></i>
              </div>
            </div>
            <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" placeholder="dd-mm-yyyy" aria-label="Input group example" aria-describedby="btnGroupAddon">
            <?php echo form_error('tgl_pinjam') ?>
          </div>
        </div>
        <!-- Tanggal Kembali -->
        <div class="form-group">
          <label for="tgl_kembali" class="font-weight-bold">Tanggal Kembali</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-calendar" aria-hidden="true"></i>
              </div>
            </div>
            <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" placeholder="dd-mm-yyyy" aria-label="Input group example" aria-describedby="btnGroupAddon">
            <?php echo form_error('tgl_kembali')?>
          </div>
        </div>
        <!-- Harga -->
        <div class="form-group">
          <label for="harga" class="font-weight-bold">Harga</label>
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-money" aria-hidden="true"></i>
              </div>
            </div>
            <input type="text" name="harga" id="harga" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon" placeholder="isikan angka">
          </div>
          <?php echo form_error('harga')?>
        </div>
        <!-- Harga Denda / perhari -->
        <div class="form-group">
          <label for="denda" class="font-weight-bold">Denda</label>
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fa fa-money" aria-hidden="true"></i>
              </div>
            </div>
            <input type="text" name="denda" id="denda" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon" placeholder="isikan angka">
          </div>
          <?php echo form_error('denda')?>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" value="Tambah" class="btn btn-success">
          <input type="reset" name="reset" value="Reset" class="btn btn-danger">
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>
<script>
$(document).ready(function() {
  $('#tgl_pinjam').datepicker({
    autoclose:true,
    format:'dd-mm-yyyy',
  });
  $('#tgl_kembali').datepicker({
    autoclose:true,
    format:'dd-mm-yyyy',
  });
})

</script>
