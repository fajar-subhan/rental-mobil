<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    table.laporan {
      font-size: 10px;
      border-collapse: collapse;
    }

    table.laporan th {
      padding: 10px;
      text-align: center;
    }

    .text-center {
      text-align: center;
    }

    h1 {
      text-align: center;
    }

    .footer {
      float: right;
    }

    .clear {
      clear:both;
    }

    </style>
  </head>
  <body>
    <h1>Laporan Transaksi Rental Mobil</h1>
    <hr>
    <br>
    <table>
      <tr>
        <td>Dari Tanggal</td>
        <td>:</td>
        <td><?php echo $tgl_awal ?></td>
      </tr>
      <tr>
        <td>Sampai Tanggal</td>
        <td>:</td>
        <td><?php echo $tgl_akhir ?></td>
      </tr>
    </table>
    <br>
    <table border="1" class="laporan">
      <thead>
        <tr>
          <th>No</th>
          <th>Kostumer</th>
          <th class='l'>Mobil</th>
          <th>Tgl.Transaksi</th>
          <th>Tgl.Pinjam</th>
          <th>Tgl.Kembali</th>
          <th>Harga</th>
          <th>Denda/Hari</th>
          <th>Tgl.Dikembalikan</th>
          <th>Denda</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
        foreach($get_all as $laporan) {

          $tanggal = strtotime($laporan->transaksi_tgl);
          $transaksi_tgl = date('d-m-Y',$tanggal);

          $tanggal = strtotime($laporan->transaksi_tgl_pinjam);
          $transaksi_tgl_pinjam = date('d-m-Y',$tanggal);

          $tanggal = strtotime($laporan->transaksi_tgl_kembali);
          $transaksi_tgl_kembali = date('d-m-Y',$tanggal);

          $tanggal = strtotime($laporan->transaksi_tgldikembalikan);
          $transaksi_dikembalikan = date('d-m-Y',$tanggal);

          $no++;
          echo "<tr>";
          echo "<td style='text-align:center;'>$no</td>";
          echo "<td>$laporan->kostumer_nama</td>";
          echo "<td>$laporan->mobil_merk</td>";
          echo "<td style='text-align:center;'>$transaksi_tgl</td>";
          echo "<td style='text-align:center;'>$transaksi_tgl_pinjam</td>";
          echo "<td style='text-align:center;'>$transaksi_tgl_kembali</td>";
          echo "<td>Rp.".number_format($laporan->transaksi_harga)."</td>";
          echo "<td>Rp.".number_format($laporan->transaksi_denda)."</td>";
          if($laporan->transaksi_tgldikembalikan == 0 ) {
            echo "<td class='text-center'>-</td>";
          }
          else {
            echo "<td class='text-center'>$transaksi_dikembalikan</td>";
          }
          echo "<td>Rp.".number_format($laporan->transaksi_totaldenda)."</td>";
          if($laporan->transaksi_status == 1) {
            echo "<td class='text-center'>Selesai</td>";
          }
          else {
            echo "<td class='text-center'>Belum</td>";
          }
          echo "</tr>";
        }
         ?>
      </tbody>
    </table>
    <br>
    <br>
    <div class="footer">
      <p>Jakarta, <?php echo date('d-m-Y') ?></p>
      <br>
      <p><?php echo $this->session->userdata('admin_nama') ?></p>
    </div>
  </body>
</html>
