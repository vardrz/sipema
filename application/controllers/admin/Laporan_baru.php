<?php 

class Laporan_baru extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('id')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('admin');
		}
	}

	public function index(){
		$this->db->order_by('tgl_pengaduan', 'DESC');
		$ambil = $this->db->get_where('tbl_pengaduan', ['status'=>'0']);
		$jumlah = '('.$ambil->num_rows().')';

		$data['data'] = $ambil->result_array();
		$data['title'] = $jumlah.' Laporan Baru';
		$this->load->view('back/t_head', $data);
		$this->load->view('back/t_side');
		$this->load->view('back/v_lapBaru');
		$this->load->view('back/t_foot');
	}

	public function verif($id){
		$this->db->where('id_pengaduan', $id);
		$this->db->update('tbl_pengaduan', ['status'=>'proses']);
		redirect('admin/laporan_baru');
	}

	public function tolak($id){
		$this->db->where('id_pengaduan', $id);
		$this->db->update('tbl_pengaduan', ['status'=>'tolak']);
		redirect('admin/laporan_baru');
	}
}