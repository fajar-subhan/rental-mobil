<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<br>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Data Transaksi</li>
        </ol>
      </nav>
      <br>
      <h4 class="text-uppercase">Data Transaksi</h4>
      <hr>
      <?php echo $this->session->userdata('message') ?>
      <a class="btn btn-primary mb-3" href="<?php echo base_url('Transaksi/transaksi_baru') ?>">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Transaksi Baru
      </a>
      <table class="table table-bordered small table-striped" id="datatable">
        <thead class='text-center'>
          <tr>
            <th>No</th>
            <th>Kostumer</th>
            <th>Mobil</th>
            <th>Tgl.Transaksi</th>
            <th>Tgl.Pinjam</th>
            <th>Tgl.Kembali</th>
            <th>Harga</th>
            <th>Denda/Hari</th>
            <th>Tgl.Dikembalikan</th>
            <th>Denda</th>
            <th>Status</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
          foreach($get_all as $transaksi) {
            //tanggal transaksi
            $tanggal = strtotime($transaksi->transaksi_tgl);
            $transaksi_tgl = date('d-m-Y',$tanggal);

            //tanggal pinjam
            $tanggal = strtotime($transaksi->transaksi_tgl_pinjam);
            $transaksi_tgl_pinjam = date('d-m-Y',$tanggal);

            //tanggal kembali
            $tanggal = strtotime($transaksi->transaksi_tgl_kembali);
            $transaksi_kembali = date('d-m-Y',$tanggal);


            //transaksi tanggal dikembalikan
            $tanggal = strtotime($transaksi->transaksi_tgldikembalikan);
            $transaksi_dibalikin_sama_user = date('d-m-Y',$tanggal);

            $no++;
            echo "<tr>";
            echo "<td class='text-center'>$no</td>";
            echo "<td>$transaksi->kostumer_nama</td>";
            echo "<td>$transaksi->mobil_merk</td>";
            echo "<td class='text-center'>$transaksi_tgl</td>";
            echo "<td class='text-center'>$transaksi_tgl_pinjam</td>";
            echo "<td class='text-center'>$transaksi_kembali</td>";
            echo "<td>Rp.".number_format($transaksi->transaksi_harga)."</td>";
            echo "<td>Rp.".number_format($transaksi->transaksi_denda)."</td>";
            if($transaksi->transaksi_status != 1) {
              echo "<td class='text-center'>-</td>";
            }else {
              echo "<td class='text-center'>$transaksi_dibalikin_sama_user</td>";
            }

            echo "<td>Rp.".number_format($transaksi->transaksi_totaldenda)."</td>";
            if($transaksi->transaksi_status == 1) {
              echo "<td>Selesai</td>";
            }
            else {
              echo "<td>Belum</td>";
            }
            if($transaksi->transaksi_status != 1) {
              echo "<td class='text-center'>";
            ?>
            <a class="btn btn-success" href="<?php echo base_url('Transaksi/transaksi_selesai/'),$transaksi->transaksi_id ?>" title="Transaksi Selesai">
              <i class="fa fa-check" aria-hidden="true"></i>
            </a>
            <a class="btn btn-danger" href="<?php echo base_url('Transaksi/transaksi_hapus/'),$transaksi->transaksi_id?>" title="Batalkan Transaksi" onclick="return confirm('Apakah anda yakin?')">
              <i class="fa fa-times" aria-hidden="true"></i>
            </a>
            <?php
            echo "</td>";
          }else {
            echo "<td class='text-center'>-</td>";
          }
          echo "</tr>";
          }
           ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>
<script>
$(document).ready(function() {
  $('#datatable').DataTable();
})
</script>
