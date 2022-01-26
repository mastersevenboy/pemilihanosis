<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string','url');
		$this->load->model('Panitia_model');
		$this->load->model('Notifikasi_model');
	}

	public function index()
	{
		$data ['panitia'] = $this->Panitia_model->get_all_data();
		$this->load->view('page/daftar_panitia', $data);
	}

	public function tambah()
	{
		# code...
		$nama = $this->input->post('nama');
		$status = $this->input->post('status');

			$data = array(
				'nama' => $nama,
				'status' => $status,
				);
			$simpan = $this->Panitia_model->simpan($data);
			
			if ($simpan) {
				# code...
				$this->Notifikasi_model->notifsuksessimpan();
				redirect('Panitia','refresh');
			}else{
			$this->Notifikasi_model->notifgagalsimpan();
			redirect('Panitia','refresh');
			}

	}

	public function delete($id_panitia)
	{
		# code...
		$where = array('id_panitia' => $id_panitia );
		$del = $this->Panitia_model->delete($where);
		if ($del) {
			$this->Notifikasi_model->notifsukseshapus();
				redirect('Panitia','refresh');
		}else {
			$this->Notifikasi_model->notifgagalhapus();
				redirect('Panitia','refresh');
		}
	}

	public function update($id_panitia)
		# code...
	{
		$nama = $this->input->post('nama');
		$status = $this->input->post('status');
				
			$data = array(
				'nama' => $nama,
				'status' => $status,
				);
				# code...
			$update = $this->Panitia_model->update($data,$id_panitia);
			if ($update) {
			 	# code...
			 	$this->Notifikasi_model->notifupdate();
				redirect('Panitia','refresh');
			 } 
			else{
			$this->Notifikasi_model->notifgagalupdate();
			redirect('Panitia','refresh');
			}
	}

}

/* End of file Panitia.php */
/* Location: ./application/controllers/Panitia.php */
