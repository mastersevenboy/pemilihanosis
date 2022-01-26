<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function login($nis,$password)
		{
			
			$query = $this->db->query("SELECT u.id_user,u.nis,u.nama,u.kelas,u.jurusan,u.level,u.status,u.password, s.suara FROM tb_user u LEFT JOIN vertifikasi s on u.nis = s.nis WHERE u.nis = '$nis' AND u.password = '$password'");



			//$hasil = $this->db->get();

			if ($query->num_rows()==1) 
			{
				return $query->result();
			}else 
			{
				return false;
			}		
		}

	function cekpass($nis,$password)
		{
			$hasil = $this->db->query("SELECT * FROM tb_user WHERE nis= '$nis' AND password = '$password' AND status= '1'");

			//$hasil = $this->db->get();

			if ($hasil->num_rows()==1) 
			{
				return $hasil->result();
			}else 
			{
				return false;
			}
		}	

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */