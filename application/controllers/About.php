<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('Login_model');
		$this->load->model('User_model');
		$this->load->model('Welcome_model');
		$this->load->library('session');
	}

	public function index()
	{
		$data['peraturan'] = $this->Welcome_model->peraturan();
		$this->load->view('page/about',$data);
	}

	public function user()
	{
		$data['peraturan'] = $this->Welcome_model->peraturan();
		$this->load->view('page_user/about',$data);
	}
}
?>