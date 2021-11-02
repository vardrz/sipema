<?php 

Class Register extends CI_Controller{
	public function index(){
		$this->load->view('front/regist');
	}

	public function addUser(){
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$password1 = $this->input->post('password1');
		$password2 = $this->input->post('password2');
		$telp = $this->input->post('telp');

		$cekData = $this->db->get_where('tbl_masyarakat', ['nik' => $nik])->row_array();
		
		if (is_null($cekData)) {
			if (strlen($nik) == 16) {
				if ($password1 == $password2) {
					$data = [
						'nik' => $nik,
						'nama' => $nama,
						'username' => $nik,
						'password' => $password2,
						'telp' => $telp
					];

					$this->db->insert('tbl_masyarakat', $data);
					$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Akun Berhasil Dibuat, Silahkan Login.</div>');
					redirect('login');
				}else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password tidak sama!</div>');
					redirect('register');
				}
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">NIK Tidak Valid!</div>');
				redirect('register');
			}
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">NIK Sudah Terdaftar!</div>');
			redirect('register');
		}
	}
}