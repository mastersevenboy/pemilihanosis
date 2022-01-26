<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('Login_model');
		$this->load->model('User_model');
		$this->load->model('Kandidat_model');
		$this->load->model('Welcome_model');
		$this->load->model('Panitia_model');
		$this->load->library('session');
	}

	public function index()
	{
		$getdata = $this->db->query("SELECT u.id_user,u.nis,u.nama,u.kelas,u.jurusan,u.level,u.status,u.password,s.suara FROM tb_user u LEFT JOIN vertifikasi s on u.nis = s.nis WHERE u.level = 'user' ORDER BY s.suara");
			
      	$data=array(
			"all"=>$getdata->result(),
			"judul"=>"Modal",
		);
		$data['isi'] = $this->Kandidat_model->get_all_data();
		$data ['panitia'] = $this->Panitia_model->get_all_data();
		$data['banyak'] = $this->Kandidat_model->suara_terbanyak();
		$data['datauseraktif']=$this->User_model->datauseraktif();
		$data['chart']=$this->Kandidat_model->chart();
		$data['isi'] = $this->Kandidat_model->suara_kandidat();
		$this->load->view('page/laporan',$data);
	}

	public function cetak_pemilih()
	{
		$getdata = $this->db->query("SELECT u.id_user,u.nis,u.nama,u.kelas,u.jurusan,u.level,u.status,u.password,s.suara FROM tb_user u LEFT JOIN vertifikasi s on u.nis = s.nis WHERE u.level = 'user' ORDER BY s.suara");
			
      	$data=array(
			"all"=>$getdata->result(),
			"judul"=>"Modal",
		);
		$data['ketua'] = $this->Panitia_model->ketua_panitia();
		$data['kesiswaan'] = $this->Panitia_model->kesiswaan();
		$data['kepsek'] = $this->Panitia_model->kepsek();
		$data ['panitia'] = $this->Panitia_model->get_all_data();
		$data['keterangan'] = "Laporan Data Pemilih";
		$this->load->view('page/cetak_laporan_pemilih', $data);
	}

	public function cetak_kandidat()
	{
		$data['ketua'] = $this->Panitia_model->ketua_panitia();
		$data['kesiswaan'] = $this->Panitia_model->kesiswaan();
		$data['kepsek'] = $this->Panitia_model->kepsek();
		$data ['panitia'] = $this->Panitia_model->get_all_data();
		$data['isi'] = $this->Kandidat_model->get_all_data();
		$data['keterangan'] = "Laporan Data Calon Kandidat";
		$this->load->view('page/cetak_laporan_kandidat',$data);
	}

	public function cetak_pemenang()
	{
		$data['ketua'] = $this->Panitia_model->ketua_panitia();
		$data['kesiswaan'] = $this->Panitia_model->kesiswaan();
		$data['kepsek'] = $this->Panitia_model->kepsek();
		$data ['panitia'] = $this->Panitia_model->get_all_data();
		$data['datauseraktif']=$this->User_model->datauseraktif();
		$data['banyak'] = $this->Kandidat_model->suara_terbanyak();
		$data['keterangan'] = "Laporan Data Pemenang";
		$this->load->view('page/cetak_laporan_pemenang',$data);
	}

	public function cetak_suara()
	{
		$data['ketua'] = $this->Panitia_model->ketua_panitia();
		$data['kesiswaan'] = $this->Panitia_model->kesiswaan();
		$data['kepsek'] = $this->Panitia_model->kepsek();
		$data ['panitia'] = $this->Panitia_model->get_all_data();
		$data['isi'] = $this->Kandidat_model->suara_kandidat();
		$data['keterangan'] = "Laporan Data Suara Calon Kandidat";
		$this->load->view('page/cetak_laporan_suara',$data);
	}

	public function cetak_susunan_panitia()
	{
		$data['ketua'] = $this->Panitia_model->ketua_panitia();
		$data['kesiswaan'] = $this->Panitia_model->kesiswaan();
		$data['kepsek'] = $this->Panitia_model->kepsek();
		$data ['panitia'] = $this->Panitia_model->get_all_data();
		$data['keterangan'] = "Laporan Data Susunan Panitia";
		$this->load->view('page/cetak_laporan_panitia',$data);
	}

}
?>