<?php
class Laporan extends CI_Controller {
  public function __construct() {
      parent::__construct();

      $this->load->model('Transaksi_model');

      if(!$this->session->has_userdata('admin_nama')) {
        $this->session->set_flashdata('session','<div class="alert alert-danger">Session Berakhir,Silahkan Login Kembali</div>');
        redirect(base_url());
      }

  }

  public function index() {
    $this->data["title"] = "Laporan Transaksi - Aplikasi Rental Mobil";

    $this->load->view('laporan/laporan',$this->data);
  }

  public function laporan_pdf() {
    $this->data["get_all"] = $this->Transaksi_model->laporan();

    $this->data["tgl_awal"]   = $this->input->post('tgl_awal');
    $this->data["tgl_akhir"]  = $this->input->post('tgl_akhir');

    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');

    $this->load->library('Pdf');

    $this->pdf->setPaper('A4','Potrait');
    $this->pdf->filename = "Laporan-Pertanggal-$tgl_awal-$tgl_akhir.pdf";
    $this->pdf->load_view('laporan/print_laporan',$this->data);
  }

}

 ?>
