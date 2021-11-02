<?php

class Generate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('admin');
		} elseif ($this->session->userdata('level') != 'admin') {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Tidak Punya Hak Akses untuk Menu ini!</div>');
			redirect('admin/dashboard');
		}
	}

	public function index()
	{
		$data['tgl'] = date('Y-m-d');
		$data['title'] = 'Export Laporan';
		$this->load->view('back/t_head', $data);
		$this->load->view('back/t_side');
		$this->load->view('back/v_generate');
		$this->load->view('back/t_foot');
	}

	public function semua()
	{
		$data['laporan'] = 'DATA SEMUA LAPORAN PENGADUAN';
		$this->db->order_by('status ASC, tgl_pengaduan DESC');
		$data['data'] = $this->db->get('tbl_pengaduan')->result_array();
		// load library dompdf
		$this->load->library('pdf');
		// setting dompdf
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = 'TOTAL_LAPORAN_PER_' . date('d-m-Y');
		$this->pdf->load_view('back/laporan_pdf', $data);
	}

	public function cek_tgl()
	{
		$tgl = $this->input->post('tgl');
		$tgl_fix = date('d-m-Y', strtotime($tgl));
		redirect('admin/generate/tgl/' . $tgl_fix);
	}

	public function cek_status()
	{
		$status = $this->input->post('status');
		redirect('admin/generate/status/' . $status);
	}

	public function tgl($tgl)
	{
		$data['laporan'] = 'LAPORAN PENGADUAN PER ' . $tgl;
		$this->db->order_by('id_pengaduan', 'ASC');
		$data['data'] = $this->db->get_where('tbl_pengaduan', ['tgl_pengaduan' => $tgl])->result_array();
		// load library dompdf
		$this->load->library('pdf');
		// setting dompdf
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = 'LAPORAN_' . date('d-m-Y');
		$this->pdf->load_view('back/laporan_pdf', $data);
	}

	public function status($status)
	{
		if ($status == '0') {
			$sts = 'BARU';
		} elseif ($status == 'tolak') {
			$sts = 'DITOLAK';
		} elseif ($status == 'proses') {
			$sts = 'DIPROSES';
		} elseif ($status == 'selesai') {
			$sts = 'SELESAI';
		}
		$data['laporan'] = 'LAPORAN PENGADUAN STATUS ' . $sts;
		$this->db->order_by('id_pengaduan', 'ASC');
		$data['data'] = $this->db->get_where('tbl_pengaduan', ['status' => $status])->result_array();
		// load library dompdf
		$this->load->library('pdf');
		// setting dompdf
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = 'LAPORAN_STATUS_' . $sts;
		$this->pdf->load_view('back/laporan_pdf', $data);
	}
}
