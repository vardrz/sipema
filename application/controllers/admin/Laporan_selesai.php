<?php 

class Laporan_selesai extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('id')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('admin');
		}
	}

	public function index(){
		$this->db->order_by('tgl_pengaduan', 'DESC');
		$data['data'] = $this->db->get_where('tbl_pengaduan', ['status'=>'selesai'])->result_array();

		$this->db->select('*');
		$this->db->from('tbl_tanggapan');
		$this->db->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_tanggapan.id_petugas');
		$data['tanggapan'] = $this->db->get()->result_array();
		
		$data['title'] = 'Laporan Selesai';
		$this->load->view('back/t_head', $data);
		$this->load->view('back/t_side');
		$this->load->view('back/v_lapSelesai');
		$this->load->view('back/t_foot');
	}
}