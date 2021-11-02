<?php

class Home extends CI_Controller{

	public function index(){
		$data['title'] = 'SiPeMa - Sistem Pengaduan Masyarakat';
		$this->load->view('front/home', $data);
		if ($this->session->userdata('nik')) {
			redirect('dashboard');
		}
	}
}