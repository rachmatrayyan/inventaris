<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('login');
		}
		$this->load->model('stok_model');
	}

	public function index()
	{
		$this->load->view('stok/data_stok');
	}

	public function read( $method = NULL )
	{
		header('Content-Type: application/json');
		if ($method) {
			switch ($method) {
				case 'masuk':
					$data['data'] = $this->stok_model->read('masuk');
					echo json_encode($data);
					break;
				case 'keluar':
					$data['data'] = $this->stok_model->read('keluar');
					echo json_encode($data);
					break;
				default:
					redirect('stok');
					break;
			}
		} else {
			$data['data'] = $this->stok_model->read();
			echo json_encode($data);
		}
	}

	public function delete( $id = NULL )
	{
		if ($id) {
			if ($this->stok_model->delete($id)) {
				echo json_encode('sukses');
			}
		} else {
			echo "b";
		}
	}

	public function masuk()
	{
		if ($id = $this->input->post('kode')) {
			$jumlah = $this->input->post('jumlah');
			$keterangan = $this->input->post('keterangan') == '' ? 'Tidak Ada' : $this->input->post('keterangan');
			$tanggal = $this->input->post('tanggal');
			if ($this->stok_model->masuk($id,$jumlah,$keterangan,$tanggal)) {
				echo json_encode('sukses');
			}
		} else {
			$this->load->view('stok/masuk');
		}
	}

	public function keluar()
	{
		if ($id = $this->input->post('kode')) {
			$jumlah = $this->input->post('jumlah');
			$keterangan = $this->input->post('keterangan') == '' ? 'Tidak Ada' : $this->input->post('keterangan');
			$tanggal = $this->input->post('tanggal');
			if ($this->stok_model->keluar($id,$jumlah,$keterangan,$tanggal)) {
				echo json_encode('sukses');
			}
		} else {
			$this->load->view('stok/keluar');
		}
	}

}

/* End of file Stok.php */
/* Location: ./application/controllers/Stok.php */