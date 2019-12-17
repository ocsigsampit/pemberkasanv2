<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_pkp extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	public function daftarMenu(){
		$q = $this->db->query("SELECT * FROM tb_menu WHERE id_parent = '0' AND aktif='1' ORDER BY CAST(id_menu AS UNSIGNED)");
		return $q->result();
	}
	
	public function idPermohonanBaru(){
		//Format "P201912002" P[4:tahun][2:bulan][3:urutan]
		$q  = $this->db->query("SELECT COALESCE(MAX(SUBSTR(id, 8, 3)), 0) + 1 AS id FROM tb_permohonan WHERE SUBSTR(id, 2, 4) = YEAR(CURRENT_DATE()) AND SUBSTR(id, 6, 2) = MONTH(CURRENT_DATE())");
		$id = $q->row();
		$id = $id->id;
		
		return "P".date('Y').substr('0'.date('m'),-2).substr('00'.$id,-3);
	}
	
	public function simpanDataPengurus($nik, $nama, $npwp){
		$qry = $this->db->query("INSERT INTO tb_pengurus (nik, nama, npwp_pengurus) VALUES ('".$nik."', '".$nama."', '".$npwp."')");
		
		echo $qry;
	}
	
	public function simpanDataPemohonPengurus($npwp, $nik){
		$qry = $this->db->query("INSERT INTO tb_pemohon_pengurus (npwp, nik) VALUES ('".$npwp."', '".$nik."')");
		
		echo $qry;
	}
	
	public function simpanDataNIKdiPemohonPengurus($npwp){
		$qry = $this->db->query("UPDATE tb_pemohon_pengurus SET id_akta = (SELECT COALESCE(MAX(id),1) FROM tb_akta) WHERE npwp = '".$npwp."'");
		
		echo $qry;
	}
	
	public function updateLHP($no_lhp, $tgl_lhp){
		$qry = $this->db->query("UPDATE tb_permohonan SET tb_permohonan.no_lhp = '".$no_lhp."', tb_permohonan.tgl_lhp = '".$tgl_lhp."'
			WHERE tb_permohonan.id IN (SELECT * FROM (SELECT MAX(id) FROM tb_permohonan) tb_temp)");
		
		echo $qry;
	}
	
	public function dataPengurus($npwp){
		$qry = $this->db->query("SELECT 
			a.npwp,
			a.nama,
			a.tgl_daftar,
			c.nik,
			c.nama,
			c.npwp_pengurus 
			FROM tb_pemohon a LEFT JOIN tb_pemohon_pengurus b ON (a.npwp = b.npwp) 
			LEFT JOIN tb_pengurus c ON (b.nik = c.nik) 
			WHERE a.npwp = '".$npwp."'");
		return $qry->result();
	}
	
	public function pemenuhanSyarat($id_permohonan){
		$qry = $this->db->query("SELECT 
			a.id,
			a.no_bps,
			a.tgl_bps,
			a.npwp,
			b.nama,
			b.jenis_wp,
			b.kode_klu,
			b.tgl_daftar,
			d.nama AS nama_peng,
			d.npwp_pengurus,
			e.spt_kemaren,
			e.spt_lusa,
			e.tunggakan,
			e.tgl_cek 
			FROM tb_permohonan a LEFT JOIN tb_pemohon b On (a.npwp = b.npwp) 
			LEFT JOIN tb_pemohon_pengurus c ON (a.npwp = c.npwp) 
			LEFT JOIN tb_pengurus d ON (c.nik = d.nik)  
			LEFT JOIN tb_teliti_pkp e ON (a.id = e.id_permohonan) 
			WHERE a.id = '".$id_permohonan."'");
		
		echo $qry;
	}

	public function dataNPWP($npwp){
		$qry = $this->db->query("SELECT nama, jenis_wp, alamat1, alamat2, alamat3, kode_klu, tgl_daftar 
		FROM tb_pemohon WHERE npwp = '".$npwp."'");

		return $qry->result_array();
	}
	
	public function dataKLU($kode_klu){
		$qry = $this->db->query("SELECT kode, uraian_klu FROM tb_klu WHERE kode = '".$kode_klu."'");

		return $qry->result_array();
	}
}