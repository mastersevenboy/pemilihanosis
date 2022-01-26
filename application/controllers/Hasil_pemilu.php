<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_pemilu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('Login_model');
		$this->load->model('User_model');
		$this->load->library('session');
		$this->load->model('Kandidat_model');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['datauseraktif']=$this->User_model->datauseraktif();
		$data['chart'] = $this->Kandidat_model->chart();
		$data['banyak'] = $this->Kandidat_model->suara_terbanyak();
		$data['isi'] = $this->Kandidat_model->suara_kandidat();
		$this->load->view('page/hasil_pemilu',$data);
	}

	public function user()
	{
		$data['datauseraktif']=$this->User_model->datauseraktif();
		$data['chart']=$this->Kandidat_model->chart();
		$data['banyak'] = $this->Kandidat_model->suara_terbanyak();
		$data['isi'] = $this->Kandidat_model->suara_kandidat();
		$this->load->view('page_user/hasil',$data);
	}
}
?>