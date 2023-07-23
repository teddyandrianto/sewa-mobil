<?php 
class Pengembalian_mobil_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function get_sewa_by_pengguna($idPengguna){
		$this->db->select("tbl_sewa.id_mobil,plat_nomor,tbl_mobil.id_model,model,tbl_mobil.id_merek,merek,tbl_sewa.tarif_sewa,tbl_sewa.status,lama_sewa,tanggal_mulai,tanggal_selesai");
		$this->db->join("tbl_mobil","tbl_mobil.id_mobil=tbl_sewa.id_mobil");
		$this->db->join("tbl_merek_mobil","tbl_merek_mobil.id_merek=tbl_mobil.id_merek");
		$this->db->join("tbl_model_mobil","tbl_model_mobil.id_model=tbl_mobil.id_model");
		$this->db->where('tbl_sewa.status','NO-ORDER');
		$this->db->where('tbl_sewa.id_pengguna=',$idPengguna);
		$this->db->order_by('tanggal_selesai','DESC');
		return $this->db->get('tbl_sewa')->result();
	}

	public function cek_pengembalian_by_no_polisi($idPengguna,$nomorPolisi){
		$this->db->join("tbl_mobil","tbl_mobil.id_mobil=tbl_sewa.id_mobil");
		$this->db->where('tbl_sewa.status','ORDER');
		$this->db->where('plat_nomor',$nomorPolisi);
		$this->db->where('tbl_sewa.id_pengguna',$idPengguna);
		$this->db->order_by('tanggal_selesai','ASC');
		$this->db->limit('1');
		$cekNomorPolisi = $this->db->get('tbl_sewa')->row();
		if($cekNomorPolisi){
			$dateStart = strtotime($cekNomorPolisi->tanggal_mulai);
			$dateEnd = strtotime($cekNomorPolisi->tanggal_selesai);
			$now = strtotime(date('Y-m-d'));
			if($now>=$dateEnd){
				$dataUpdate =array(
					'status'=>'NO-ORDER',
				);
				if($dateStart<$now){
					$dateStart = strtotime($cekNomorPolisi->tanggal_mulai);
					$dateEnd = strtotime(date('Y-m-d'));
					$hari = ceil(abs($dateEnd - $dateStart) / 86400);
					$dataUpdate['tanggal_selesai']=date('Y-m-d');
					$dataUpdate['lama_sewa']=$hari;
				}
				$this->db->update('tbl_sewa',$dataUpdate,array('id_sewa'=>$cekNomorPolisi->id_sewa));
				return "TRUE";
			}else{
				return "Belum Memasuki Tanggal Pengembalian";
			}
		}else{
			return "Tidak ada penyewaan Mobil dengan Nomor Polisi ".$nomorPolisi."";
		}	

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