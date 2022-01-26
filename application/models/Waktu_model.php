<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Waktu_model extends CI_Model {

	function get_waktu()
		{
			$get = $this->db->query("SELECT * FROM tb_waktu ORDER by id");
			return $get->result();
		}

	// function get_waktu_akhir()
	// 	{
	// 		$get = $this->db->query("SELECT * FROM tb_waktu WHERE status = '0' ORDER by id");
	// 		return $get->result();
	// 	}	

	function simpan($data)
		{
			$this->db->insert('tb_waktu', $data);
			return true;
		}

	function hapus()
	{
		$this->db->query("DELETE FROM tb_waktu");
		// $this->db->where($where);
		// $this->db->delete('tb_waktu');
		// return true;
	}

	function simpan_waktu_akhir($data)
		{
			$this->db->insert('tb_waktu', $data);
			return true;
		}

	function hapus_waktu_akhir()
	{
		$this->db->query("DELETE FROM tb_waktu WHERE status = '0'");
		return true;
	}	

}