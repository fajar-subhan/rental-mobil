<?php
class Mobil extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('Mobil_model');
    }

    //index
    public function index() {
      $this->data["title"] = "Data Mobil - Aplikasi Rental Mobil";

      $this->data["get_data"] = $this->Mobil_model->get_all();

      $this->load->view('data_mobil/data_mobil',$this->data);
    }

    //edit_data_mobil
    public function edit_mobil($id) {
      $this->data["title"] = "Edit Data Mobil - Aplikasi Rental Mobil";

      $this->data["mobil"] = $this->Mobil_model->get_by_id($id);

      $row = $this->Mobil_model->get_by_id($id);

      if($row) {
        //merk mobil
        $this->data["merk_mobil"] = array (
          "name"    => "merk_mobil",
          "class"   => "form-control mb-1",
          "id"      => "merk_mobil",
        );
        //No.Plat Kendaraan
        $this->data["plat"] = array (
          "name"    => "plat",
          "class"   => "form-control mb-1",
          "id"      => "plat",
        );

        //warna
        $this->data["warna"] = array (
          "name"     => "warna",
          "class"    => "form-control mb-1",
          "id"       => "warna",
        );

        //tahun mobil
        $this->data["tahun"] = array (
          "name"  => "tahun",
          "class" => "form-control mb-1",
          "id"    => "tahun"
        );


        $this->data["tahun"] = array (
          "name" => "tahun",
          "class"=> "form-control",
          "id"   => "tahun"
        );

        //status
        $this->data["status"] = array (
          "name"  => "status",
          "class" => "form-control",
          "id"    => "status"
        );

        $this->data["option_status"] = array (
          "1" => "Tersedia",
          "2" => "Di Rental",
        );

        $this->data["submit"] = array (
          "name" => "submit",
          "class"=> "btn btn-success",
          "type" => "submit",
          "value"=> "Edit",
        );

        $this->load->view('data_mobil/edit_mobil',$this->data);

      }

    }

    //EDIT Data mobil proses
    public function edit_mobil_proses() {
      $data = array (
        "mobil_merk" => $this->input->post('merk_mobil'),
        "mobil_plat" => $this->input->post('plat'),
        "mobil_warna"=> $this->input->post('warna'),
        "mobil_tahun"=> $this->input->post('tahun'),
        "mobil_status"=> $this->input->post('status')
      );

      $this->Mobil_model->update($this->input->post('id'),$data);
      $this->session->set_flashdata('message','<div class="alert alert-success">Mobil berhasil di edit</div>');
      redirect(base_url('Mobil'));
    }

    //hapus mobil
    public function delete_mobil($id) {
      $this->Mobil_model->delete($id);

      $this->session->set_flashdata('message','<div class="alert alert-success">Mobil berhasil di hapus</div>');
      redirect(base_url('Mobil'));
    }

    //tambah data mobil
    public function tambah_mobil() {
      //merk mobil
      $this->data["merk_mobil"] = array (
        "name"    => "merk_mobil",
        "class"   => "form-control mb-1",
        "id"      => "merk_mobil",
      );
      //No.Plat Kendaraan
      $this->data["plat"] = array (
        "name"    => "plat",
        "class"   => "form-control mb-1",
        "id"      => "plat",
      );

      //warna
      $this->data["warna"] = array (
        "name"     => "warna",
        "class"    => "form-control mb-1",
        "id"       => "warna",
      );

      //status
      $this->data["status"] = array (
        "name"  => "status",
        "class" => "form-control",
        "id"    => "status"
      );

      $this->data["option_status"] = array (
        "1" => "Tersedia",
        "2" => "Sedang Di Rental",
      );

      $this->data["submit"] = array (
        "name" => "submit",
        "class"=> "btn btn-success",
        "type" => "submit",
        "value"=> "Tambah",
      );

      $this->data["reset"] = array (
        "name" => "reset",
        "class"=> "btn btn-danger",
        "type" => "reset",
        "value"=> "Reset",
      );

    $this->data["title"] = "Tambah Mobil - Aplikasi Rental Mobil";

    $this->load->view('data_mobil/tambah_mobil.php',$this->data);
    }

    //tambah mobil proses
    public function tambah_mobil_proses() {
      $this->form_validation->set_rules('merk_mobil','Merk Mobil','trim|required');
      $this->form_validation->set_rules('plat','No Plat Mobil','trim|required');
      $this->form_validation->set_rules('warna','Warna Mobil','trim|required');

      $this->form_validation->set_message('required','{field} wajib di isi');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

      if($this->form_validation->run() == FALSE) {
          $this->tambah_mobil();
      }
      else {
        $data = array (
          "mobil_merk"  => $this->input->post('merk_mobil'),
          "mobil_plat"  => $this->input->post('plat'),
          "mobil_warna" => $this->input->post('warna'),
          "mobil_tahun" => $this->input->post('tahun'),
          "mobil_status"=> $this->input->post('status'),
        );

        $this->Mobil_model->insert($data);
        $this->session->set_flashdata('message','<div class="alert alert-success">Mobil berhasil ditambahkan</div>');
        redirect(base_url('Mobil'));
      }
    }



}
 ?>
