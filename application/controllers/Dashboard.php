<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('status') !== 'login') {
			redirect('login');
		}
		$data = array(
			'total_barang' => $this->db->count_all_results('barang'),
			'stok_masuk' => $this->db->where('tipe','masuk')->count_all_results('stok'),
			'stok_keluar' => $this->db->where('tipe','keluar')->count_all_results('stok'),
			'total_pengguna' => $this->db->count_all_results('pengguna')
		);
		$this->load->view('dashboard',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */