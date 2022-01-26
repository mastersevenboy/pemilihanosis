<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('Login_model');
		$this->load->model('User_model');
		$this->load->library('session');
		$this->load->model('Kandidat_model');
		$this->load->model('Notifikasi_model');
		$this->load->model('Waktu_model');

	}

	public function index()
	{
		$data['waktu']=$this->Waktu_model->get_waktu();
		$data['isi'] = $this->Kandidat_model->get_all_data();
		$this->load->view('page_user/pemilu',$data);
	}

	public function suara()
	{
		
		$nis = md5($this->session->userdata('nis'));
		$nis_kandidat = $this->input->post('nis_kandidat');
        $suara = "1";
        $cekpemilih = $this->Kandidat_model->cekpemilih($nis);
        $nis2 = $this->session->userdata('nis');
        $suara2 = "1";

        $data2 = array('nis' => $nis2,
        			   'suara' => $suara2,
    					);
        $this->Kandidat_model->suara_veritifikasi($data2);

        if ($cekpemilih) {

        $data = array(
                        'nis' => $nis,
                        'nis_kandidat' => $nis_kandidat,
                        'suara' => $suara,
                    );

        $simpan=$this->Kandidat_model->save_suara($data);
        if ($simpan) {
        	$this->Notifikasi_model->notifsuksessimpan();
				redirect('Login/logout','refresh');
        }else{
			$this->Notifikasi_model->notifgagalsimpan();
			redirect('pemilu/Pemilihan','refresh');
			}
	    }else{
			$this->Notifikasi_model->notifduplikat();
			redirect('pemilu/Pemilihan','refresh');
		}
	}

	public function berakhir()
	{
		# code...
		$data['waktu']=$this->Waktu_model->get_waktu();
		$data['isi'] = $this->Kandidat_model->get_all_data();
		$this->load->view('page_user/pemilu_pilih',$data);
	}

}
?>