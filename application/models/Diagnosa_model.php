<?php
class Diagnosa_model extends CI_model
{

	public function simpan_diagnosa($data)
	{
		$this->db->set('waktu', $data['tanggal']);
		$this->db->set('nama', $this->input->post('nama', true));
		$this->db->set('alamat', $this->input->post('alamat', true));
		$this->db->set('nilaicf', $data['max_cf']);
		$this->db->set('kode_penyakit', $data['kode_p']);
		$this->db->set('kode_gejala', $data['kode_g']);
		$this->db->insert('tbl_hasil_diagnosa');
	}

	public function get_per_pasien($id)
	{
		$this->db->where('id_hasil', $id);
		$this->db->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit=tbl_hasil_diagnosa.kode_penyakit', 'inner');
		return $this->db->get('tbl_hasil_diagnosa')->row_array();
	}
}
