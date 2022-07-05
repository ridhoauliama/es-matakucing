<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Penyakit_model', 'penyakit');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['judul'] = "Dasgboard Admin | Data Penyakit";
		$data['tabel'] = "Daftar Penyakit Yang Terdapat Pada Infeksi Mata Kucing";
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$data['tbl_penyakit'] = $this->penyakit->getAllPenyakit();
		$data['kode'] = $this->penyakit->KodePenyakit();

		$this->load->view('templates/Admin_header', $data);
		$this->load->view('templates/Admin_sidebar', $data);
		$this->load->view('templates/Admin_topbar');
		$this->load->view('admin/penyakit/index', $data);
		$this->load->view('templates/Admin_footer');
		$this->load->view('admin/penyakit/modal_tambah_penyakit', $data);
		$this->load->view('admin/penyakit/modal_ubah_penyakit');
	}

	public function tambah()
	{
		$data['tbl_penyakit'] = $this->db->get('tbl_penyakit')->result_array();
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$this->penyakit->tambahPenyakit();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Penyakit Baru</strong> berhasil ditambah.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>'
		);
		redirect('penyakit');
	}

	public function ubah()
	{
		$data['tbl_penyakit'] = $this->db->get_where('tbl_penyakit')->result_array();
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$this->penyakit->ubahPenyakit();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Penyakit</strong> yang dipilih berhasil dirubah.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>'
		);
		redirect('penyakit');
	}

	public function hapus($id)
	{
		$this->penyakit->hapuspenyakit($id);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Penyakit</strong> yang dipilih berhasil dihapus.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>'
		);
		redirect('penyakit');
	}
}
