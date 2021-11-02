<?php 

class Laporan_proses extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('id')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('admin');
		}
	}

	public function index(){
		$this->db->order_by('tgl_pengaduan', 'DESC');
		$ambil = $this->db->get_where('tbl_pengaduan', ['status'=>'proses']);
		$jumlah = '('.$ambil->num_rows().')';

		$data['data'] = $ambil->result_array();
		$data['title'] = $jumlah.' Laporan Proses';
		$this->load->view('back/t_head', $data);
		$this->load->view('back/t_side');
		$this->load->view('back/v_lapProses');
		$this->load->view('back/t_foot');
	}

	public function fix($id){
		$data = [
			'id_pengaduan' => $id,
			'tgl_tanggapan' => $this->input->post('tgl'),
			'tanggapan' => $this->input->post('tanggapan'),
			'id_petugas' => $this->input->post('petugas')
		];
		$this->db->insert('tbl_tanggapan', $data);

		$this->db->where('id_pengaduan', $id);
		$this->db->update('tbl_pengaduan', ['status'=>'selesai']);
		redirect('admin/laporan_proses');
	}
}