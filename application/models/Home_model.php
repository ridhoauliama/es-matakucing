<?php
class Home_model extends CI_Model
{
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
}
