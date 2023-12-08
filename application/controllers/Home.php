<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == NULL) {
            redirect('konfigurasi');
        }
    }
	public function index()
	{
        $data['judul_halaman'] = "Home" ;

		$this->template->load('template','home',$data);
	}
}
