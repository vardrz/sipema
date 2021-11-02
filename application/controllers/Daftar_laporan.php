<?php

class Daftar_laporan extends CI_Controller
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
		$data['title'] = 'Daftar Laporan Pengaduan - SiPeMa';
		$this->db->order_by('tgl_pengaduan', 'DESC');
		$data['data'] = $this->db->get_where('tbl_pengaduan', ['nik' => $this->session->userdata('nik')])->result_array();

		$this->db->select('*');
		$this->db->from('tbl_tanggapan');
		$this->db->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_tanggapan.id_petugas');
		$data['tanggapan'] = $this->db->get()->result_array();

		// $this->db->select('*');
		// $this->db->from('tbl_pengaduan');
		// $this->db->where('tbl_pengaduan.nik', $this->session->userdata('nik'));
		// $this->db->join('tbl_tanggapan', 'tbl_pengaduan.id_pengaduan = tbl_tanggapan.id_pengaduan', 'LEFT');
		// $this->db->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_tanggapan.id_petugas', 'LEFT');
		// $data['data'] = $this->db->get()->result_array();

		$this->load->view('front/t_head', $data);
		$this->load->view('front/t_side');
		$this->load->view('front/v_list');
		$this->load->view('front/t_foot');
	}

	// ALTER TABLE tbl_pengaduan DROP id_pengaduan;
	// ALTER TABLE tbl_pengaduan ADD id_pengaduan INT(11) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id_pengaduan);
	public function hapus()
	{
		if (!$this->input->post('foto') == '0') {
			$id = $this->input->post('id');
			$foto = $this->input->post('foto');
			$gbr = './image/' . $foto;
			unlink($gbr);
			$this->db->where('id_pengaduan', $id);
			$this->db->delete('tbl_pengaduan');
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Laporan Berhasil Dihapus!</div>');
			redirect('daftar_laporan');
		} else {
			$id = $this->input->post('id');
			$this->db->where('id_pengaduan', $id);
			$this->db->delete('tbl_pengaduan');
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Laporan Berhasil Dihapus!</div>');
			redirect('daftar_laporan');
		}
	}
}
