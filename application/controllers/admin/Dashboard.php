<?php 

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('id')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('admin');
		}
	}

	public function index(){
		$data['total_laporan'] = $this->db->get('tbl_pengaduan')->num_rows();
		$data['total_laporan_baru'] = $this->db->get_where('tbl_pengaduan', ['status'=>'0'])->num_rows();
		$data['total_laporan_proses'] = $this->db->get_where('tbl_pengaduan', ['status'=>'proses'])->num_rows();
		$data['total_laporan_selesai'] = $this->db->get_where('tbl_pengaduan', ['status'=>'selesai'])->num_rows();
		$data['title'] = 'Dashboard Petugas - SiPeMa';
		$this->load->view('back/t_head', $data);
		$this->load->view('back/t_side');
		$this->load->view('back/dashboard');
		$this->load->view('back/t_foot');
	}
}