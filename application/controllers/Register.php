<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string','url');
		$this->load->model('Register_model');
		$this->load->model('Waktu_model');
		
	}

	public function index($error = NULL)
	{
		$data = array(
            'error' => $error
        );
		    $data['waktu']=$this->Waktu_model->get_waktu();
			$this->load->view('register',$data);
	}

	public function tutup()
	{
		$this->load->view('v_registrasi_tutup');
	}

	function simpan()
	{
		/*$this->form_validation->set_message('cek_duplikat', 'NIM sudah ada.');*/

		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$password = $this->input->post('password');
		$level = "user";
		$status = "0"; 
		$ceknismaster = $this->Register_model->ceknismaster($nis);
		//$pass = random_string('alnum', 8);

		if ($ceknismaster) {
			$data= array(
			'nis'=> $nis,
			'nama'=> $nama,
			'kelas'=> $kelas,
			'jurusan'=> $jurusan,
			);
			if ($ceknismaster) {
				# code...
				$error = '<div id="notifikasi"><center><font color="red">NIS yang anda inputkan tidak terdaftar.</font></center></div>';
            	$this->index($error);
			}
		}else{
		$data= array(
			'nis'=> $nis,
			'nama'=> $nama,
			'kelas'=> $kelas,
			'jurusan'=> $jurusan,
			'password'=> $password,
			'level'=> $level,
			'status'=> $status,
		);

		    $this->db->where('nis', $nis);
		    $query = $this->db->get('tb_user');
		    $count_row = $query->num_rows();

		    if ($count_row > 0) {
		    	/*echo "<script>window.alert('NIM yang anda inputkan sudah terdaftar.')</script>";
		        redirect('Register','refresh');*/
		        $error = '<div id="notifikasi"><center><font color="red">NIS yang anda inputkan sudah terdaftar.</font></center></div>';
            $this->index($error);
		    } else {
		    	$this->Register_model->save($data);
		        echo "<script>alert('Terimakasih. Data berhasil disimpan.');document.location='index'</script>";
		    }
		}
		    

		
	}
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */