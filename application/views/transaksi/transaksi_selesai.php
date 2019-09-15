<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('Transaksi') ?>">Data Transaksi</a></li>
          <li class="breadcrumb-item active">Transaksi Selesai</li>
        </ol>
      </nav>
      <br>
      <h4 class="text-uppercase">Transaksi Selesai</h4>
      <hr>
      <?php echo form_open('Transaksi/transaksi_selesai_proses') ?>
        <input type="hidden" name="id" value="<?php echo $transaksi->transaksi_id ?>">
        <input type="hidden" name="mobil_id" value="<?php echo $transaksi->mobil_id ?>">
        <!-- Kostumer -->
        <div class="form-group">
          <label for="kostumer" class="font-weight-bold">Kostumer</label>
          <?php echo form_input($kostumer,$transaksi->kostumer_nama) ?>
        </div>
        <!-- Mobil -->
        <div class="form-group">
          <label for="mobil" class="font-weight-bold">Mobil</label>
          <?php echo form_input($mobil,$transaksi->mobil_merk) ?>
        </div>
        <!-- Tanggal pinjam -->
        <div class="form-group">
          <label for="tgl_pinjam" class="font-weight-bold">Tanggal Pinjam</label>
          <?php
            $tanggal = strtotime($transaksi->transaksi_tgl_pinjam);
            $tanggal_pinjam = date('d-m-Y',$tanggal);
            echo form_input($tgl_pinjam,$tanggal_pinjam);
          ?>
        </div>
        <!-- Tanggal Kembali -->
        <div class="form-group">
          <label for="tgl_kembali" class="font-weight-bold">Tanggal Kembali</label>
          <?php
          $tanggal = strtotime($transaksi->transaksi_tgl_kembali);
          $tanggal_kembali = date('d-m-Y',$tanggal);
          echo form_input($tgl_kembali,$tanggal_kembali);
          ?>
        </div>
        <!-- Harga -->
        <div class="form-group">
          <label for="harga" class="font-weight-bold">Harga</label>
          <?php echo form_input($harga,$transaksi->transaksi_harga) ?>
        </div>
        <!-- Denda / Hari -->
        <div class="form-group">
          <label for="denda" class="font-weight-bold">Denda / Hari</label>
          <?php echo form_input($denda_hari,$transaksi->transaksi_denda)?>
        </div>
        <!-- Tanggal Dikembalikan -->
        <!-- Jika tanggak Dikembalikan mobil lebih dari tanggal kembali maka hitung denda perharinya -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text" id="btnGroupAddon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
              </div>
            </div>
            <input type="text" name="tgl_dikembalikan" id="tgl_dikembalikan" class="form-control" placeholder="dd-mm-yyyy" aria-label="Input group example" aria-describedby="btnGroupAddon">
          </div>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" value="Selesai" class="btn btn-success">
        </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>
<script>
$(document).ready(function() {
  $('#tgl_dikembalikan').datepicker({
    autoclose:true,
    format:'dd-mm-yyyy',
  });
})
</script>
