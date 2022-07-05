<?php

class Pengetahuan_model extends CI_model
{
	public function getAllPengetahuan()
	{
		$queryRule = "SELECT `tbl_pengetahuan`.`id`,`tbl_penyakit`. `id_penyakit`, `tbl_penyakit`.`kode_penyakit`,`tbl_penyakit`.`nama_penyakit`,`tbl_gejala`.`id_gejala`,`tbl_gejala`.`kode_gejala`,`tbl_gejala`.`nama_gejala`,`tbl_pengetahuan`.`cf_gejala`
    FROM `tbl_penyakit` JOIN `tbl_pengetahuan` 
    ON `tbl_penyakit`.`id_penyakit` = `tbl_pengetahuan`.`id_penyakit`
    JOIN `tbl_gejala` 
    ON `tbl_pengetahuan`.`id_gejala` = `tbl_gejala`.`id_gejala`
                        ";
		return $this->db->query($queryRule)->result_array();
	}

	public function getAllGejala()
	{
		return $this->db->get('tbl_gejala')->result_array();
	}

	public function getAllPenyakit()
	{
		return $this->db->get('tbl_penyakit')->result_array();
	}

	public function tambahPengetahuan()
	{
		$data = [
			"id_penyakit" => $this->input->post('penyakit', true),
			"id_gejala" => $this->input->post('gejala', true),
			"cf_gejala" => $this->input->post('cf_gejala', true)
		];
		$this->db->insert('tbl_pengetahuan', $data);
	}

	public function ubahPengetahuan()
	{
		$id = $this->input->post('id');
		$data = [
			"id_penyakit" => $this->input->post('penyakit', true),
			"id_gejala" => $this->input->post('gejala', true),
			"cf_gejala" => $this->input->post('cf_gejala', true)
		];
		$this->db->where('id', $id);
		$this->db->update('tbl_pengetahuan', $data);
	}
	public function hapus($id)
	{
		$this->db->delete('tbl_pengetahuan', ['id' => $id]);
	}
}
