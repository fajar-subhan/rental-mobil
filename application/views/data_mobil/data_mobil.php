<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">Data Mobil</li>
        </ol>
      </nav>
      <br>
      <h4 class="text-uppercase">Data Mobil</h4>
      <hr>
      <?php echo $this->session->userdata('message') ?>
      <a class="btn btn-primary mb-3" href="<?php echo base_url('Mobil/tambah_mobil') ?>">
        <i class="fa fa-plus">&nbsp;Tambah Mobil</i>
      </a>
      <table class="table table-bordered table-striped small" id="datatable">
        <thead class="text-center">
          <tr>
            <th>No</th>
            <th>Merk Mobil</th>
            <th>Plat</th>
            <th>Warna</th>
            <th>Tahun Pembuatan</th>
            <th>Status</th>
            <th>Edit | Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=0;
          foreach($get_data as $mobil)
          {
            $no++;
            echo "<tr>";
            echo "<td class='text-center'>$no</td>";
            echo "<td>$mobil->mobil_merk</td>";
            echo "<td>$mobil->mobil_plat</td>";
            echo "<td>$mobil->mobil_warna</td>";
            echo "<td class='text-center'>$mobil->mobil_tahun</td>";
            echo "<td class='text-center'>";
            if($mobil->mobil_status == 1) {
              echo "Tersedia";
            }
            else {
              echo "Di Rental";
            }
            echo "<td class='text-center'>";
          ?>
          <a class="btn edit" href="<?php echo base_url('Mobil/edit_mobil/'),$mobil->mobil_id ?>">
            <i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Edit
          </a> |
          <a class="btn hapus" href="<?php echo base_url('Mobil/delete_mobil/'),$mobil->mobil_id?>" onclick="return confirm('Apakah anda yakin?')">
            <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Hapus
          </a>
          <?php
            echo "</td>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>
<script type="text/javascript">
$(document).ready(function() {
  $('#datatable').DataTable()
});
</script>
