<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	
	function datauserall()
	{
		$query = $this->db->query("SELECT COUNT(*) AS totaluserall FROM tb_user");
		return $query->result();
	}
	function datakandidat()
	{
		$query = $this->db->query("SELECT COUNT(*) AS totalkandidat FROM tb_kandidat");
		return $query->result();
	}
	function datapemilih()
	{
		$query = $this->db->query("SELECT COUNT(*) AS totalpemilih FROM tb_suara");
		return $query->result();
	}

	function peraturan()
	{
		$query = $this->db->query("SELECT * FROM tb_aturan ORDER BY id");
		return $query->result();
	}

	function select_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('tb_aturan');
		$this->db->where('id', $id);
		return $this->db->get()->result();
	}

	function update($data,$kondisi)
	{
		$this->db->update('tb_aturan', $data, $kondisi);
		// $this->db->where('id',$kondisi);
		// $this->db->update('tb_aturan',$data);
		// return true;
	}

	function delete_aturan($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_aturan');
		return true;
	}

	public function save($data){
		$this->db->insert('tb_aturan', $data);
		return true;
	}

	public function upload(){
		$config['upload_path'] = './gambar/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
}