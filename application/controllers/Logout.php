<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function __construct()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		parent::__construct();
 		$this->load->model('Login_model');
 		$this->load->database();
 		$this->load->helper('url');
  	}

	public function index()
	{
		$this->Login_model->logout();
		redirect('login');
	}
}
