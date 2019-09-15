<?php
class Auth_model extends CI_Model {
  var $table = "admin";

  public function get_all() {
    return $this->db->get($this->table)->row();
  }

  //update password
  public function update($id,$data) {
    $this->db->where('admin_id',$id);
    $this->db->update($this->table,$data);
  }

}
 ?>
