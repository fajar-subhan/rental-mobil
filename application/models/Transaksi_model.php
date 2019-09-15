<?php
class Transaksi_model extends CI_Model {
  var $table = "transaksi";

  //ambil id transaksi
  public function get_by_id($id) {
    $this->db->select('transaksi.transaksi_id,kostumer.kostumer_nama,mobil.mobil_merk,mobil.mobil_id,
    transaksi.transaksi_tgl_pinjam,transaksi.transaksi_tgl_kembali,transaksi.transaksi_harga,transaksi.transaksi_denda
    ');
    $this->db->join('kostumer','kostumer.kostumer_id = transaksi.transaksi_kostumer');
    $this->db->join('mobil','mobil.mobil_id = transaksi.transaksi_mobil');

    $this->db->where('transaksi_id',$id);
    return $this->db->get($this->table)->row();
  }

  //untuk ambil semua data join mobil dan kostumer dan tampilkan
  public function get_all() {
    $this->db->select('transaksi.transaksi_id,transaksi_tgl,kostumer.kostumer_nama,mobil.mobil_merk,
                       transaksi_tgl_pinjam,transaksi_tgl_kembali,transaksi_harga,transaksi_denda,
                       transaksi_tgldikembalikan,transaksi_totaldenda,transaksi_status
                      ');
   $this->db->join('kostumer','kostumer.kostumer_id = transaksi.transaksi_kostumer');
   $this->db->join('mobil','mobil.mobil_id = transaksi.transaksi_mobil');
   return $this->db->get($this->table)->result();
  }

  //ambil transaksi status 1=selesai
  public function get_transaksi_status() {
    $this->db->select_sum('transaksi_status');
    $this->db->where('transaksi_status',1);
    return $this->db->get($this->table)->row();
  }

  //ambil transaksi terakhir
  public function get_transaksi_terakhir() {
    $this->db->select('transaksi_tgl,transaksi_tgl_pinjam,transaksi_tgl_kembali,transaksi_harga');
    $this->db->order_by('transaksi_tgl','desc');
    $this->db->limit(2);
    return $this->db->get($this->table)->result();
  }


  public function insert($data) {
    $this->db->insert($this->table,$data);
  }


  public function update($id,$data) {
    $this->db->where('transaksi_id',$id);
    $this->db->update($this->table,$data);
  }

  //hapus transaksi
  public function delete($id) {
    $this->db->where('transaksi_id',$id);
    $this->db->delete($this->table);
  }

  //untuk laporan data transaksi
  public function laporan() {
    //tgl awal

    $tgl   = strtotime($this->input->post('tgl_awal'));
    $tgl_awal = date('Y-m-d',$tgl);

    $tgl = strtotime($this->input->post('tgl_akhir'));
    $tgl_akhir = date('Y-m-d',$tgl);


    $this->db->select('transaksi.transaksi_id,kostumer.kostumer_nama,mobil.mobil_merk,
        transaksi.transaksi_tgl,transaksi.transaksi_tgl_pinjam,transaksi.transaksi_tgl_kembali,
        transaksi.transaksi_harga,transaksi.transaksi_denda,transaksi.transaksi_tgldikembalikan,
        transaksi.transaksi_totaldenda,transaksi.transaksi_status');

    $this->db->join('kostumer','kostumer.kostumer_id = transaksi.transaksi_kostumer');
    $this->db->join('mobil','mobil.mobil_id = transaksi.transaksi_mobil');

    $this->db->where('transaksi_tgl >=',$tgl_awal);
    $this->db->where('transaksi_tgl <=',$tgl_akhir);

    return $this->db->get($this->table)->result();
  }

}
 ?>
