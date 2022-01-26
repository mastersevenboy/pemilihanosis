<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->model('login_model');
		$this->load->model('User_model');
		$this->load->model('Kandidat_model');
		$this->session->userdata('login');
		$this->load->model('Notifikasi_model');
		
		if ($this->session->userdata('level')==null) {
				redirect('Login/index','refresh');
			}
	}
	public function index()
	{
		$data['datauser']=$this->User_model->admin();
		$data['dataadmin']=$this->User_model->dataadmin();
		$data['dataadminaktif']=$this->User_model->dataadminaktif();
		$data['dataadmintidakaktif']=$this->User_model->dataadmintidakaktif();
		$this->load->view('page/admin',$data);
	}

	public function pemilih()
	{
		$getdata = $this->db->query("SELECT u.id_user,u.nis,u.nama,u.kelas,u.jurusan,u.level,u.status,u.password,s.suara FROM tb_user u LEFT JOIN vertifikasi s on u.nis = s.nis WHERE u.level = 'user' ORDER BY s.suara");
			
      	$data=array(
			"all"=>$getdata->result(),
			"judul"=>"Modal",
		);
		$data['vertifikasi']=$this->Kandidat_model->vertifikasiall();
		$data['datapengguna']=$this->User_model->user();
		$data['datauser']=$this->User_model->datauser();
		$data['datauseraktif']=$this->User_model->datauseraktif();
		$data['datausertidakaktif']=$this->User_model->datausertidakaktif();
		$this->load->view('page/pemilih',$data);
	}

	public function select_by_nis($nis)
	{
		$data['vertifikasi'] = $this->Kandidat_model->vertifikasi($nis);
		$this->load->view('page/pemilih', $data);
	}

	public function simpan()
	{
		# code...
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$level = $this->input->post('level');
		$status = $this->input->post('status');
		$password = md5($this->input->post('password'));
		$ceknis = $this->User_model->checknis($nis);

		if ($ceknis) {

			$data = array(
				'nis' => $nis,
				'nama' => $nama,
				'kelas' => $kelas,
				'jurusan' => $jurusan,
				'level' => $level,
				'status' => $status,
				'password' => $password,
				);
			$simpan = $this->User_model->simpan($data);
			
			if ($simpan) {
				# code...
				$this->Notifikasi_model->notifsuksessimpan();
				redirect('Admin','refresh');
			}else{
			$this->Notifikasi_model->notifgagalsimpan();
			redirect('Admin','refresh');
			}
		}
		else{
			$this->Notifikasi_model->notifduplikat();
			redirect('Admin','refresh');
		}
	}
	public function simpanpemilih()
	{
		# code...
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$level = $this->input->post('level');
		$status = $this->input->post('status');
		$password = md5($this->input->post('password'));
		$ceknis = $this->User_model->checknis($nis);
		
		if ($ceknis) {

			$data = array(
				'nis' => $nis,
				'nama' => $nama,
				'kelas' => $kelas,
				'jurusan' => $jurusan,
				'level' => $level,
				'status' => $status,
				'password' => $password,
				);
			$simpanpemilih = $this->User_model->simpan($data);
			
			if ($simpanpemilih) {
				# code...
				$this->Notifikasi_model->notifsuksessimpan();
				redirect('Admin/pemilih','refresh');
			}else{
			$this->Notifikasi_model->notifgagalsimpan();
			redirect('Admin/pemilih','refresh');
			}
		}
		else{
			$this->Notifikasi_model->notifduplikat();
			redirect('Admin/pemilih','refresh');
		}
	}

	public function update($nis)
		# code...
	{
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$level = $this->input->post('level');
		$status = $this->input->post('status');
		$password = md5($this->input->post('password'));
				
			$data = array(
				'nis' => $nis,
				'nama' => $nama,
				'kelas' => $kelas,
				'jurusan' => $jurusan,
				'level' => $level,
				'status' => $status,
				'password' => $password,
				);
				# code...
			$update = $this->User_model->update($data,$nis);
			if ($update) {
				/**/
			 	# code...
			 	$this->Notifikasi_model->notifupdate();
				redirect('Admin','refresh');
			 } 
			else{
			$this->Notifikasi_model->notifgagalupdate();
			redirect('Admin','refresh');
			}

	}
	
	public function updatepemilih($nis)
		# code...
	{
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$level = $this->input->post('level');
		$status = $this->input->post('status');
		$password = md5($this->input->post('password'));
		
			$data = array(
				'nis' => $nis,
				'nama' => $nama,
				'kelas' => $kelas,
				'jurusan' => $jurusan,
				'level' => $level,
				'status' => $status,
				'password' => $password,
				);
				# code...
			$update = $this->User_model->update($data,$nis);
			if ($update) {
			 	# code...
			 	$this->Notifikasi_model->notifupdate();
				redirect('Admin/pemilih','refresh');
			 } 
			else{
			$this->Notifikasi_model->notifgagalupdate();
			redirect('Admin/pemilih','refresh');
			}
	}

	public function delete($nis)
	{
		# code...
		$where = array('nis' => $nis );
		$del = $this->User_model->delete($where);
		if ($del) {
			$this->Notifikasi_model->notifsukseshapus();
				redirect('Admin','refresh');
		}else {
			$this->Notifikasi_model->notifgagalhapus();
				redirect('Admin','refresh');
		}
	}
	public function deletepemilih($nis)
	{
		# code...
		$where = array('nis' => $nis );
		$del = $this->User_model->delete($where);
		if ($del) {
			$this->Notifikasi_model->notifsukseshapus();
				redirect('Admin/pemilih','refresh');
		}else {
			$this->Notifikasi_model->notifgagalhapus();
				redirect('Admin/pemilih','refresh');
		}
	}

}