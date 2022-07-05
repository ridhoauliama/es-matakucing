<?php

class Gejala_model extends CI_model
{
	public function KodeGejala()
	{
		$query = $this->db->query("select max(kode_gejala) as max_id from tbl_gejala");
		$rows = $query->row();
		$kode = $rows->max_id;
		$noUrut = (int) substr($kode, 1, 2);
		$noUrut++;
		$char = "G";
		$kode = $char . sprintf("%02s", $noUrut);
		return $kode;
	}
	public function getAllGejala()
	{
		return $this->db->get('tbl_gejala')->result_array();
	}

	public function tambahGejala()
	{
		$data = [
			'id_gejala' => $this->input->post('id'),
			'kode_gejala' => $this->KodeGejala(),
			"nama_gejala" => $this->input->post('nama', true)
		];
		$this->db->insert('tbl_gejala', $data);
	}

	public function ubahGejala()
	{
		$id = $this->input->post('id');
		$data = [
			"kode_gejala" => $this->input->post('kode'),
			"nama_gejala" => $this->input->post('nama', true)
		];
		$this->db->where('id_gejala', $id);
		$this->db->update('tbl_gejala', $data);
	}

	public function hapusGejala($id)
	{
		$this->db->delete('tbl_gejala', ['id_gejala' => $id]);
	}
}
