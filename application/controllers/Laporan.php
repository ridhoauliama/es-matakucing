<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Laporan_model', 'ML');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard Admin | Menu Laporan';
		$data['tabel'] = 'Hasil Riwayat Konsultasi Pengguna';

		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$data['laporan'] = $this->ML->getAllLaporan();

		$this->load->view('templates/Admin_header', $data);
		$this->load->view('templates/Admin_sidebar', $data);
		$this->load->view('templates/Admin_topbar');
		$this->load->view('admin/laporan/index', $data);
		$this->load->view('templates/Admin_footer');
	}

	public function hapusLaporan()
	{
		$this->db->truncate('tbl_hasil_diagnosa');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Seluruh Data Laporan</strong> berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('laporan');
	}

	public function cetakLaporan()
	{
		require('assets/fpdf/alphapdf.php');
		$this->load->model('Laporan_model');
		$laporan = $this->Laporan_model->getAllLaporan();

		$pdf = new AlphaPDF('L', 'mm', 'A4');
		$pdf->SetTitle('Laporan - Riwayat konsultasi Admin');

		$pdf->AddPage();
		$pdf->SetAlpha(1);
		$pdf->SetFont('Times', '', 10);
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Image('assets/img/kucing1.jpg', 137.5, 5, 30, 30);
		$pdf->Cell(0, 25, '', 0, 1, 'C');
		$pdf->Cell(285, 10, 'Data Laporan - Riwayat Hasil Konsultasi Pasien Dalam Mendiagnosa Penyakit Infeksi Pada Mata Kucing', 0, 1, 'C');

		$pdf->Cell(277, 0, '', 0, 1, 'C');
		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(10, 10, 'Laporan Hasil :', 0, 1, 'L');
		$pdf->Cell(10, 0, 'Tanggal Cetak Laporan : ' . date('d-m-Y'), 0, 1, 'L');
		$pdf->Cell(277, 4, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(10, 8, 'No', 1, 0, 'C');
		$pdf->Cell(30, 8, 'Tanggal Diagnosa', 1, 0, 'C');
		$pdf->Cell(50, 8, 'Nama Pengguna', 1, 0, 'C');
		$pdf->Cell(82, 8, 'Alamat', 1, 0, 'C');
		// $pdf->Cell(37, 8, 'Jawaban Gejala', 1, 0, 'C', 1);
		$pdf->Cell(60, 8, 'Hasil Diagnosa', 1, 0, 'C');
		$pdf->Cell(45, 8, 'Persentase Keyakinan (%)', 1, 1, 'C');

		$pdf->SetFont('Times', '', 10);
		$i = 1;
		foreach ($laporan as $l) :
			$pdf->Cell(10, 5, $i, 1, 0, 'C');
			$pdf->Cell(30, 5, date('d-m-Y', strtotime($l['waktu'])), 1, 0, 'C');
			$pdf->Cell(50, 5, $l['nama'], 1, 0, 'C');
			$pdf->Cell(82, 5, $l['alamat'], 1, 0, 'L');
			// $pdf->MultiCell(37, 6, $l['nilai_gejala'], 1, 1, 0);
			$pdf->Cell(60, 5, $l['nama_penyakit'] . ' (' . $l['kode_penyakit'] . ')', 1, 0, 'C');
			$pdf->Cell(45, 5, str_pad(substr(($l['nilaicf'] * 100), 0, 5), 2, '0') . ' %', 1, 1, 'C');
			$i++;
		endforeach;

		$pdf->Output('I', 'Data Laporan - Hasil Riwayat Konsultasi.pdf');
	}
}
