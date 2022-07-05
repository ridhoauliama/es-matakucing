<?php

class Penyakit_model extends CI_model
{
	public function KodePenyakit()
	{
		$query = $this->db->query("select max(kode_penyakit) as max_id from tbl_penyakit");
		$rows = $query->row();
		$kode = $rows->max_id;
		$noUrut = (int) substr($kode, 1, 2);
		$noUrut++;
		$char = "P";
		$kode = $char . sprintf("%02s", $noUrut);
		return $kode;
	}
	public function getAllPenyakit()
	{
		return $this->db->get('tbl_penyakit')->result_array();
	}
	public function tambahPenyakit()
	{
		$data = [
			"kode_penyakit" => $this->KodePenyakit(),
			"nama_penyakit" => $this->input->post('nama', true),
			"solusi" => $this->input->post('solusi', true)
		];
		$this->db->insert('tbl_penyakit', $data);
	}
	public function ubahPenyakit()
	{
		$id = $this->input->post('id');
		$data = [
			"kode_penyakit" => $this->input->post('kode', true),
			"nama_penyakit" => $this->input->post('nama', true),
			"solusi" => $this->input->post('solusi', true)
		];
		$this->db->where('id_penyakit', $id);
		$this->db->update('tbl_penyakit', $data);
	}
	public function hapusPenyakit($id)
	{
		$this->db->delete('tbl_penyakit', ['id_penyakit' => $id]);
	}
}
