<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('Login_model');
		$this->load->model('User_model');
		$this->load->model('Welcome_model');
		$this->load->model('Waktu_model');
		$this->load->library('session');
	}

	public function index($error = NULL)
	{
		$data = array(
            'error' => $error
        );
        $data['waktu'] = $this->Waktu_model->get_waktu();
        $data['peraturan'] = $this->Welcome_model->peraturan();
		$this->load->view('login',$data);
	}

	function proses_login()
	{
		$nis = $this->input->post('nis');
		$password = md5($this->input->post('password'));
		$ceklogin = $this->Login_model->cekpass($nis,$password);
		$ceklogin = $this->Login_model->login($nis,$password);

		if ($ceklogin) {
			foreach ($ceklogin as $row);

			if (($row->status) == 1) {

				$this->session->set_userdata('id_user', $row->id_user);
				$this->session->set_userdata('nis', $row->nis);
				$this->session->set_userdata('nama', $row->nama);
				$this->session->set_userdata('kelas', $row->kelas);
				$this->session->set_userdata('jurusan', $row->jurusan);
				$this->session->set_userdata('password', $row->password);
				$this->session->set_userdata('level', $row->level);
				$this->session->set_userdata('status', $row->status);
				$this->session->set_userdata('suara', $row->suara);

				if ($this->session->userdata('level')=="admin") {
					echo "<script>alert('Welcome di Aplikasi E-voting OSIS WIKA Admin');</script>";
					redirect('Welcome/index','refresh');
				}elseif ($this->session->userdata('level')=="user") {
					echo "<script>alert('Welcome di Aplikasi E-voting OSIS WIKA User');</script>";
					redirect('Welcome/user','refresh');
				}
			}else{
				$error = '<div id="notifikasi"><center><font color="red">Data belum terverifikasi. Hubungi admnistrator.</font></center></div>';
	            $this->index($error);
				/*$data['pesan']="gagal";
				$this->load->view('page/login', $data);*/
			}
		}else{

			$error = '<div id="notifikasi"><center><font color="red">Username atau password salah.</font></center></div>';
            $this->index($error);
			/*$data['pesan']="gagal";
			$this->load->view('page/login', $data);*/
		}
	}


	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login/index','refresh');
	}

	function tatacara()
	{
		$this->load->view('page/tatacara');
	}

	
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */