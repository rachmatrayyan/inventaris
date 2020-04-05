<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_barang_model extends CI_Model {

	protected $table = 'kategori_barang';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		return $this->db->get($this->table)->result();
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

	public function getKategori($kategori='')
	{
		$this->db->select('id, nama as text');
		$this->db->like('nama', $kategori, 'BOTH');
		return $this->db->get($this->table)->result();
	}

}

/* End of file Kategori_barang_model.php */
/* Location: ./application/models/Kategori_barang_model.php */