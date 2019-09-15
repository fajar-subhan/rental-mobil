<?php $this->load->view('header') ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url('dashboard') ?>">RENTAL MOBIL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto">
     <!-- Dashboard/home -->
     <li class="nav-item active">
       <a class="nav-link" href="<?php echo base_url('dashboard') ?>"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;Dashboard</a>
     </li>
     <!-- Data Mobil -->
     <li class="nav-item active">
       <a class="nav-link" href="<?php echo base_url('Mobil') ?>"><i class="fa fa-car" aria-hidden="true"></i>&nbsp;Data Mobil</a>
     </li>
     <!-- Data Kostumer -->
     <li class="nav-item active">
       <a class="nav-link" href="<?php echo base_url('Kostumer') ?>"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Data Kostumer</a>
     </li>
     <!-- Data Transaksi -->
     <li class="nav-item active">
       <a class="nav-link" href="<?php echo base_url('Transaksi') ?>"><i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;Data Transaksi</a>
     </li>
     <!-- Laporan -->
     <li class="nav-item active">
       <a class="nav-link" href="<?php echo base_url('Laporan')?>"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;Laporan</a>
     </li>
   </ul>

   <!-- Logout -->
   <a href="<?php echo base_url('auth/logout') ?>" class="text-dark pr-2"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a>

   <!-- Hallo,user -->
   <li class="nav-item dropdown mr-1" style="list-style:none;">
        <a class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Halo, <?php echo $this->session->userdata('admin_nama') ?>
        </a>
        <div class="dropdown-menu mt-2" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('Auth/edit_pass')?>"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Edit Password</a>
        </div>
  </li>
  </div>
</nav>

<?php $this->load->view('footer') ?>
