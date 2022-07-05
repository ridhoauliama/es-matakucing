<?php
class Laporan_model extends CI_model
{

	public function getAllLaporan()
	{
		$this->db->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit=tbl_hasil_diagnosa.kode_penyakit', 'inner');
		return $this->db->get('tbl_hasil_diagnosa')->result_array();
	}

	public function get_per_pasien($l)
	{
		$this->db->where('id_hasil', $l['id_hasil']);
		$this->db->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit=tbl_hasil_diagnosa.kode_penyakit', 'inner');
		return $this->db->get('tbl_hasil_diagnosa')->row_array();
	}
}
