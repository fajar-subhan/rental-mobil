<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model('Mobil_model');
    $this->load->model('Transaksi_model');
    $this->load->model('Kostumer_model');
    $this->load->model('Auth_model');

    if(!$this->session->has_userdata('admin_nama')) {
      $this->session->set_flashdata('belum_login','<div class="alert alert-danger">Silahkan login terbelih dahulu</div>');
      redirect(base_url());
    }

  }

  public function index() {
    $this->data["title"] = "Dashboard - Aplikasi Rental Mobil";
    //jumlah mobil
    $this->data["jumlah_mobil"]     = $this->db->get('mobil')->num_rows();
    //jumlah kostumer
    $this->data["jumlah_kostumer"]  = $this->db->get('kostumer')->num_rows();
    //jumlah transaksi
    $this->data["jumlah_transaksi"] = $this->db->get('transaksi')->num_rows();
    //rental selesai
    $this->data["rental_selesai"]   = $this->Transaksi_model->get_transaksi_status();
    //mobil-merek
    $this->data["mobil"]            = $this->Mobil_model->get_data_mobil_merk();
    //kostumer terbaru
    $this->data["kostumer_baru"]    = $this->Kostumer_model->get_kostumer();
    //Peminjaman Terakhir
    $this->data["peminjaman_akhir"] = $this->Transaksi_model->get_transaksi_terakhir();
    //edit_pass_nama_user
    $this->data["user"]             = $this->Auth_model->get_all();

    $this->load->view('dashboard',$this->data);
  }

}
 ?>
