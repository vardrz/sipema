<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{
		$data['title'] = 'Login Pengaduan';
		$this->load->view('front/login', $data);
		if ($this->session->userdata('nik')) {
			redirect('dashboard');
		}
	}

	public function cek_login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$getData = $this->db->get_where('tbl_masyarakat', ['username' => $user])->row_array();
		if (is_null($getData)) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">NIK tidak ditemukan!</div>');
			redirect('login');
		}else{
			if ($pass == $getData['password']) {
				$data = [
					'nik' => $getData['nik'],
					'nama' => $getData['nama']
				];
				$this->session->set_userdata($data);
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('login');
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}