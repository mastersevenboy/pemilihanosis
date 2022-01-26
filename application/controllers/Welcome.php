<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('Login_model');
		$this->load->model('User_model');
		$this->load->model('Welcome_model');
		$this->load->model('Waktu_model');
		$this->load->model('Notifikasi_model');
		$this->load->library('upload');
		$this->load->library('session');
		
		if ($this->session->userdata('level')==null) {
				redirect('Login/index','refresh');
			}
	}

	public function chart()
	{
		$this->load->view('chart');
	}

	public function index()
	{	
		if ($this->session->userdata('level')=="admin") {
		$data['peraturan'] = $this->Welcome_model->peraturan();
		$data['datauserall']=$this->Welcome_model->datauserall();
		$data['datakandidat']=$this->Welcome_model->datakandidat();
		$data['datapemilih']=$this->Welcome_model->datapemilih();
		$data['waktu']=$this->Waktu_model->get_waktu();
		// $data['waktu_akhir']=$this->Waktu_model->get_waktu_akhir();
		$this->load->view('welcome',$data);	

		}elseif ($this->session->userdata('level')=="user") {
		$data['waktu']=$this->Waktu_model->get_waktu();
		// $data['waktu_akhir']=$this->Waktu_model->get_waktu_akhir();
		$data['peraturan'] = $this->Welcome_model->peraturan();
		$data['datauserall']=$this->Welcome_model->datauserall();
		$data['datakandidat']=$this->Welcome_model->datakandidat();
		$data['datapemilih']=$this->Welcome_model->datapemilih();
		$this->load->view('page_user/welcome',$data);	
		}
	}

	public function user()
	{
		$data['waktu']=$this->Waktu_model->get_waktu();
		$data['peraturan'] = $this->Welcome_model->peraturan();
		$data['datauserall']=$this->Welcome_model->datauserall();
		$data['datakandidat']=$this->Welcome_model->datakandidat();
		$data['datapemilih']=$this->Welcome_model->datapemilih();
		$this->load->view('page_user/welcome',$data);	
	}

	public function aturan()
	{
		# code...
		$data['peraturan'] = $this->Welcome_model->peraturan();
		$this->load->view('page/aturan', $data);
	}

	function get_data($id)
	{
		$data['peraturan'] = $this->Welcome_model->select_by_id($id);
		$this->load->view('page/aturan', $data);
	}

	public function aturan_tambah()
	{
		# code...
		$ketentuan = $this->input->post('ketentuan');
		$panduan = $this->input->post('panduan');
		$path = './assets/images/';

  		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '500';
		$config['remove_space'] = TRUE;
		$config['file_name'] = $_FILES['input_gambar']['name'];

		$this->upload->initialize($config);

		if (!empty($_FILES['input_gambar']['name'])) {
	        if ( $this->upload->do_upload('input_gambar') ) {
	            $foto = $this->upload->data();
	            $data = array(
	            				// 'id' => $id,
	                        	'ketentuan' => $ketentuan,
								'panduan' => $panduan,
                            	'foto'  => $foto['file_name'],
	                        	
	                        );

			$simpan = $this->Welcome_model->save($data);
              redirect('Welcome/aturan','refresh');
	        }else {
              die("gagal Simpan");
              redirect('Welcome/aturan','refresh');
        }
       
		}else {
	      $data = array(
	                        'ketentuan' => $ketentuan,
							'panduan' => $panduan,
                            );
        $this->Welcome_model->save($data);
              redirect('Welcome/aturan','refresh');
	    }
	}

	function aturan_update($id)
	{
		// $id = $this->input->post('id');
		$ketentuan = $this->input->post('ketentuan');
		$panduan = $this->input->post('panduan');

		$path = './assets/images/';

      	$kondisi = array('id' => $id );

		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '1024';
		$config['remove_space'] = TRUE;
		$config['file_name'] = $_FILES['input_gambar']['name'];
		
		$this->upload->initialize($config);

		if (!empty($_FILES['input_gambar']['name'])) {
	        if ( $this->upload->do_upload('input_gambar') ) {
	            $foto = $this->upload->data();
	            $data = array(
	                        	'id' => $id,
								'ketentuan' => $ketentuan,
								'panduan' => $panduan,
                            	'foto'  => $foto['file_name'],
                            );
              // hapus foto pada direktori
              @unlink($path.$this->input->post('filelama'));

							$this->Welcome_model->update($data,$kondisi);
              redirect('Welcome/aturan','refresh');
	        }else {
              die("gagal update");
	        }
	    }else {
	      $data = array('id' => $id,
							'ketentuan' => $ketentuan,
							'panduan' => $panduan,
                            );
	        $this->Welcome_model->update($data,$kondisi);
              redirect('Welcome/aturan','refresh');
	    }
	}
	function aturan_delete($id)
	{
		$path = './assets/images/';
		@unlink($path.$foto);

	    $where = array('id' => $id);
	    $del = $this->Welcome_model->delete_aturan($where);
	    if ($del) {
			$this->Notifikasi_model->notifsukseshapus();
				redirect('Welcome/aturan','refresh');
		}else {
			$this->Notifikasi_model->notifgagalhapus();
				redirect('Welcome/aturan','refresh');
		}
	}

	function simpan_waktu()
	{
		$tanggal = $this->input->post('tanggal');
		$time = $this->input->post('time');
		// $status = $this->input->post('status');
		$datetime = "$tanggal $time";

		$data = array(	'waktu'	 => $datetime);
		$this->Waktu_model->hapus();
		$hasil = $this->Waktu_model->simpan($data);
		if ($hasil) {
			redirect('Welcome','refresh');
		}
	}

}
