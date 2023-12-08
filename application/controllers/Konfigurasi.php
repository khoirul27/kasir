<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('konfigurasi');
        $this->db->where('username', $username)->where('password', $password);
        $data = $this->db->get()->row();
        if ($data == null) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>username dan password salah
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('konfigurasi');
        } else {
            $userdata = array(
                'username'    => $data->username,
                'password'    => $data->password,
                'nama_usaha'    => $data->nama_usaha
            );
        }
        $this->session->set_userdata($userdata);
        redirect('home');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('konfigurasi');
    }

    public function hal_edit()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('konfigurasi');
        } else {

            $this->db->from('konfigurasi');
            $konfigurasi = $this->db->get()->row();

            $data = [
                'judul_halaman' => "Konfigurasi",
                'konfigurasi'   => $konfigurasi
            ];
            $this->template->load('template', 'hal_konfigurasi', $data);
        }
    }

    public function edit()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('konfigurasi');
        } else {

            $data = [
                'nama_usaha' => $this->input->post('nama_usaha'),
                'no_telfon'  => $this->input->post('no_telfon'), 
                'alamat'  => $this->input->post('alamat'), 
            ];

            $this->db->update('konfigurasi',$data);
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Konfigurasi berhasil di ubah
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('konfigurasi/hal_edit');
        }
    }
}
