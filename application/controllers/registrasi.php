<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registrasi extends CI_Controller {
	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->model('Registrasi_model');
		$this->load->database();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('pre_login/header');
		$this->load->view('pre_login/registrasi');
		$this->load->view('pre_login/footer');
	}

	public function proses_registrasi(){
		$nama = $this->input->post('nama');
		$nomorTelpon = $this->input->post('nomorTelpon');
		$nomorSim = $this->input->post('nomorSim');
		$alamat = $this->input->post('alamat');
		$password = $this->input->post('password');
		$rePassword = $this->input->post('rePassword');

		if($password!=$rePassword){
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-danger\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Registrasi Gagal!</strong><br> Password  yang anda masukan tidak sama</b>
				</div></div>");
			redirect('registrasi');
		}

		$cekAkun = $this->Registrasi_model->cek_akun($nomorTelpon,$nomorSim);

		if($cekAkun=="FALSE"){
			$registrasiData = array(
				'nama' => $nama,
				'nomor_telpon' => $nomorTelpon,
				'nomor_sim' => $nomorSim,
				'alamat' => $alamat,
				'password' => md5($password)
			);
			$res = $this->Registrasi_model->input('tbl_pengguna',$registrasiData);
			if($res>=1){
				$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-success\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Registrasi Berhasil</strong><br> Silahkan lanjutkan login</b>
				</div></div>");
				redirect('login');	
			}
		}else{
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-danger\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Registrasi Gagal!</strong><br> ".$cekAkun."</b>
				</div></div>");
			redirect('registrasi');
		}

	}
}
