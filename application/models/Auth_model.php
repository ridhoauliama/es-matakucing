<?php

class Auth_model extends CI_model
{
	public function cek_username($user)
	{
		$x = $this->db->get_where('tbl_user', array('username' => $user));
		$a = $x->num_rows();
		if ($a == 1) {
			return $this->db->get_where('tbl_user', array('username' => $user))->result_array();
		}
	}

	public function simpan_password($data)
	{
		$this->db->where('username', $data['user']);
		$this->db->update('tbl_user', array('password' => $data['pass_hash']));
	}
}
