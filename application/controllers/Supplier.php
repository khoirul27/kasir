<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
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
            'judul_halaman' => "Supplier",
            'supplier' => $supplier,
            'pembelian' => $pembelian
        ];

        $this->template->load('template', 'hal_supplier', array_merge($data));
    }

    public function simpan()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'cv' => $this->input->post('cv')
        ];

        $this->db->insert('supplier', $data);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Supplier berhasil di tambahkan 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('supplier');
    }

    public function edit()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'cv' => $this->input->post('cv')
        ];
        $where = [
            'id_supplier' => $this->input->post('id_supplier')
        ];

        $this->db->update('supplier',$data,$where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Supplier berhasil di edit 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('supplier');
    }

    public function hapus($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');
        $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Supplier berhasil di hapus 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('supplier');
    }
}
