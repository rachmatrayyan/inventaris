<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	protected $table = 'barang';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		$this->db->select('barang.*, kategori_barang.nama as kategori');
		$this->db->from('barang');
		$this->db->join('kategori_barang', 'kategori_barang.id = barang.id_kategori');
		return $this->db->get()->result();
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function getBarang($kode)
	{
		$this->db->select('id, kode as text, stok');
		$this->db->like('kode', $kode, 'BOTH');
		return $this->db->get($this->table)->result();
	}

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */