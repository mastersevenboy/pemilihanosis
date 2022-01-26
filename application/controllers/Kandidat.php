<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kandidat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('login_model');
		$this->load->model('Kandidat_model');
		$this->load->model('Waktu_model');
		$this->load->model('Notifikasi_model');
		$this->load->library('upload');
		$this->load->library('session');

		if ($this->session->userdata('level')==null) {
				redirect('Login/index','refresh');
			}
	}

	public function index()
	{
		$data['isi'] = $this->Kandidat_model->get_all_data();
		$this->load->view('page/kandidat',$data);
	}

	function get_data($nis_kandidat)
	{
		$data['isi'] = $this->Kandidat_model->select_by_id($nis_kandidat);
		$this->load->view('page/kandidat', $data);
	}

	
	public function tambah()
	{
		$nis_kandidat = $this->input->post('nis_kandidat');
		$nama = $this->input->post('nama');
		$tempat = $this->input->post('tempat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$jk = $this->input->post('jk');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$visi = $this->input->post('visi');
		$misi = $this->input->post('misi');
		$cekkandidat = $this->Kandidat_model->cekkandidat($nis_kandidat);
		
		$path = './assets/images/';

      	$kondisi = array('nis_kandidat' => $nis_kandidat );

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
	                        	'nis_kandidat' => $nis_kandidat,
								'nama' => $nama,
								'tempat' => $tempat,
								'tgl_lahir' => $tgl_lahir,
								'jk' => $jk,
								'kelas' => $kelas,
								'jurusan' => $jurusan,
								'visi' => $visi,
								'misi' => $misi,
                            	'foto'  => $foto['file_name'],
	                        	
	                        );
	           if ($cekkandidat) {
						$data = array(
				            'nis_kandidat' => $nis_kandidat,
							'nama' => $nama,
							'tempat' => $tempat,
							'tgl_lahir' => $tgl_lahir,
							'jk' => $jk,
							'kelas' => $kelas,
							'jurusan' => $jurusan,
							'visi' => $visi,
							'misi' => $misi,
			                'foto'  => $foto['file_name'],
				            );
			  $simpankandidat=$this->Kandidat_model->save($data);
              // redirect('kandidat','refresh');
              if ($simpankandidat) {
				# code...
				$this->Notifikasi_model->notifsuksessimpan();
				redirect('kandidat','refresh');
				}else{
				$this->Notifikasi_model->notifgagalsimpan();
				redirect('kandidat','refresh');
				}
	        }else {
              $this->Notifikasi_model->notifduplikat();
              redirect('kandidat','refresh');
	        }
	    }else {
	      $data = array(
	                        	'nis_kandidat' => $nis_kandidat,
								'nama' => $nama,
								'tempat' => $tempat,
								'tgl_lahir' => $tgl_lahir,
								'jk' => $jk,
								'kelas' => $kelas,
								'jurusan' => $jurusan,
								'visi' => $visi,
								'misi' => $misi,
                            	);
        $simpan = $this->Kandidat_model->save($data);
            // redirect('kandidat','refresh');
        	if ($simpan) {
				# code...
				$this->Notifikasi_model->notifsuksessimpan();
				redirect('kandidat','refresh');
			}else{
			$this->Notifikasi_model->notifduplikat();
			redirect('kandidat','refresh');
			}
	    }
	}
}

	// function update()
	// {
	// 	$nis = $this->input->post('nis');
	// 	$nama = $this->input->post('nama');
	// 	$tempat = $this->input->post('tempat');
	// 	$tgl_lahir = $this->input->post('tgl_lahir');
	// 	$jk = $this->input->post('jk');
	// 	$kelas = $this->input->post('kelas');
	// 	$jurusan = $this->input->post('jurusan');
	// 	$visi = $this->input->post('visi');
	// 	$misi = $this->input->post('misi');

	// 	$path = './assets/images/';

 //      	$kondisi = array('nis' => $nis );

	// 	$config['upload_path'] = './assets/images/';
	// 	$config['allowed_types'] = 'jpg|png|jpeg';
	// 	$config['max_size']	= '500';
	// 	$config['remove_space'] = TRUE;
	// 	/*$config['file_name'] = $slug;*/

	// 	// $config['file_name'] = $_FILES['input_gambar']['name'];

	// 	$this->upload->initialize($config);

	// 	if (!empty($_FILES['input_gambar']['name'])) {
	//         if ( $this->upload->do_upload('input_gambar') ) {
	//             $foto = $this->upload->data();
	//             $config['image_library']='gd2';
	// 		        $config['source_image']= './assets/images/'.$foto['file_name'];
	// 		        $config['create_thumb']=TRUE;
	// 		        $config['width']=200;
	// 		        $config['new_image']='./assets/images/thumbnail/'.$foto['file_name'];

	// 		        $namathumb = $foto['raw_name'].'_thumb'.$foto['file_ext'];

	// 		        $this->load->library('image_lib', $config);

	// 		        $this->image_lib->resize();
	//             $data = array(
	//                         	'nis' => $nis,
	// 							'nama' => $nama,
	// 							'tempat' => $tempat,
	// 							'tgl_lahir' => $tgl_lahir,
	// 							'jk' => $jk,
	// 							'kelas' => $kelas,
	// 							'jurusan' => $jurusan,
	// 							'visi' => $visi,
	// 							'misi' => $misi,
 //                            	'foto'  => $foto['file_name'],
 //                            	'foto_thumb' => $namathumb,
	                        	
	//                         );
 //              // hapus foto pada direktori
 //              @unlink($path.$this->input->post('filelama'));

	// 						$this->Kandidat_model->update($data,$kondisi);
 //              redirect('kandidat','refresh');
	//         }else {
 //              die("gagal update");
	//         }
	//     }else {
	//       $data = array('nis' => $nis,
	// 							'nama' => $nama,
	// 							'tempat' => $tempat,
	// 							'tgl_lahir' => $tgl_lahir,
	// 							'jk' => $jk,
	// 							'kelas' => $kelas,
	// 							'jurusan' => $jurusan,
	// 							'visi' => $visi,
	// 							'misi' => $misi,
 //                            	);
	//         $this->Kandidat_model->update($data,$kondisi);
 //              redirect('kandidat','refresh');
	//     }
	// }

	function delete($nis_kandidat)
	{
		$path = './assets/images/';
		@unlink($path.$foto);

	    $where = array('nis_kandidat' => $nis_kandidat);
	    $this->Kandidat_model->delete($where);
	    return redirect('kandidat','refresh');
	}


	function update_kandidat()
		{

		$nis_kandidat = $this->input->post('nis_kandidat');
		$nama = $this->input->post('nama');
		$tempat = $this->input->post('tempat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$jk = $this->input->post('jk');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$visi = $this->input->post('visi');
		$misi = $this->input->post('misi');
		$path = './assets/images/';

      	$kondisi = array('nis_kandidat' => $nis_kandidat );

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
								'nis_kandidat' => $nis_kandidat,
								'nama' => $nama,
								'tempat' => $tempat,
								'tgl_lahir' => $tgl_lahir,
								'jk' => $jk,
								'kelas' => $kelas,
								'jurusan' => $jurusan,
								'visi' => $visi,
								'misi' => $misi,
								'foto'  => $config['file_name']

			);

			 @unlink($path.$this->input->post('filelama'));

			$this->Kandidat_model->update($data,$kondisi);
              redirect('kandidat','refresh');
	        }else {
              die("gagal update");
	        }

		}else {
			$data = array(		'nis_kandidat' => $nis_kandidat,
								'nama' => $nama,
								'tempat' => $tempat,
								'tgl_lahir' => $tgl_lahir,
								'jk' => $jk,
								'kelas' => $kelas,
								'jurusan' => $jurusan,
								'visi' => $visi,
								'misi' => $misi

			);

			$this->Kandidat_model->update($data,$kondisi);
			redirect('kandidat','refresh');
		}
		
	}
}
