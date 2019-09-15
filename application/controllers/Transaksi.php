<?php
class Transaksi extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model('Transaksi_model');
    $this->load->model('Kostumer_model');
    $this->load->model('Mobil_model');

    if(!$this->session->has_userdata('admin_nama')) {
      $this->session->set_flashdata('session','<div class="alert alert-danger">Session Berakhir,Silahkan Login Kembali</div>');
      redirect(base_url());
    }
  }

  public function index() {
    $this->data["title"] = "Data Transaksi - Aplikasi Rental Mobil";

    $this->data["get_all"] = $this->Transaksi_model->get_all();

    $this->load->view('transaksi/data_transaksi',$this->data);
  }

  //transaksi baru
  public function transaksi_baru() {
    $this->data["title"] = "Transaksi Baru - Aplikasi Rental Mobil";

    //kostumer
    $this->data["kostumer"] = $this->Kostumer_model->get_all_kostumer();
    //mobil merk
    $this->data["mobil"] = $this->Mobil_model->get_mobil();

    $this->load->view('transaksi/transaksi_baru',$this->data);
  }

  //transaksi proses
  public function transaksi_baru_proses() {
    $this->form_validation->set_rules('harga','Harga','numeric|trim|required');
    $this->form_validation->set_rules('denda','Denda','numeric|trim|required');

    $this->form_validation->set_message('required','{field} wajib di isi');
    $this->form_validation->set_message('numeric','{field} hanya di isi angka');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
    if($this->form_validation->run() == FALSE ) {
      $this->transaksi_baru();
    }
    else {
      //siapkan data untuk input transaksi baru
      $tanggal = strtotime($this->input->post('tgl_pinjam'));
      $tanggal_pinjam = date('Y-m-d',$tanggal);

      $tanggal = strtotime($this->input->post('tgl_kembali'));
      $tanggal_kembali = date('Y-m-d',$tanggal);

      $id = $this->db->select('admin_id')->from('admin')->get();

      $id_karyawan = $id->row();

      $data = array (
        "transaksi_karyawan"   => $id_karyawan->admin_id,
        "transaksi_kostumer"   => $this->input->post('kostumer'),
        "transaksi_mobil"      => $this->input->post('mobil'),
        "transaksi_tgl_pinjam" => $tanggal_pinjam,
        "transaksi_tgl_kembali"=> $tanggal_kembali,
        "transaksi_harga"      => $this->input->post('harga'),
        "transaksi_denda"      => $this->input->post('denda'),
        "transaksi_tgl"        => date('Y-m-d'),
        "transaksi_totaldenda" => 0,
        "transaksi_status"     => 0,
        "transaksi_tgldikembalikan" => 0
      );


      $this->Transaksi_model->insert($data);

      $data2 = array (
        'mobil_status' => '2'
      );

      $this->Mobil_model->update($this->input->post('mobil'),$data2);

      $this->session->set_flashdata('message','<div class="alert alert-success">Transaksi ditambahkan</div>');
      redirect(base_url('Transaksi'));

    }
  }

  //transaksi Selesai
  public function transaksi_selesai($id) {
    $row = $this->Transaksi_model->get_by_id($id);

    $this->data["transaksi"] = $this->Transaksi_model->get_by_id($id);

    $this->data["title"] = "Transaksi Selesai - Aplikasi Rental Mobil";

    if($row) {
        //Kostumer
        $this->data["kostumer"] = array (
          "name" => "kostumer",
          "readonly" => "readonly",
          "class" => "form-control",
        );
        //mobil
        $this->data["mobil"] = array (
          "name" => "mobil",
          "readonly" => "readonly",
          "class" => "form-control",
        );
        //tgl pinjam
        $this->data["tgl_pinjam"] = array (
          "name" => "tgl_pinjam",
          "readonly" => "readonly",
          "class" => "form-control",
        );
        //tgl kembali
        $this->data["tgl_kembali"] = array (
          "name" => "tgl_kembali",
          "readonly" => "readonly",
          "class" => "form-control",
        );
        //harga
        $this->data["harga"] = array (
          "name" => "harga",
          "disabled",
          "class" => "form-control",
          "readonly" => "readonly"
        );
        //denda / hari
        $this->data["denda_hari"] = array (
          "name" => "denda_hari",
          "readonly" => "readonly",
          "class" => "form-control",
        );

        $this->load->view('transaksi/transaksi_selesai',$this->data);

    }

  }

  //transaksi selesai proses
  public function transaksi_selesai_proses() {

    $tgl_kembali = $this->input->post('tgl_kembali');
    $tgl_dikembalikan = $this->input->post('tgl_dikembalikan');
    $denda = $this->input->post('denda_hari');

    $start = new DateTime($tgl_kembali);
    $end   = new DateTime($tgl_dikembalikan);

    $interval = $start->diff($end);//1 hari days=1*100000

    $total_denda = $interval->days*$denda;


    $tanggal = strtotime($this->input->post('tgl_dikembalikan'));
    $dikembalikan = date('Y-m-d',$tanggal);

    $tanggal = strtotime($this->input->post('tgl_kembali'));
    $kembali = date('Y-m-d',$tanggal);


    $data = array (
      "transaksi_tgl_kembali" => $kembali,
      "transaksi_tgldikembalikan" => $dikembalikan,
      "transaksi_totaldenda"  => $total_denda,
      "transaksi_status" => 1,
    );


    $this->Transaksi_model->update($this->input->post('id'),$data);


    $data2 = array (
      "mobil_status" => "1"
    );

    $this->Mobil_model->mobil_status_selesai($this->input->post('mobil_id'),$data2);

    $this->session->set_flashdata('message','<div class="alert alert-success">Transaksi berhasil</div>');
    redirect(base_url('Transaksi'));
  }


  //hapus transaksi
  public function transaksi_hapus($id) {

    $row = $this->Transaksi_model->get_by_id($id);

    $data = array (
      "mobil_status" => "1"
    );

    $this->Mobil_model->update($row->mobil_id,$data);

    $this->Transaksi_model->delete($id);

    $this->session->set_flashdata('message','<div class="alert alert-danger">Transaksi dibatalkan</div>');
    redirect(base_url('Transaksi'));
  }


}
 ?>
