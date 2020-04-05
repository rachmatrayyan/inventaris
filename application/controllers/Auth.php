<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		if ($this->session->userdata('status') === 'login') {
			redirect('/');
		}
		if ($nama = $this->input->post('nama')) {
			$this->load->model('auth_model');
			$password = $this->input->post('password');
			echo json_encode($this->auth_model->login($nama,$password));
		} else {
			$this->load->view('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */