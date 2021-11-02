<?php 

class Login extends CI_Controller{
	
	public function index()
	{
		$data['title'] = 'Login Admin';
		$this->load->view('back/login', $data);
		if ($this->session->userdata('id')) {
			redirect('admin/dashboard');
		}
	}

	public function cek_login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$getData = $this->db->get_where('tbl_petugas', ['username' => $user])->row_array();
		if (is_null($getData)) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username tidak ditemukan!</div>');
			redirect('admin/login');
		}else{
			if ($pass == $getData['password']) {
				$data = [
					'id' => $getData['id_petugas'],
					'nama' => $getData['nama_petugas'],
					'level' => $getData['level']
				];
				$this->session->set_userdata($data);
				redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('admin/login');
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}
}