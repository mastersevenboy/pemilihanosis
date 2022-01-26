<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia_model extends CI_Model {

	function get_all_data()
	{
		$hasil = $this->db->query("SELECT * FROM tb_panitia ORDER BY id_panitia");
		return $hasil->result();
	}

	function simpan($data)
	{
		# code...
		$this->db->insert('tb_panitia', $data);
		return true;
	}

	function checknama($id_panitia) {

	    $this->db->where('id_panitia', $id_panitia);

	    $query = $this->db->get('tb_panitia');

	    $count_row = $query->num_rows();

	    if ($count_row > 0) {
	      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
	        return FALSE; // here I change TRUE to false.
	     } else {
	      // doesn't return any row means database doesn't have this email
	        return TRUE; // And here false to TRUE
	     }

	     // This returns your first inserts id
	    return $nama;
	}

	function delete($where)
	{
		# code...
		$this->db->where($where);
		$this->db->delete('tb_panitia');
		return true;
	}

	function update($data,$id_panitia)
	{
		# code...
		$this->db->where('id_panitia',$id_panitia);
		$this->db->update('tb_panitia', $data);
		return true;
	}

	function ketua_panitia()
	{
		# code...
		$ketua = $this->db->query("SELECT * FROM `tb_panitia` WHERE status = 'ketua panitia' ORDER BY 'nama' ASC");
		return $ketua->result();
	}

	function kesiswaan()
	{
		# code...
		$ketua = $this->db->query("SELECT * FROM `tb_panitia` WHERE status = 'kesiswaan' ORDER BY 'nama' ASC");
		return $ketua->result();
	}

	function kepsek()
	{
		# code...
		$ketua = $this->db->query("SELECT * FROM `tb_panitia` WHERE status = 'kepala sekolah' ORDER BY 'nama' ASC");
		return $ketua->result();
	}


}

/* End of file Panitia_model.php */
/* Location: ./application/models/Panitia_model.php */