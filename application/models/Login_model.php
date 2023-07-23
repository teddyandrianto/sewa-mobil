<?php

class Login_model extends CI_Model{
	const SESSION_KEY = 'id_pengguna';


	public function auth_login($username, $password)
	{
		$this->db->where('nomor_telpon', $username)->or_where('nomor_sim', $username);
		$pengguna = $this->db->get('tbl_pengguna')->row();
		if (!$pengguna) {
			return FALSE;
		}

		if($pengguna->password!=$password){
			return FALSE;	
		}
		$this->session->set_userdata([self::SESSION_KEY => $pengguna->id_pengguna]);
		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$id_pengguna = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where('tbl_pengguna', ['id_pengguna' => $id_pengguna]);
		return $query->row();
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}
}