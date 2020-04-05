<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('login');
		} elseif ($this->session->userdata('user')->role !== '1') {
			redirect('error');
		}
		$this->load->model('pengguna_model');
	}

	public function index()
	{
		$this->load->view('pengguna');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data['data'] = $this->pengguna_model->read();
		echo json_encode($data);
	}

	public function add()
	{
		if ($nama = $this->input->post('nama')) {
			$data = array(
				'nama' => $nama,
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role' => $this->input->post('role'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			);
			if ($this->input->post('foto') !== 'undefined') {
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['writable'] = true;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto')){
					echo json_encode('error');
				} else {
					$data['foto'] = $this->upload->data('file_name');
				}
			} else {
				$data['foto'] = 'default.jpg';
			}
			if ($this->pengguna_model->create($data)) {
				echo json_encode('tambah');
			}
		} else {
			redirect('pengguna');
		}
	}

	public function update( $id = NULL )
	{
		if ($id) {
			$data = array(
				'nama' => $this->input->post('nama'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role' => $this->input->post('role'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			);
			if ($this->input->post('foto') !== 'undefined') {
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['writable'] = true;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto')){
					echo json_encode('error');
				} else {
					$data['foto'] = $this->upload->data('file_name');
				}
			}
			if ($this->pengguna_model->update($id,$data)) {
				echo json_encode('edit');
			}
		} else {
			redirect('pengguna');
		}
	}

	public function delete( $id = NULL )
	{
		if ($id) {
			if ($this->pengguna_model->delete($id)) {
				echo json_encode('sukses');
			}
		} else {
			redirect('pengguna');
		}
	}

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */