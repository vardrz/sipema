<?php 

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('nik')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('login');
		}
	}

	public function index(){
		$data['total_laporan'] = $this->db->get_where('tbl_pengaduan', ['nik'=>$this->session->userdata('nik')])->num_rows();
		$data['total_laporan_tolak'] = $this->db->get_where('tbl_pengaduan', ['nik'=>$this->session->userdata('nik'),'status'=>'tolak'])->num_rows();
		$data['total_laporan_proses'] = $this->db->get_where('tbl_pengaduan', ['nik'=>$this->session->userdata('nik'),'status'=>'proses'])->num_rows();
		$data['total_laporan_selesai'] = $this->db->get_where('tbl_pengaduan', ['nik'=>$this->session->userdata('nik'),'status'=>'selesai'])->num_rows();
		$data['title'] = 'Dashboard User - SiPeMa';
		$this->load->view('front/t_head', $data);
		$this->load->view('front/t_side');
		$this->load->view('front/dashboard');
		$this->load->view('front/t_foot');
	}
}