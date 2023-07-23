<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_mobil extends CI_Controller {
	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Peminjaman_mobil_model');
		$this->load->database();
		$this->load->helper('url');
		$this->pengguna = $this->Login_model->current_user();
		if(!$this->pengguna){
			redirect('login');
		}

	}

	public function index()
	{
		$labelMerek = $this->input->get("merek");
		$labelModel = $this->input->get("model");
		$status = $this->input->get("status");
		$idPengguna = $this->pengguna->id_pengguna;
		$mobil = $this->Peminjaman_mobil_model->get_mobil($idPengguna,$this->input->get('startDate'),$this->input->get('endDate'));
		$this->load->view('post_login/header');
		$this->load->view('post_login/peminjaman_mobil/index',['mobil'=>$mobil]);
		$this->load->view('post_login/footer');
	}

	public function order_pinjam_mobil(){
		$idMobil = $this->input->post('idMobil');
		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');
		$tarifSewa = $this->input->post('tarifSewa');
		$lamaSewa = $this->input->post('lamaSewa');
		$sewaData = array(
			'id_mobil'=>$idMobil,
			'tanggal_mulai'=>$startDate,
			'tanggal_selesai'=>$endDate,
			'tarif_sewa'=>$tarifSewa,
			'lama_sewa'=>$lamaSewa,
			'status'=>"ORDER",
			'id_pengguna'=>$this->pengguna->id_pengguna
		);

		$res = $this->Peminjaman_mobil_model->input('tbl_sewa',$sewaData);
		if($res>=1){
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-success\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Mobil Berhasil Disewa</strong></b>
				</div></div>");
			redirect('peminjaman_mobil/data_sewa');	
		}
	}

	public function data_sewa()
	{
		$idPengguna = $this->pengguna->id_pengguna;
		$sewa = $this->Peminjaman_mobil_model->get_sewa_by_pengguna($idPengguna);
		$this->load->view('post_login/header');
		$this->load->view('post_login/peminjaman_mobil/data_sewa',['sewa'=>$sewa]);
		$this->load->view('post_login/footer');
	}
}
