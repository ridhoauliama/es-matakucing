<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Diagnosa_model', 'DM');
		$this->load->model('Laporan_model', 'ML');
	}

	public function index()
	{
		$data['judul'] = "Halaman Form Diagnosa";
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();

		$data['gejala'] = $this->db->get('tbl_gejala')->result_array();

		$this->load->view('diagnosa/index', $data);
	}

	public function proses()
	{
		$this->db->truncate('tmp_pengetahuan');

		$q = $this->db->query('SELECT max(id_hasil) AS max_id FROM tbl_hasil_diagnosa')->row_array();
		$id_konsultasi = ($q['max_id'] + 1);
		$data['tanggal'] = date('Y-m-d');
		echo 'tanggal diagnosa : ' . date('d-m-Y', strtotime($data['tanggal'])) . '</br>';
		echo 'nama : ' . $this->input->post('nama', true) . '</br>';
		echo 'alamat : ' . $this->input->post('alamat', true) . '</br>';

		$jPenyakit = $this->db->get('tbl_penyakit')->num_rows();
		echo 'total penyakit : ' . $jPenyakit . '</br>';
		$jGejala = $this->input->post('incr', true);
		echo 'total gejala : ' . $jGejala . '</br></br>';
		$mb_lama = 0;
		$cf_combine = 0;
		$cf_old = 0;
		$data['cf'] = 0;
		$data['max_cf'] = 0;
		$data['kode_p'] = '';
		$data['nilai_g'] = '';
		$data['kode_g'] = '';

		for ($i = 1; $i <= $jGejala; $i++) {
			$data['nilai_g'] = $data['nilai_g'] . number_format((substr($this->input->post('id_gejala_' . $i, true), 3)), 1);
			$data['kode_g'] = $data['kode_g'] . 'G' . str_pad($i, 2, '0', STR_PAD_LEFT);
		}
		echo $data['nilai_g'] . '</br></br>';

		for ($a = 1; $a <= $jPenyakit; $a++) {
			for ($i = 1; $i <= $jGejala; $i++) {
				${'cfhe' . $a . $i . 'next'} = 0;
				${'g' . $i} = (int)(substr($this->input->post('id_gejala_' . $i, true), 0, 2));

				$this->db->where('id_penyakit', $a);
				$this->db->where('id_gejala', ${'g' . $i});
				$x = $this->db->get('tbl_pengetahuan')->num_rows();

				if ($x == 1) {
					echo 'p' . $a . ' g' . ${'g' . $i} . '</br>';
					$this->db->where('id_penyakit', $a);
					$this->db->where('id_gejala', ${'g' . $i});
					$measure = $this->db->get('tbl_pengetahuan')->row_array();
					$nilai_md = (substr($this->input->post('id_gejala_' . $i, true), 3));
					$nilai_mb = $measure['cf_gejala'];
					echo 'nilai md : ' . $nilai_md . '</br>';
					echo 'nilai mb : ' . $measure['cf_gejala'] . '</br>';

					${'cfhe' . $a . $i} = $nilai_mb * $nilai_md;
					echo 'CF[H,E] ' . $a . $i . ' : ' . $nilai_mb . ' x ' . $nilai_md . ' = <b>' . (${'cfhe' . $a . $i}) . '</b></br>';

					$this->db->set('id_penyakit', $measure['id_penyakit']);
					$this->db->set('id_gejala', $measure['id_gejala']);
					$this->db->set('cf_gejala', $measure['cf_gejala']);
					$this->db->set('md', $nilai_md);
					$this->db->set('cfhe', ${'cfhe' . $a . $i});
					$this->db->insert('tmp_pengetahuan');
				}
			}
		}

		echo "</br>==================================================================</br></br>";
		$a = 0;
		$pengetahuan = $this->db->get('tmp_pengetahuan')->result_array();
		foreach ($pengetahuan as $p) :
			if ($a < $p['id_penyakit']) {
				$id = $p['id'];
				$a = $p['id_penyakit'];
				$b = $p['id_gejala'];
				echo 'p' . $a . ' g' . $b . '</br>';
				echo 'id_penyakit : ' . $a . '</br>';

				$this->db->where('id', ($id + 1));
				$row = $this->db->get('tmp_pengetahuan')->row_array();
				$cfhe_next = $row['cfhe'];
				$cf_combine = $p['cfhe'] + $cfhe_next * (1 - $p['cfhe']);
				echo $p['cfhe'] . ' + ' . $cfhe_next . ' * (1 - ' . $p['cfhe'] . ') = ' . $cf_combine . '</br>';
				echo '----------</br>';
				$cf_combine_prev = $cf_combine;
				if ($cf_combine > $data['cf']) {
					$data['cf'] = $cf_combine;
				}
				if ($data['max_cf'] < $data['cf']) {
					$data['max_cf'] = $data['cf'];
					$data['kode_p'] = 'P' . str_pad($a, 2, '0', STR_PAD_LEFT);
				}

				$mb_lama = $p['cf_gejala'];
			} else {
				$id = $p['id'];
				$a = $p['id_penyakit'];
				$b = $p['id_gejala'];
				echo 'p' . $a . ' g' . $b . '</br>';
				echo 'id_penyakit : ' . $a . '</br>';

				$this->db->where('id', ($id + 1));
				$row2 = $this->db->get('tmp_pengetahuan')->row_array();

				if ($row2['id_penyakit'] == $a) {
					$cfhe_next = $row2['cfhe'];
				} else {
					$cfhe_next = 0;
				}

				$cf_combine = $cf_combine_prev + $cfhe_next * (1 - $cf_combine_prev);
				echo $cf_combine_prev . ' + ' . $cfhe_next . ' * ( 1 - ' . $cf_combine_prev . ' ) = ' . $cf_combine . '</br>';
				echo '----------</br>';
				$cf_combine_prev = $cf_combine;
				if ($cf_combine > $data['cf']) {
					$data['cf'] = $cf_combine;
				}
				if ($data['max_cf'] < $data['cf']) {
					$data['max_cf'] = $data['cf'];
					$data['kode_p'] = 'P' . str_pad($a, 2, '0', STR_PAD_LEFT);
				}

				$mb_lama = $p['cf_gejala'];
			}
			// echo '</br><b>Max CF P'.$a.' : ' . $data['cf'] . '</b>';
			// echo '</br><b>Max CF semua penyakit : ' . $data['max_cf'] . '</b>';
			// echo '</br><b>Penyakit yang dialami : ' . $data['kode_p'] . '</b></br></br></br>';
			$data['cf'] = 0;
		endforeach;
		$this->db->set('nilai_gejala', $data['nilai_g']);
		$this->DM->simpan_diagnosa($data);
		$this->session->set_userdata('id_periksa', $id_konsultasi);
		redirect(base_url('diagnosa/hasil?id=' . $id_konsultasi));
	}

	public function hasil()
	{
		$data['id'] = $this->input->get('id', true);
		if ($this->session->userdata('id_periksa') != $data['id']) {
			redirect(base_url('diagnosa'));
		}
		$data['judul'] = "Hasil Diagnosa";
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();

		$this->load->view('diagnosa/hasil_diagnosa', $data);
	}

	public function printHasil()
	{
		$id = $this->input->get('id', true);
		$this->load->model('Diagnosa_model');
		$this->load->model('Gejala_model');
		$hasil = $this->Diagnosa_model->get_per_pasien($id);

		require('assets/fpdf/alphapdf.php');
		$pdf = new AlphaPDF('L', 'mm', 'A4');
		$pdf->SetTitle('Laporan Hasil Konsultasi');

		$pdf->AddPage();
		$pdf->SetAlpha(1);
		$pdf->SetFont('Times', '', 10);
		$pdf->SetFont('Times', 'BU', 12);
		$pdf->Image('assets/img/kucing1.jpg', 137.5, 5, 30, 30);
		$pdf->Cell(0, 25, '', 0, 1, 'C');
		$pdf->Cell(285, 10, 'LAPORAN HASIL DIAGNOSA', 0, 1, 'C');

		$pdf->Cell(0, 5, '', 0, 1, 'C');
		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(32, 5, 'Tanggal Konsultasi : ', 0, 0, 'L');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(0, 5, date('d-m-Y', strtotime($hasil['waktu'])), 0, 1, 'L');

		$pdf->Cell(277, 3, '', 0, 1, 'C');
		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(20, 5, 'Nama Lengkap : ', 0, 1, 'L');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(20, 5, $hasil['nama'], 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(20, 5, 'Alamat : ', 0, 1, 'L');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(20, 5, $hasil['alamat'], 0, 1, 'L');

		$pdf->Cell(190, 3, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(20, 5, 'Gejala yang dipilih : ', 0, 1, 'L');
		$pdf->SetFont('Times', '', 10);
		$inc = strlen($hasil['kode_gejala']) / 3;
		$gejala = $this->Gejala_model->getAllGejala();
		$start = 0;
		for ($i = 1; $i <= $inc; $i++) {
			$g = substr($hasil['kode_gejala'], $start, 3);
			$j = substr($hasil['nilai_gejala'], $start, 3);
			if ($j == 1.0) {
				$pilihan = 'Ya';
			} else if ($j == 0.0) {
				$pilihan = 'Tidak';
			}
			$gejala = $this->db->get_where('tbl_gejala', ['kode_gejala' => $g])->row_array();
			$pdf->Cell(190, 5, $gejala['kode_gejala'] . ' - ' . $gejala['nama_gejala'] . ' ( ' . $pilihan . ' ) ', 0, 1, 'L');
			$start += 3;
		}

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(0, 5, 'Hasil Diagnosa : ', 0, 1, 'L');

		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(46, 5, $hasil['nama_penyakit'] . ' (' . $hasil['kode_penyakit'] . ') ', 0, 1, 'L');
		$pdf->Cell(0, 5, 'Dengan hasil persentase keyakinan sebesar ' . str_pad(substr(($hasil['nilaicf'] * 100), 0, 5), 2, '0') . ' %', 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(0, 5, 'Solusi : ', 0, 1, 'L');
		$pdf->SetFont('Times', '', 10);
		$pdf->MultiCell(190, 5, str_replace('- ', PHP_EOL . '', $hasil['solusi']), 0, 1, 0);

		$pdf->SetFont('Times', 'B', 12);
		$pdf->SetY(175);
		$pdf->Cell(277, 10, 'Pakar Penanggung Jawab : (drh. Dara Keumala Chan)', 0, 1, 'C');
		$pdf->Cell(277, 0, '----* Semoga bisa membantu Anda dalam mengatasi penyakit infeksi mata pada Anabul Kesayangan Anda *----', 0, 1, 'C');

		$pdf->Output('I', 'Laporan Hasil Konsultasi ' . $hasil['nama'] . '.pdf');
	}
}
