<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function login($nama,$password)
	{
		$user = $this->db->where('nama',$nama)->get('pengguna');
		if ($user->num_rows()) {
			$user = $user->row();
			if (password_verify($password, $user->password)) {
				$data = array(
					'user' => $user,
					'status' => 'login'
				);
				$this->session->set_userdata($data);
				return 'sukses';
			} else {
				return 'password';
			}
		} else {
			return 'username';
		}
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */