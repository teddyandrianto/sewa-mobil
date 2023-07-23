<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manajemen_mobil extends CI_Controller {
	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Manajemen_mobil_model');
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
		$mobil = $this->Manajemen_mobil_model->get_mobil_by_pengguna($idPengguna,$labelMerek,$labelModel,$status);
		$this->load->view('post_login/header');
		$this->load->view('post_login/manajemen_mobil/index',['mobil'=>$mobil]);
		$this->load->view('post_login/footer');
	}

	public function get_merek_mobil(){
		$merek = $this->Manajemen_mobil_model->get_merek_mobil($this->input->post("searchMerek"));
		$data = array();
		foreach ($merek as $m) {
			$data[] = array("id"=>$m->id_merek, "text"=>$m->merek);
		};
		echo json_encode($data);
	}

	public function get_model_mobil($idMerek=''){
		$labelModel = $this->input->post("searchModel");
		$idMerek = $this->input->post("idMerek");
		$labelMerek = $this->input->post("labelMerek");
		$model = $this->Manajemen_mobil_model->get_model_mobil($labelModel,$idMerek,$labelMerek);
		$data = array();
		foreach ($model as $m) {
			$data[] = array("id"=>$m->id_model, "text"=>$m->model);
		};
		echo json_encode($data);
	}

	public function input_mobil(){
		$nomorPolisi = $this->input->post('nomorPolisi');
		$merek = $this->input->post('merek');
		$model = $this->input->post('model');
		$tarifSewa = $this->input->post('tarifSewa');

		if($this->Manajemen_mobil_model->cek_nomor_polisi($nomorPolisi)){
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-danger\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Penambahan Mobil Gagal</strong> Nomor Polisi Sudah Terdaftar</b>
				</div></div>");
			redirect('manajemen_mobil/index?merek=&model=&status=SEMUA');
		}

		$mobilData = array(
			'plat_nomor'=>$nomorPolisi,
			'id_merek'=>$merek,
			'id_model'=>$model,
			'tarif_sewa'=>$tarifSewa,
			'id_pengguna'=>$this->pengguna->id_pengguna,
			'status'=>'NO-ORDER'
		);

		$res = $this->Manajemen_mobil_model->input('tbl_mobil',$mobilData);
		if($res>=1){
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-success\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Penambahan Mobil Berhasil</strong></b>
				</div></div>");
			redirect('manajemen_mobil/index?merek=&model=&status=SEMUA');	
		}

	}

	public function ubah_mobil($idMobil){
		$nomorPolisi = $this->input->post('nomorPolisi');
		$merek = $this->input->post('merek');
		$model = $this->input->post('model');
		$tarifSewa = $this->input->post('tarifSewa');
		$cekupdate = $this->Manajemen_mobil_model->cek_update_mobil($idMobil,$nomorPolisi,$this->pengguna->id_pengguna);
		if($cekupdate!="FALSE"){
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-danger\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Update Mobil Gagal</strong> ".$cekupdate."</b>
				</div></div>");
			redirect('manajemen_mobil/index');
		}

		$mobilData = array(
			'plat_nomor'=>$nomorPolisi,
			'id_merek'=>$merek,
			'id_model'=>$model,
			'tarif_sewa'=>$tarifSewa,
			'id_pengguna'=>$this->pengguna->id_pengguna
		);

		$res = $this->Manajemen_mobil_model->update('tbl_mobil',$mobilData,array('id_mobil'=>$idMobil));
		if($res>=1){
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-success\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Perubahan Mobil Berhasil</strong></b>
				</div></div>");
			redirect('manajemen_mobil/index?merek=&model=&status=SEMUA');	
		}

	}

	public function hapus_mobil($idMobil){
		$cekHapus = $this->Manajemen_mobil_model->cek_hapus_mobil($idMobil,$this->pengguna->id_pengguna);
		if($cekHapus!="FALSE"){
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-danger\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Hapus Mobil Gagal</strong> ".$cekupdate."</b>
				</div></div>");
		}else{
			$this->session->set_flashdata("pesan", "<div class=\"\"><div class=\"alert alert-success\">
				<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Hapus Mobil Berhasil</strong></b>
				</div></div>");
		}
		redirect('manajemen_mobil/index?merek=&model=&status=SEMUA');
	}

	public function get_history_sewa_mobil($idMobil){
		header('Content-Type: application/json');
		$dataSewa = $this->Manajemen_mobil_model->get_history_sewa_by_mobil($idMobil);
		$data = [];
		$no=1;
		foreach($dataSewa->result() as $s) {
			$data[] = array(
				"no"=>$no++,
				"tanggalMulai" => $s->tanggal_mulai,
				"tanggalSelesai" => $s->tanggal_selesai,
				"tarifSewa" => $s->tarif_sewa,
				"totalBayar" => $s->tarif_sewa*$s->lama_sewa,
				"status" => $s->status
			);
		}

		$result = array(
			"recordsTotal" => $dataSewa->num_rows(),
			"recordsFiltered" => $dataSewa->num_rows(),
			"data" => $data
		);
		echo json_encode($result);
		exit();		
	}

}
