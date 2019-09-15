<?php
class Kostumer extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model('Kostumer_model');
  }

  public function index() {
      $this->data["title"] = "Data Kostumer - Aplikasi Rental Mobil";

      $this->data["get_all"] = $this->Kostumer_model->get_all();

      $this->load->view('kostumer/data_kostumer',$this->data);
  }

  //edit data kostumer berdasarkan id
  public function edit_data($id) {
    $this->data["kostumer"] = $this->Kostumer_model->get_by_id($id);

    $this->data["title"] = "Edit Kostumer - Aplikasi Rental Mobil";

    $row = $this->Kostumer_model->get_by_id($id);

    if($row) {
        //nama user
        $this->data["nama"] = array (
          "name"  => "nama",
          "class" => "form-control",
          "id"    => "nama",
        );

        //jenis Kelamin
        $this->data["option"] = array (
          "L" => "L",
          "P" => "P",
        );

        $this->data["jk"] = array (
          "name" => "jk",
          "class"=> "form-control",
        );

        //alamat
        $this->data["alamat"] = array (
          "name" => "alamat",
          "class"=> "form-control",
        );

        //hp
        $this->data["no_hp"] = array (
          "name" => "no_hp",
          "class"=> "form-control",
        );

        //no ktp
        $this->data["no_ktp"] = array (
          "name" => "no_ktp",
          "class"=> "form-control",
        );

        $this->load->view('kostumer/edit_kostumer',$this->data);
    }
  }

  public function edit_kostumer_proses() {
    $data = array (
      "kostumer_nama"     => $this->input->post('nama'),
      "kostumer_alamat"   => $this->input->post('alamat'),
      "kostumer_jk"       => $this->input->post('jk'),
      "kostumer_hp"       => $this->input->post('no_hp'),
      "kostumer_ktp"      => $this->input->post('no_ktp'),
    );

    $this->Kostumer_model->update($this->input->post('id'),$data);
    $this->session->set_flashdata('message','<div class="alert alert-success">Data kostumer berhasil di edit</div>');
    redirect(base_url('Kostumer'));
  }

  public function delete($id) {
    $this->Kostumer_model->delete($id);
    $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di hapus</div>');
    redirect(base_url('Kostumer'));
  }

  //tambah kostumer
  public function tambah_kostumer() {
    $this->data["title"] = "Tambah Kostumer - Aplikasi Rental Mobil";

    $this->load->view('kostumer/tambah_kostumer',$this->data);
  }

  //tambah proses
  public function tambah_kostumer_proses() {
    $data = array(
      "kostumer_nama"     => $this->input->post('nama_kostumer'),
      "kostumer_alamat"   => $this->input->post('alamat'),
      "kostumer_jk"       => $this->input->post('jenis_kelamin'),
      "kostumer_hp"       => $this->input->post('no_hp'),
      "kostumer_ktp"      => $this->input->post('no_ktp'),
    );

    $this->Kostumer_model->insert($data);
    $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil ditambahkan</div>');
    redirect(base_url('Kostumer'));
  }

}
 ?>
