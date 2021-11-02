<?php

class Lapor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('nik')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('login');
		}
	}

	public function index()
	{
		$hari_ini = $this->db->get_where('tbl_pengaduan', ['tgl_pengaduan' => date('d-m-Y'), 'nik' => $this->session->userdata('nik')])->row_array();
		if ($hari_ini) {
			$data['hari_ini'] = 'sudah';
		} else {
			$data['hari_ini'] = 'belum';
		}
		$data['title'] = 'Buat Laporan - SiPeMa';
		$this->load->view('front/t_head', $data);
		$this->load->view('front/t_side');
		$this->load->view('front/v_lapor');
		$this->load->view('front/t_foot');
	}

	public function tambah()
	{
		$tgl 	= $this->input->post('tgl');
		$nik 	= $this->input->post('nik');
		$judul 	= $this->input->post('judul');
		$isi 	= $this->input->post('isi');

		$config['upload_path']      = './image/';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = '2048';
		$config['max_width']        = '0';
		$config['max_height']       = '0';
		$config['file_name']        = $nik . '_' . $tgl;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$data = [
				'tgl_pengaduan'	=> $tgl,
				'nik'			=> $nik,
				'judul_laporan'	=> $judul,
				'isi_laporan'	=> $isi,
				'foto'			=> '0',
				'status'		=> '0'
			];
			$this->db->insert('tbl_pengaduan', $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Laporan Berhasil Dikirim!</div>');
			redirect('lapor');
		} else {
			$data = [
				'tgl_pengaduan'	=> $tgl,
				'nik'			=> $nik,
				'judul_laporan'	=> $judul,
				'isi_laporan'	=> $isi,
				'foto'			=> $this->upload->data('file_name'),
				'status'		=> '0'
			];
			$this->db->insert('tbl_pengaduan', $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Laporan Berhasil Dikirim!</div>');
			redirect('lapor');
		}
	}
}
