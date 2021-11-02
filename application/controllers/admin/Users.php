<?php 

class Users extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('id')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('admin');
		}elseif ($this->session->userdata('level')!='admin') {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Tidak Punya Hak Akses untuk Menu ini!</div>');
			redirect('admin/dashboard');
		}
	}

	public function index(){
		$this->db->order_by('level', 'ASC');
		$data['data'] = $this->db->get('tbl_petugas')->result_array();
		$data['title'] = 'Add User - SiPeMa';
		$this->load->view('back/t_head', $data);
		$this->load->view('back/t_side');
		$this->load->view('back/v_addUser');
		$this->load->view('back/t_foot');
	}

	public function tambah(){
		$nama		= $this->input->post('nama');
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$telp		= $this->input->post('telp');
		$level		= $this->input->post('level');

		$cek = $this->db->get_where('tbl_petugas', ['username'=>$username])->row_array();
		if (is_null($cek)) {
			$data = [
				'nama_petugas' => $nama,
				'username' => $username,
				'password' => $password,
				'telp' => $telp,
				'level' => $level
			];
			$this->db->insert('tbl_petugas', $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil ditambahkan!</div>');
			redirect('admin/users');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username sudah digunakan!</div>');
			redirect('admin/users');
		}
	}

	public function edit($id){
		$data['title'] = 'Edit User';
		$data['data'] = $this->db->get_where('tbl_petugas', ['id_petugas'=>$id])->row_array();
		$this->load->view('back/t_head', $data);
		$this->load->view('back/t_side');
		$this->load->view('back/v_editUser');
		$this->load->view('back/t_foot');
	}

	public function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$telp = $this->input->post('telp');
		$level = $this->input->post('level');

		$data = [
			'nama_petugas' => $nama,
			'username' => $username,
			'password' => $password,
			'telp' => $telp,
			'level' => $level
		];
		$this->db->where('id_petugas', $id);
		$this->db->update('tbl_petugas', $data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!</div>');
		redirect('admin/users');
	}

	// ALTER TABLE tbl_petugas DROP id_petugas;
	// ALTER TABLE tbl_petugas ADD id_petugas INT(11) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id_petugas);
	public function hapus($id){
		$this->db->where('id_petugas', $id);
		$this->db->delete('tbl_petugas');
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">User Berhasil Dihapus!</div>');
		redirect('admin/users');
	}
}