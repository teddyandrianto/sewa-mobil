<?php 
class Registrasi_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function cek_akun($nomorTelpon,$nomorSim){
		$cekTelpAndSim = $this->db->get_where('tbl_pengguna', array('nomor_telpon'=>$nomorTelpon,'nomor_sim'=>$nomorSim))->num_rows();
		if($cekTelpAndSim>0){
			return "Nomor Telpon dan nomor SIM Sudah Terdaftar";
		}else{
			$cekTelp = $this->db->get_where('tbl_pengguna', array('nomor_telpon'=>$nomorTelpon))->num_rows();
			if($cekTelp>0){
				return "Nomor Telpon Sudah Terdaftar";
			}	
			$cekSim = $this->db->get_where('tbl_pengguna', array('nomor_sim'=>$nomorSim))->num_rows();
			if($cekSim>0){
				return "Nomor SIM Sudah Terdaftar";
			}
		}
		return "FALSE";

	}

	public function input($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}
	
	public function update($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;
	}

	public function delete($tabelName,$where){
		$res = $this->db->delete($tabelName,$where);
		return $res;
	}

}