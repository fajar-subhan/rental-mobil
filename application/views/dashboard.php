<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<br><br>
<div class="container">
  <div class="row"> <!-- Row 1-->
    <div class="col-lg-12">
      <h2 class="text-uppercase dashboard">Dashboard</h2>
      <hr>
    </div>
  </div> <!-- Close Row1-->
  <div class="row"><!-- Row2-->
    <!-- Jumlah Mobil -->
    <div class="col-lg-3">
      <div class="border mb-3">
        <div class="header-jumlah-mobil header font-weight-bold">
          <i class="fa fa-car" aria-hidden="true"></i>
          <span class="float-right">Jumlah Mobil</span>
          <span class="float-right">
            <?php echo $jumlah_mobil; ?>
          </span>
        </div>
        <div class="card-body-jumlah-mobil card-body">
          <a href="<?php echo base_url('Mobil') ?>" class="btn btn-jumlah-mobil">
            <i class="fa fa-search" aria-hidden="true"></i>&nbsp;View Details
          </a>
        </div>
      </div>
    </div>

    <!-- Jumlah Kustomer -->
    <div class="col-lg-3">
      <div class="border mb-3">
        <div class="header-jumlah-kustomer header font-weight-bold">
          <i class="fa fa-user" aria-hidden="true"></i>
          <span class="float-right">Jumlah Kostumer</span>
          <span class="float-right">
            <?php echo $jumlah_kostumer; ?>
          </span>
        </div>
        <div class="card-body-jumlah-kustomer card-body font-weight-bold">
          <a href="<?php echo base_url('Kostumer') ?>" class="btn btn-jumlah-kustomer">
            <i class="fa fa-search" aria-hidden="true"></i>&nbsp;View Details
          </a>
        </div>
      </div>
    </div>

    <!-- Jumlah Transaksi -->
    <div class="col-lg-3">
      <div class="border mb-3">
        <div class="header-jumlah-transaksi header font-weight-bold">
          <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
          <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
          <span class="float-right">Jumlah Transaksi</span>
          <span class="float-right">
            <?php echo $jumlah_transaksi; ?>
          </span>
        </div>
        <div class="card-body-jumlah-transaksi card-body">
          <a href="<?php echo base_url('Transaksi') ?>" class="btn btn-jumlah-transaksi">
            <i class="fa fa-search" aria-hidden="true"></i>&nbsp;View Details
          </a>
        </div>
      </div>
    </div>

    <!-- transaksi Selesai -->
    <div class="col-lg-3">
      <div class="border mb-3">
        <div class="header-rental-selesai header font-weight-bold">
          <i class="fa fa-check" aria-hidden="true"></i>
          <span class="float-right">Transaksi Selesai</span>
          <span class="float-right"><?php echo $rental_selesai->transaksi_status; ?></span>
        </div>
        <div class="card-body-rental-selesai card-body">
          <a href="<?php echo base_url('Transaksi') ?>" class="btn btn-rental-selesai">
            <i class="fa fa-search" aria-hidden="true"></i>&nbsp;View Details
          </a>
        </div>
      </div>
    </div>
  </div> <!-- Close Row 2-->
  <hr>
  <div class="row"> <!-- Open Row 3 -->
    <!-- Mobil -->
    <div class="col-lg-3">
    <div class="card bg-light mb-3">
      <div class="card-header">
        <i class="fa fa-car" aria-hidden="true">&nbsp;Mobil</i>
      </div>
      <div class="card-body">
        <table class="table">
          <tbody>
            <?php
             foreach($mobil as $key) {
               echo "<tr>";
               echo "<td>$key->mobil_merk</td>";
               echo "<td>";
               ?>
               <?php
               if($key->mobil_status == 1) {
                 echo "<span class='badge badge-pill badge-secondary'>Tersedia</span>";
               }
               else {
                 echo  "<span class='badge badge-pill badge-secondary'>Di Rental</span>";
               }
                ?>
              <?php
              echo "</td>";
               echo "</tr>";
             }
            ?>

          </tbody>
          <tfooter>
            <tr>
            <td colspan="2">
              <a href="<?php echo base_url('Mobil') ?>" class="btn btn-primary mt-3 float-right">
                <i class="fa fa-search" aria-hidden="true"></i>&nbsp;View All
              </a>
            </td>
            </tr>
          </tfooter>
        </table>
      </div>
    </div>
    </div>

    <!-- Kostumer -->
    <div class="col-lg-3">
    <div class="card bg-light mb-3">
      <div class="card-header">
        <i class="fa fa-user" aria-hidden="true">&nbsp;Kostumer</i>
      </div>
      <div class="card-body">
        <table class="table">
          <tbody>
            <?php
            foreach($kostumer_baru as $kostumer) {
              echo "<tr>";
              echo "<td>$kostumer->kostumer_nama</td>";
              echo "<td><span class='badge badge-pill badge-secondary'>$kostumer->kostumer_jk</span></td>";
              echo "</tr>";
            }
            ?>
          </tbody>
          <tfooter>
            <tr>
            <td colspan="2">
              <a href="<?php echo base_url('Kostumer') ?>" class="btn btn-primary mt-3 float-right">
                <i class="fa fa-search" aria-hidden="true"></i>&nbsp;View All
              </a>
            </td>
            </tr>
          </tfooter>
        </table>
      </div>
    </div>
    </div>

    <!-- Peminjaman -->
    <div class="col-lg-6">
    <div class="card bg-light mb-3">
      <div class="card-header">
        <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
        <i class="fa fa-long-arrow-down" aria-hidden="true"></i>&nbsp;
        Peminjaman
      </div>
      <div class="card-body">
        <table class="table text-center">
          <thead class="table-bordered">
            <tr>
              <th>Tgl.Transaksi</th>
              <th>Tgl.Pinjam</th>
              <th>Tgl.Kembali</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody class="table-bordered">
            <?php
            foreach($peminjaman_akhir as $terakhir) {
              //transaksi tanggal
              $tanggal       = strtotime($terakhir->transaksi_tgl);
              $transaksi_tgl = date('d-m-Y',$tanggal);
              //tgl_pinjam
              $tanggal       = strtotime($terakhir->transaksi_tgl_pinjam);
              $transaksi_tgl_pinjam = date('d-m-Y',$tanggal);
              //tgl_kembali
              $tanggal       = strtotime($terakhir->transaksi_tgl_kembali);
              $transaksi_tgl_kembali = date('d-m-Y',$tanggal);

              echo "<tr>";
              echo "<td>$transaksi_tgl</td>";
              echo "<td>$transaksi_tgl_pinjam</td>";
              echo "<td>$transaksi_tgl_kembali</td>";
              echo "<td>Rp. ".number_format($terakhir->transaksi_harga).",-</td>";
              echo "</tr>";
            }
             ?>
          </tbody>
          <tfooter>
            <tr>
            <td colspan="4">
              <a href="<?php echo base_url('Transaksi') ?>" class="btn btn-primary mt-4 float-right">
                <i class="fa fa-search" aria-hidden="true"></i>&nbsp;View All
              </a>
            </td>
            </tr>
          </tfooter>
        </table>
      </div>
    </div>
    </div>
  </div> <!-- Close Row 3 -->
</div>
<?php $this->load->view('footer') ?>
