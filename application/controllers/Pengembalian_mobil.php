<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_mobil extends CI_Controller {
	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Pengembalian_mobil_model');
		$this->load->database();
		$this->load->helper('url');
		$this->pengguna = $this->Login_model->current_user();
		if(!$this->pengguna){
			redirect('login');
		}

	}
	public function index()
	{
		$idPengguna = $this->pengguna->id_pengguna;
		$sewa = $this->Pengembalian_mobil_model->get_sewa_by_pengguna($idPengguna);
		$this->load->view('post_login/header');
		$this->load->view('post_login/pengembalian_mobil/index',['sewa'=>$sewa]);
		$this->load->view('post_login/footer');
	}

	public function proses_pengembalian(){
		$nomorPolisi = $this->input->post('nomorPolisi');
		$idPengguna = $this->pengguna->id_pengguna;
		$cekPengembalian = $this->Pengembalian_mobil_model->cek_pengembalian_by_no_polisi($idPengguna,$nomorPolisi);
		if($cekPengembalian=="TRUE"){
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-success\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Penembalian Mobil Berhasil</strong> Dengan Nomor Polisi ".$nomorPolisi."</b>
				</div></div>");
		}else{
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-danger\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Penembalian Mobil Gagal</strong> ".$cekPengembalian."</b>
				</div></div>");
		}
		redirect('pengembalian_mobil/index');


	}
}
