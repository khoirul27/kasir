<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == NULL) {
            redirect('konfigurasi');
        }
    }

	public function index()
	{
        $this->db->from('barang');
        $barang = $this->db->get()->result_array();

        $data = [
            'judul_halaman' => "Barang",
            'barang'        => $barang
        ];
		$this->template->load('template','hal_barang', array_merge($data));
	}

    public function simpan()
    {
        $kode_barang = $this->input->post('kode_barang');
        $this->db->from('barang');
        $this->db->where('kode_barang', $kode_barang);
        $data = $this->db->get()->row();
        if ($kode_barang = $data) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Kode barang sudah ada
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('barang');
        } else {
            $data = [
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'stok'        => $this->input->post('stok'),
                'expired'     => $this->input->post('expired'),
                'harga_jual'  => $this->input->post('harga_jual')
            ];
            $this->db->insert('barang',$data);
            redirect('barang');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id_barang',$id);
        $this->db->delete('barang');
        redirect('barang');
    }
}
