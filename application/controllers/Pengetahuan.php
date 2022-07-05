<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengetahuan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Pengetahuan_model', 'MP');
	}

	public function index()
	{
		$data['judul'] = "Dashboard Admin | Basis Aturan";
		$data['tabel'] = "Daftar Basis Aturan (Relasi) Dalam Mendeteksi Penyakit Infeksi Mata Pada Kucing";
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();

		$data['gejala'] = $this->MP->getAllGejala();
		$data['penyakit'] = $this->MP->getAllPenyakit();
		$data['pengetahuan'] = $this->MP->getAllPengetahuan();

		$this->load->view('templates/Admin_header', $data);
		$this->load->view('templates/Admin_sidebar', $data);
		$this->load->view('templates/Admin_topbar');
		$this->load->view('admin/pengetahuan/index', $data);
		$this->load->view('templates/Admin_footer');
		$this->load->view('admin/pengetahuan/modal_tambah_pengetahuan', $data);
		$this->load->view('admin/pengetahuan/modal_ubah_pengetahuan', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Halaman Pengetahuan';
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();

		$this->MP->tambahPengetahuan();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Relasi Baru</strong> berhasil ditambah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('pengetahuan');
	}

	public function ubah()
	{
		$this->MP->ubahPengetahuan();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Relasi</strong> yang dipilih berhasil dirubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('pengetahuan');
	}

	public function hapus($id)
	{
		$this->MP->hapus($id);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Relasi</strong> yang dipilih berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('pengetahuan');
	}
}
