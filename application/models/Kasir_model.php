<?php 

class Kasir_model extends CI_Model{    
    public function no_pembelian()
    {
        $this->db->from('pembelian');
        $jumlah = $this->db->count_all_results();
        $no = "B".date('ymd')."00".$jumlah + 1;
        return $no;
    }
    public function no_penjualan()
    {
        $this->db->from('penjualan');
        $jumlah = $this->db->count_all_results();
        $no = "J".date('ymd')."00".$jumlah + 1;
        return $no;
    }
    public function detail_pembelian($id)
	{
        $this->db->from('detail_pembelian a');
        $this->db->join('barang b','a.kode_barang = b.kode_barang');
        $this->db->where('kode_pembelian',$id);
        return $this->db->get()->result_array();
	}
    public function detail_penjualan($id)
	{
        $this->db->from('detail_penjualan a');
        $this->db->join('barang b','a.kode_barang = b.kode_barang');
        $this->db->where('kode_penjualan',$id);
        return $this->db->get()->result_array();
	}
    
}