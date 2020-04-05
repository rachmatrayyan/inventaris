<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('login');
		}
		$this->load->model('barang_model');
	}

	public function index()
	{
		$this->load->view('barang/data_barang');
	}

	public function read()
	{
		header('Content-Type: application/json');
		$data['data'] = $this->barang_model->read();
		echo json_encode($data);
	}

	public function add()
	{
		if ($kode = $this->input->post('kode')) {
			$data = array(
				'kode' => $kode,
				'nama' => $this->input->post('nama'),
				'id_kategori' => $this->input->post('kategori'),
			);
			if ($this->barang_model->create($data)) {
				echo json_encode('tambah');
			}
		} else {
			redirect('barang');
		}
	}

	public function update( $id = NULL )
	{
		if ($id) {
			$data = array(
				'kode' => $this->input->post('kode'),
				'nama' => $this->input->post('nama'),
				'id_kategori' => $this->input->post('kategori'),
			);
			if ($this->barang_model->update($id, $data)) {
				echo json_encode('edit');
			}
		} else {
			redirect('barang');
		}
	}

	public function delete( $id = NULL )
	{
		if ($id) {
			if ($this->barang_model->delete($id)) {
				echo json_encode('sukses');
			}
		} else {
			redirect('barang');
		}
	}

	public function get_barang()
	{
		header('Content-Type: application/json');
		$kode = $this->input->get('kode');
		echo json_encode($this->barang_model->getBarang($kode));
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
