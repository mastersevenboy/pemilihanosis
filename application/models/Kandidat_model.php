<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat_model extends CI_Model {

	function get_all_data()
	{
		$hasil = $this->db->query("SELECT * FROM tb_kandidat ORDER BY id_kandidat");
		return $hasil->result();
	}

	// Fungsi untuk melakukan proses upload file
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
	
	// Fungsi untuk menyimpan data ke database
	public function save($data){
		$this->db->insert('tb_kandidat', $data);
		return true;
	}


	function select_by_id($nis_kandidat)
	{
		$this->db->select('*');
		$this->db->from('tb_kandidat');
		$this->db->where('nis_kandidat', $nis_kandidat);
		return $this->db->get()->result();
	}

	function update($data,$kondisi)
	{
		$this->db->update('tb_kandidat', $data,$kondisi);
	}

	function delete($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_kandidat');
		return true;
	}

	function suara()
	{
		$hasil = $this->db->query("SELECT COUNT(*) AS total_suara FROM tb_suara");
		return $hasil->result();
	}

	function save_suara($data)
		{
			$this->db->insert('tb_suara', $data);
			return true;
		}

	function suara_veritifikasi($data2)
		{
			$this->db->insert('vertifikasi', $data2);
			return true;
		}

	function vertifikasiall()
	{
		$hasil = $this->db->query("SELECT * FROM vertifikasi ORDER BY nis");
		return $hasil->result();
	}

	function cekpemilih($nis)
		{
			$this->db->where('nis', $nis);

	    	$query = $this->db->get('tb_suara');

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

	function cekkandidat($nis_kandidat)
		{
			$this->db->where('nis_kandidat', $nis_kandidat);

	    	$query = $this->db->get('tb_kandidat');

	    	$count_row = $query->num_rows();

	    if ($count_row > 0) {
	      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
	        return FALSE; // here I change TRUE to false.
	     } else {
	      // doesn't return any row means database doesn't have this email
	        return TRUE; // And here false to TRUE
	     }

	     // This returns your first inserts id
	    return $nis_kandidat;
		}

	function suara_kandidat()
	{
		$hasil = $this->db->query("SELECT k.id_kandidat,k.foto,k.nis_kandidat,k.nama,k.jurusan,k.visi,k.misi,k.kelas, COUNT(v.nis_kandidat) AS suara_kandidat FROM tb_kandidat k LEFT JOIN tb_suara v on v.nis_kandidat = k.nis_kandidat GROUP BY k.nis_kandidat HAVING suara_kandidat >= 0 ORDER BY k.id_kandidat");
		return $hasil->result();
		
	}	

	function suara_terbanyak()
	{
		$hasil = $this->db->query("SELECT k.id_kandidat,k.foto,k.nis_kandidat,k.nama,k.jurusan,k.visi,k.misi,k.kelas, COUNT( v.nis_kandidat) AS suara_kandidat FROM tb_kandidat k LEFT JOIN tb_suara v on v.nis_kandidat = k.nis_kandidat GROUP BY k.nis_kandidat HAVING suara_kandidat >= 0 ORDER BY suara_kandidat DESC LIMIT 1");
		return $hasil->result();
	}

	public function chart()
	{
		$hasil = $this->db->query("SELECT k.id_kandidat,k.foto,k.nis_kandidat,k.nama, COUNT(v.nis_kandidat) AS suara_kandidat FROM tb_kandidat k LEFT JOIN tb_suara v on v.nis_kandidat = k.nis_kandidat GROUP BY k.nis_kandidat HAVING suara_kandidat >= 0 ORDER BY suara_kandidat");
		return $hasil->result();
	}

	

}

/* End of file Kandidat_model.php */
/* Location: ./application/models/Kandidat_model.php */