<?php 
class Manajemen_mobil_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function get_merek_mobil($labelMerek){
		$this->db->select("merek,id_merek");
		$this->db->like("merek",$labelMerek);
		return $this->db->get('tbl_merek_mobil')->result();
	}

	public function get_model_mobil($labelModel,$idMerek,$labelMerek){
		$this->db->select("model,id_model");
		$this->db->join("tbl_merek_mobil","tbl_merek_mobil.id_merek=tbl_model_mobil.id_merek");
		if($idMerek){	
			$this->db->where('tbl_merek_mobil.id_merek',$idMerek);
		}
		if($labelMerek){	
			$this->db->where('merek',$labelMerek);
		}
		$this->db->like("model",$labelModel);
		return $this->db->get('tbl_model_mobil')->result();
	}

	public function get_mobil_by_pengguna($idPengguna,$labelMerek,$labelModel,$status){
		$this->db->select("id_mobil,plat_nomor,tbl_mobil.id_model,model,tbl_mobil.id_merek,merek,tarif_sewa,status");
		$this->db->join("tbl_merek_mobil","tbl_merek_mobil.id_merek=tbl_mobil.id_merek");
		$this->db->join("tbl_model_mobil","tbl_model_mobil.id_model=tbl_mobil.id_model");
		if($labelMerek){
			$this->db->where('merek',$labelMerek);
		}
		if($labelModel){
			$this->db->where('model',$labelModel);
		}
        $this->db->where('status!=', 'HIST');
		$this->db->where('id_pengguna',$idPengguna);
		$this->db->order_by('id_mobil','DESC');
		return $this->db->get('tbl_mobil')->result();
	}

	public function cek_nomor_polisi($nomorPolisi){
		$this->db->where('STATUS!=','HIST');
		$cekNomorPolisi = $this->db->get_where('tbl_mobil', array('plat_nomor'=>$nomorPolisi))->num_rows();
		if($cekNomorPolisi>0){
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function cek_update_mobil($idMobil,$nomorPolisi,$idPengguna){
		$this->db->where('status!=', 'HIST');
		$cek = $this->db->get_where('tbl_mobil',array('id_mobil'=>$idMobil))->row();
		
		if($cek->id_pengguna==$idPengguna){
			if($cek->plat_nomor==$nomorPolisi){
				return "FALSE";
			}else{
				$this->db->where('status!=', 'HIST');
				$cekNomorPolisi = $this->db->get_where('tbl_mobil',array('plat_nomor'=>$nomorPolisi))->num_rows();
				if($cekNomorPolisi>0){
					return "Nomor Polisi Sudah Digunakan";		
				}else{
					return "FALSE";
				}		
			}
		}else{
			return "Mobil ini milki pengguna lain";
		}
	}

	public function cek_hapus_mobil($idMobil,$idPengguna){
		$this->db->where('status!=', 'HIST');
		$cek = $this->db->get_where('tbl_mobil',array('id_mobil'=>$idMobil))->row();
		if($cek->id_pengguna==$idPengguna){
			if($cek->status=="ORDER"){
				return "Mobil Dapat dihapus Jika status NO-ORDER";	
			}else{
				$cekSewa = $this->db->get_where('tbl_sewa',array('id_mobil'=>$idMobil))->num_rows();
				if($cekSewa>0){
					$this->db->update("tbl_mobil",array('status'=>'HIST'),array('id_mobil'=>$idMobil));
				}else{
					$this->db->delete("tbl_mobil",array('id_mobil'=>$idMobil));
				}
				return "FALSE";
			}
		}else{
			return "Mobil ini milki pengguna lain";
		}
	}

	public function get_history_sewa_by_mobil($idMobil){
		$this->db->select("tbl_sewa.id_mobil,plat_nomor,tbl_mobil.id_model,model,tbl_mobil.id_merek,merek,tbl_sewa.tarif_sewa,tbl_sewa.status,lama_sewa,tanggal_mulai,tanggal_selesai");
		$this->db->join("tbl_mobil","tbl_mobil.id_mobil=tbl_sewa.id_mobil");
		$this->db->join("tbl_merek_mobil","tbl_merek_mobil.id_merek=tbl_mobil.id_merek");
		$this->db->join("tbl_model_mobil","tbl_model_mobil.id_model=tbl_mobil.id_model");
		$this->db->where('tbl_sewa.id_mobil',$idMobil);
		$this->db->order_by('tanggal_mulai','DESC');
		return $this->db->get('tbl_sewa');
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