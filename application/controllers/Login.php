<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		parent::__construct();
 		$this->load->model('Login_model');
 		$this->load->database();
 		$this->load->helper('url');
  	}

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
	public function index()
	{
		$this->load->view('pre_login/header');
		$this->load->view('pre_login/login');
		$this->load->view('pre_login/footer');
	}

	public function proses_login(){
		$nomorTelpon = $this->input->post('nomorTelpon');
		$password = md5($this->input->post('password'));

		if($this->Login_model->auth_login($nomorTelpon, $password)){
			redirect('manajemen_mobil/index?merek=&model=&status=SEMUA');
		}else{
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-danger\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Login Gagal!</strong><br> Priksa kembali nomor telpon dan password anda</b>
				</div></div>");
			redirect('login');
		}

	}
}
