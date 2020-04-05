<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('login');
		}
		$this->load->model('kategori_barang_model');
	}

	public function index()
	{
		$this->load->view('barang/kategori_barang');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data['data'] = $this->kategori_barang_model->read();
		echo json_encode($data);
	}

	public function add()
	{
		if ($nama = $this->input->post('nama')) {
			$data = array(
				'nama' => $nama
			);
			if ($this->kategori_barang_model->create($data)) {
				echo json_encode('tambah');
			}
		} else {
			redirect('kategori_barang');
		}
	}

	public function update( $id = NULL )
	{
		if ($id) {
			$data = array(
				'nama' => $this->input->post('nama')
			);
			if ($this->kategori_barang_model->update($id, $data)) {
				echo json_encode('edit');
			}
		} else {
			redirect('kategori_barang');
		}
	}

	public function delete( $id = NULL )
	{
		if ($id) {
			if ($this->kategori_barang_model->delete($id)) {
				echo json_encode('sukses');
			}
		} else {
			redirect('kategori_barang');
		}
	}

	public function get_kategori()
	{
		header('Content-Type: application/json');
		$kategori = $this->input->post('kategori');
		echo json_encode($this->kategori_barang_model->getKategori($kategori));
	}
}

/* End of file Kategori_barang.php */
/* Location: ./application/controllers/Kategori_barang.php */
