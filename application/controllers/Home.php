<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Halaman Utama
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model', 'HM');
	}

	public function index()
	{
		$data['judul'] = "Sistem Pakar - Diagnosa Penyakit Tanaman Brokoli";
		$data['totalGejala'] = $this->HM->CountGejala();
		$data['totalPenyakit'] = $this->HM->CountPenyakit();
		$this->load->view('templates/Home_Header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/Home_Footer');
	}
}
