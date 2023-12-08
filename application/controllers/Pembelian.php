<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
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
		$this->db->from('supplier');
        $supplier = $this->db->get()->result_array();

        $this->db->from('supplier a');
		$this->db->join('pembelian b', 'a.id_supplier = b.id_supplier');
		$pembelian = $this->db->get()->result_array();

        $data = [
            'judul_halaman' => "Pembelian",
            'supplier' => $supplier,
            'pembelian' => $pembelian
        ];

        $this->template->load('template', 'data_pembelian', array_merge($data));
	}

	public function transaksi($id)
	{
		$this->db->from('supplier');
		$this->db->where('id_supplier', $id);
		$supplier = $this->db->get()->row();

		$this->db->from('barang');
		$barang = $this->db->get()->result_array();

		$kode_pembelian = $this->Kasir_model->no_pembelian();
		$this->db->from('detail_pembelian a');
		$this->db->join('barang b','a.kode_barang=b.kode_barang');
		$this->db->where('kode_pembelian', $kode_pembelian);
		$detail_pembelian = $this->db->get()->result_array();

		$this->db->from('supplier a');
		$this->db->join('pembelian b', 'a.id_supplier = b.id_supplier');
		$pembelian = $this->db->get()->result_array();

		$data = [
			'judul_halaman' => "Pembelian",
			'supplier' => $supplier,
			'barang' => $barang,
			'detail_pembelian' => $detail_pembelian,
			'pembelian' => $pembelian
		];

		$this->template->load('template', 'hal_pembelian', $data);
	}

	public function detail_pembelian($kode_pembelian,$kode_barang)
	{
		$data = [
			'kode_pembelian' => $kode_pembelian,
			'kode_barang' => $kode_barang,
			'jumlah' => "1",
			'harga_beli' => "0"
		];
		$this->db->insert('detail_pembelian', $data);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus_detail_pembelian($id)
	{
		$this->db->where('id_detail_pembelian', $id);
		$this->db->delete('detail_pembelian');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function ubah_detail_pembelian()
	{
		$data = [
			'jumlah' => $this->input->post('jumlah'),
			'harga_beli' => $this->input->post('harga_beli')
		];
		$where['id_detail_pembelian'] = $this->input->post('id_detail_pembelian');

		$this->db->update('detail_pembelian', $data, $where);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function transaksi_pembelian()
	{
		$data = [
			'kode_pembelian' 	=> $this->input->post('kode_pembelian'),
			'id_supplier'	  	=> $this->input->post('id_supplier'),
			'tanggal'		  	=> date('Y-m-d'),
			'total'			  	=> $this->input->post('total'),
			'metode_pembayaran' => $this->input->post('metode_pembayaran')
		];
		$this->db->insert('pembelian', $data);
		$this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Transaksi berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
