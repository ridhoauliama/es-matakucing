<?php

class Admin_model extends CI_model
{
	public function getAllProfile()
	{
		return $this->db->get('tbl_user')->result_array();
	}

	public function CountGejala()
	{
		$query = $this->db->get('tbl_gejala');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function CountPenyakit()
	{
		$query = $this->db->get('tbl_penyakit');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function CountPengetahuan()
	{
		$query = $this->db->get('tbl_pengetahuan');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function CountLaporan()
	{
		$query = $this->db->get('tbl_hasil_diagnosa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function ubahAdmin()
	{
		$id = $this->input->post('id_user');
		$data = [
			"nama_user" => $this->input->post('nama', true),
			"username" => $this->input->post('username', true)
		];
		$this->db->where('id_user', $id);
		$this->db->update('tbl_user', $data);
	}

	public function ubahPassword($data)
	{
		$this->db->set('password', $data['pass_hash']);
		$this->db->where('id_user', $data['user']);
		$this->db->update('tbl_user');
	}
}
