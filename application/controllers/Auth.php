<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model('Auth_model');
  }

  //untuk form login
  public function index() {
    if($this->session->has_userdata('admin_username')){redirect(base_url('dashboard'));}

    $this->data["title"] = "Aplikasi Rental Mobil";

    $this->load->view('auth/login.php',$this->data);
  }

  //form login proses
  public function login_proses() {
    //form validation
    $this->form_validation->set_rules('admin_username','Username','trim|required');
    $this->form_validation->set_rules('admin_password','Password','trim|required');

    $this->form_validation->set_message('required','{field} wajib di isi');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

    if($this->form_validation->run() == FALSE) {
      $this->index();
    }
    else {
      $username = $this->input->post('admin_username');
      $password = $this->input->post('admin_password');

      $this->db->select('admin_username,admin_password,admin_id,admin_nama');
      $this->db->from('admin');
      $this->db->where('admin_username',$username);
      $query = $this->db->get();
      $row = $query->row();

      if($row->admin_username == NULL) {
        $pesan = "username tidak sessuai";
        $pesan = urlencode($pesan);
        redirect(base_url("?pesan1={$pesan}"));
      }
      else {
        $password_md5 = md5($password);

        if($password_md5 == $row->admin_password) {
            $session = array (
              "admin_id"        => $row->admin_id,
              "admin_nama"      => $row->admin_nama,
              "admin_username"  => $username,
            );

            $this->session->set_userdata($session);
            redirect(base_url('dashboard'));
        }
        else {
          $pesan = "Password tidak sessuai";
          $pesan = urlencode($pesan);
          redirect(base_url("?pesan2={$pesan}"));
        }
      }
    }
  }

  public function logout() {
    $this->session->unset_userdata('admin_username');
    $this->session->set_flashdata('logout','<div class="alert alert-danger">Anda telah logout</div>');
    redirect(base_url());
  }

  //ganti password admin
  public function edit_pass() {
    $this->data["title"] = "Edit Password - Aplikasi Rental Mobil";

    $this->data["user"] = $this->Auth_model->get_all();

    $this->load->view('auth/edit_pass',$this->data);
  }

  //proses edit password
  public function edit_pass_proses() {
    $password_baru = $this->input->post('password_baru');
    $ulangi_password = $this->input->post('ulangi_password');

    $this->form_validation->set_rules('password_baru','Password baru','trim|required');
    $this->form_validation->set_rules('ulangi_password','Ulangi Password Baru','trim|required');

    $this->form_validation->set_message('required','{field} wajib di isi');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

    if($this->form_validation->run() == FALSE) {
      $this->edit_pass();
    }
    elseif($ulangi_password != $password_baru) {
      $this->session->set_flashdata('ulangi_password_error','<div class="alert alert-danger">password tidak sama,silahkan ulangi kembali</div>');
      redirect(base_url('Auth/edit_pass'));
    }
    else {
      //update berdasarkan admin id

      $data = array (
        "admin_password" => md5($this->input->post('ulangi_password')),
      );

      $this->Auth_model->update($this->input->post('id'),$data);
      $this->session->set_flashdata('password_berhasil','<div class="alert alert-success">Password berhasil di edit</div>');
      redirect(base_url('Auth/edit_pass'));
    }
  }


}
