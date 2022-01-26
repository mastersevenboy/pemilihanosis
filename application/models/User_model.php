<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function get_all_data()
	{
		$hasil = $this->db->query("SELECT * FROM tb_user ORDER BY id_user");
		return $hasil->result();
	}

	function admin()
	{
		$admin = $this->db->query("SELECT * FROM `tb_user` WHERE level = 'admin' ORDER BY 'nama' ASC");
		return $admin->result();
	}

	// function profil()
	// {
	// 	$query =$this->db->query("SELECT * FROM tb_user WHERE nis = '$nis' LIMIT 1");
	// 	return $query->result();
	// }

	function dataadmin()
	{
		$query = $this->db->query("SELECT COUNT(*) AS totaladmin FROM tb_user WHERE level = 'admin' ORDER BY 'nama'");
		return $query->result();
	}

	function dataadminaktif()
	{
		$query = $this->db->query("SELECT COUNT(*) AS totaladminaktif FROM tb_user WHERE level = 'admin' and status = '1'");
		return $query->result();
	}

	function dataadmintidakaktif()
	{
		$query = $this->db->query("SELECT COUNT(*) AS totaladmintidakaktif FROM tb_user WHERE level = 'admin' and status = '0'");
		return $query->result();
	}

	function user()
	{
		$user = $this->db->query("SELECT u.id_user,u.nis,u.nama,u.kelas,u.jurusan,u.level,u.status,u.password,s.suara FROM tb_user u LEFT JOIN tb_suara s on u.nis = s.nis WHERE u.level = 'user'");
		return $user->result();
	}

	function simpan($data)
	{
		# code...
		$this->db->insert('tb_user', $data);
		return true;
	}

	function update($data,$nis)
	{
		# code...
		$this->db->where('nis',$nis);
		$this->db->update('tb_user', $data);
		return true;
	}

	function delete($where)
	{
		# code...
		$this->db->where($where);
		$this->db->delete('tb_user');
		return true;
	}

	function checknis($nis) {

	    $this->db->where('nis', $nis);

	    $query = $this->db->get('tb_user');

	    $count_row = $query->num_rows();

	    if ($count_row > 0) {
	      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
	        return FALSE; // here I change TRUE to false.
	     } else {
	      // doesn't return any row means database doesn't have this email
	        return TRUE; // And here false to TRUE
	     }

	     // This returns your first inserts id
	    return $nis;
	}

	function datauser()
	{
		$query = $this->db->query("SELECT COUNT(*) AS totaluser FROM tb_user WHERE level = 'user' ORDER BY 'nama'");
		return $query->result();
	}

	function datauseraktif()
	{
		$query = $this->db->query("SELECT COUNT(*) AS totaluseraktif FROM tb_user WHERE level = 'user' and status = '1'");
		return $query->result();
	}
	
	function datausertidakaktif()
	{
		$query = $this->db->query("SELECT COUNT(*) AS totalusertidakaktif FROM tb_user WHERE level = 'user' and status = '0'");
		return $query->result();
	}
}