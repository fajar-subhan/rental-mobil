<?php
class Mobil_model extends CI_Model {
  var $table = 'mobil';

  public function get_by_id($id) {
    $this->db->where('mobil_id',$id);
    return $this->db->get($this->table)->row();
  }

  //update mobil
  public function update($id,$data) {
    $this->db->where('mobil_id',$id);
    $this->db->update($this->table,$data);
  }

  //delete mobil
  public function delete($id) {
    $this->db->where('mobil_id',$id);
    $this->db->delete($this->table);
  }

  //menampilkan data mobil_merk dan mobil_status
  public function get_data_mobil_merk() {
    $this->db->select('mobil_merk,mobil_status');
    $this->db->limit(3);
    return $this->db->get($this->table)->result();
  }

  //ambil semua data
  public function get_all() {
    return $this->db->get($this->table)->result();
  }

  //input data mobil baru
  public function insert($data) {
    $this->db->insert($this->table,$data);
  }

  //mobil perbaris
  public function get_mobil() {
    $this->db->select('mobil_merk,mobil_id');
    return $this->db->get($this->table)->result();
  }

  //update Status ketika transaksi baru
  public function mobil_status($id,$data2) {
    $this->db->where('mobil_id',$id);
    $this->db->update($this->table,$data2);
  }

  //update status ketika transaksi selesai
  public function mobil_status_selesai($id,$status) {
    $this->db->where('mobil_id',$id);
    $this->db->update($this->table,$status);
  }

  //update ketika di pilih
  public function update_mobil($id) {
    $this->db->where('mobil_id',$id);
  }

}
 ?>
