<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	function save($data)
	{
			$this->db->insert('tb_user', $data);
			return true;		
	}

	function ceknis($nis)
	{
		    $this->db->where('nis', $nis);

		    $query = $this->db->get('tb_user');

		    $count_row = $query->num_rows();

		    if ($count_row > 0) {
		        return FALSE;
		    } else {
		        return TRUE;
		    }
	}

	function ceknismaster($nis)
	{
		    $this->db->where('nis', $nis);

		    $query = $this->db->get('tb_master_siswa');

		    $count_row = $query->num_rows();

		    if ($count_row > 0) {
		        return FALSE;
		    } else {
		        return TRUE;
		    }
	}

}

/* End of file Register_model.php */
/* Location: ./application/models/Register_model.php */