<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kasir_model');
		if ($this->session->userdata('username') == NULL) {
			redirect('konfigurasi');
		}
	}

	public function index()
	{
		$this->db->from('penjualan');	
		$penjualan = $this->db->get()->result_array();

		$data = [
			'judul_halaman' => "Penjualan",
			'penjualan' => $penjualan
		];

		$this->template->load('template','data_penjualan', $data);
	}

	public function transaksi()
	{
		$this->db->from('barang');
		$this->db->order_by('id_barang','asc');
		$barang = $this->db->get()->result_array();

		$kode_pembelian = $this->Kasir_model->no_penjualan();
		$this->db->from('detail_penjualan a');
		$this->db->join('barang b','a.kode_barang=b.kode_barang');
		$this->db->where('kode_penjualan', $kode_pembelian);
		$detail_penjualan = $this->db->get()->result_array();

		$data = [
			'judul_halaman' => "Pembelian",
			'barang' => $barang,
			'detail_penjualan' => $detail_penjualan,
		];

		$this->template->load('template','hal_penjualan', $data);
	}

	public function detail_penjualan($kode_penjualan,$kode_barang)
	{
		$data = [
			'kode_penjualan' => $kode_penjualan,
			'kode_barang' => $kode_barang,
			'jumlah' => "1",
		];
		$this->db->insert('detail_penjualan', $data);
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function hapus_detail_penjualan($id)
	{
		$this->db->where('id_detail_penjualan', $id);
		$this->db->delete('detail_penjualan');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function ubah_detail_penjualan()
	{
		$data = [
			'jumlah' => $this->input->post('jumlah'),
		];
		$where['id_detail_penjualan'] = $this->input->post('id_detail_penjualan');

		$this->db->update('detail_penjualan', $data, $where);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function transaksi_penjualan()
	{
		$data = [
			'kode_penjualan' 	=> $this->input->post('kode_penjualan'),
			'tanggal'		  	=> date('Y-m-d'),
			'total'			  	=> $this->input->post('total'),
			'nama_pelanggan' => $this->input->post('nama_pelanggan')
		];
		$this->db->insert('penjualan', $data);
		$this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Transaksi berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
