<?php
class Kostumer_model extends CI_Model {
  var $table = "kostumer";

  //ambil data berdasarkan Id
  public function get_by_id($id) {
    $this->db->where('kostumer_id',$id);
    return $this->db->get($this->table)->row();
  }

  //tampilkan data kostumer_nama dan jenis kelaminnya saja
  public function get_kostumer() {
    $this->db->select('kostumer_nama,kostumer_jk');
    $this->db->order_by('kostumer_nama','DESC');
    $this->db->limit(3);
    return $this->db->get($this->table)->result();
  }

  //get all data kostumer
  public function get_all() {
    return $this->db->get($this->table)->result();
  }

  //update
  public function update($id,$data) {
    $this->db->where('kostumer_id',$id);
    $this->db->update($this->table,$data);
  }

  public function delete($id_delete) {
    $this->db->where('kostumer_id',$id_delete);
    $this->db->delete($this->table);
  }

  public function insert($data) {
    $this->db->insert($this->table,$data);
  }

  //kostumer perbaris
    public function get_all_kostumer() {
      $this->db->select('kostumer_nama,kostumer_id');
      return $this->db->get($this->table)->result();
    }

}
 ?>
