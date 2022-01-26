<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_model extends CI_Model {

	function notifsuksessimpan()
	{
		$this->session->set_flashdata('message', 
			'<div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Sukses!</strong> Data berhasil disimpan.
            </div>');
	}
	function notifduplikat()
	{
		$this->session->set_flashdata('message', 
			'<div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Error!</strong> Nis sudah terdaftar!
            </div>');
	}
	function notifgagalsimpan()
	{
		$this->session->set_flashdata('message', 
			'<div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Error!</strong> Data gagal disimpan!
            </div>');
	}
	function notifupdate(){
		$this->session->set_flashdata('message', 
			'<div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Sukses!</strong> Data berhasil diupdate.
            </div>');
	}
	function notifgagalupdate(){
		$this->session->set_flashdata('message', 
			'<div class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Sukses!</strong> Data tidak berhasil diupdate.
            </div>');
	}
	function notifsukseshapus()
	{
		$this->session->set_flashdata('message', 
			'<div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Sukses!</strong> Data berhasil dihapus.
            </div>');
		
	}
	function notifgagalhapus()
	{
		$this->session->set_flashdata('message', 
			'<div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Error!</strong> Data gagal dihapus!
            </div>');
	}
}