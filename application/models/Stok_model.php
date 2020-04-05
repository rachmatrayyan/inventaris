<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends CI_Model {

	protected $table = 'stok';

	public function read( $method = NULL )
	{
		if ($method) {
			$this->db->select('stok.id, barang.nama as barang, stok.jumlah, date_format(stok.tanggal, "%d %M %Y") as tanggal, stok.keterangan');
			$this->db->from('stok');
			$this->db->join('barang', 'barang.id = stok.id_barang');
			$this->db->where('stok.tipe', $method);
			return $this->db->get()->result();
		} else {
			$this->db->select('stok.id, barang.nama as barang, stok.jumlah, date_format(stok.tanggal, "%d %M %Y") as tanggal, stok.tipe, stok.keterangan');
			$this->db->from('stok');
			$this->db->join('barang', 'barang.id = stok.id_barang');
			return $this->db->get()->result();
		}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function masuk($id,$jumlah,$keterangan,$tanggal)
	{
		$this->db->select('stok');
		$this->db->where('id', $id);
		$stok = $this->db->get('barang')->row()->stok;
		
		$stok = $stok + $jumlah;

		$this->db->set('stok', $stok);
		$update = $this->db->where('id',$id)->update('barang');

		if ($update) {
			$data = array(
				'id_barang' => $id,
				'jumlah' => $jumlah,
				'tipe' => 'masuk',
				'tanggal' => $tanggal,
				'keterangan' => $keterangan
			);
			return $this->db->insert('stok', $data);
		}

	}

	public function keluar($id,$jumlah,$keterangan,$tanggal)
	{
		$this->db->select('stok');
		$this->db->where('id', $id);
		$stok = $this->db->get('barang')->row()->stok;
		
		$stok = $stok - $jumlah;

		$this->db->set('stok', $stok);
		$update = $this->db->where('id',$id)->update('barang');

		if ($update) {
			$data = array(
				'id_barang' => $id,
				'jumlah' => $jumlah,
				'tipe' => 'keluar',
				'tanggal' => $tanggal,
				'keterangan' => $keterangan
			);
			return $this->db->insert('stok', $data);
		}

	}

}

/* End of file Stok_model.php */
/* Location: ./application/models/Stok_model.php */