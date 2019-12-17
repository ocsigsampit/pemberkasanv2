<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Pkp extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('model_pkp','model');
		$this->load->library('pdf');
        $this->load->library(array('form_validation', 'email'));
		$this->load->helper(array('form','url', 'fungsi_budi'));
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index(){
		if($this->session->userdata('status_login') == 'ON'){
				$id_user             = $this->session->userdata('id_user');
				
				$data['pageTitle']   = 'Home';
				$data['menunye']     = $this->model->daftarMenu();
				$data['pageContent'] = $this->load->view('pkp/home', $data, TRUE);
				
				$this->load->view('template/layout', $data);
		}else{
			redirect('auth');
		}
	}
	
	public function tambah(){
		if($this->session->userdata('status_login') == 'ON'){
				$id_user             = $this->session->userdata('id_user');
				
				$data['pageTitle']   = 'Tambah';
				$data['menunye']     = $this->model->daftarMenu();
				$data['pageContent'] = $this->load->view('pkp/tambah', $data, TRUE);
				
				$this->load->view('template/layout', $data);
		}else{
			redirect('auth');
		}
	}
	
	public function simpan_data_wp(){
		$pesan  = '';
		$id_bps = ($this->input->post("jns_layanan") == "Pengukuhan PKP") ? "1" : "2";
		$no     = $this->model->idPermohonanBaru();
		
		$status_permohonan = $this->input->post("status_permohonan");
		$status_klu        = $this->input->post("status_klu");
		
		if($status_permohonan == "ulang"){
		
			$data1 = array(
				"id" 			=> $no,
				"id_permohonan" => $id_bps,
				"no_bps"        => $this->input->post("no_bps"),
				"tgl_bps"       => $this->input->post("tgl_bps"),
				"npwp"          => $this->input->post("npwp"),
				"ip_perekam"    => $this->input->ip_address()
			);
			
			echo $this->db->insert("tb_permohonan", $data1);
		
		}else{
			
			$data1 = array(
				"id" 			=> $no,
				"id_permohonan" => $id_bps,
				"no_bps"        => $this->input->post("no_bps"),
				"tgl_bps"       => $this->input->post("tgl_bps"),
				"npwp"          => $this->input->post("npwp"),
				"ip_perekam"    => $this->input->ip_address()
			);
			
			echo $this->db->insert("tb_permohonan", $data1);
			
			if($status_klu == "ulang"){
				
				$data2 = array(
					"npwp"       => $this->input->post("npwp"),
					"nama"       => $this->input->post("nama_wp"),
					"alamat1"    => $this->input->post("alamat1"),
					"alamat2"    => $this->input->post("alamat2"),
					"jenis_wp"   => $this->input->post("jenis_wp"),
					"kode_klu"   => $this->input->post("kode_klu"),
					"tgl_daftar" => $this->input->post("tgl_daftar")
				);
				
				echo $this->db->insert("tb_pemohon", $data2);
				
			}else{
				
				$data3 = array(
					"kode"       => $this->input->post("kode_klu"),
					"uraian_klu" => $this->input->post("uraian_klu"),
				);
				
				echo $this->db->insert("tb_klu", $data3);
				
				$data2 = array(
					"npwp"       => $this->input->post("npwp"),
					"nama"       => $this->input->post("nama_wp"),
					"alamat1"    => $this->input->post("alamat1"),
					"alamat2"    => $this->input->post("alamat2"),
					"jenis_wp"   => $this->input->post("jenis_wp"),
					"kode_klu"   => $this->input->post("kode_klu"),
					"tgl_daftar" => $this->input->post("tgl_daftar")
				);
				
				echo $this->db->insert("tb_pemohon", $data2);
			}
			
		}
	}
	
	public function simpan_data_pengurus(){
		$jumlah = 1;
		$npwpBadan = $this->input->post("npwp_badan");
		
		$nama      = $this->input->post("nama");
		$nik       = $this->input->post("nik");
		$npwp      = $this->input->post("npwp");
		
		for($i=0; $i < count($nama); $i++){
			//$this->model->simpanDataPengurus($npwp[$i], $nik[$i], $nama[$i], $npwpBadan);
			$this->model->simpanDataPengurus($nik[$i], $nama[$i], $npwp[$i]);
			$this->model->simpanDataPemohonPengurus($npwpBadan, $nik[$i]);
			$jumlah++;
		}
		
		$this->model->simpanDataNIKdiPemohonPengurus($npwpBadan);
		
		//return $jumlah." data dari ".count($nama)." telah tersimpan";
	}
	
	public function simpan_klu(){
		//print_r($_POST);
		$data = array(
			"kode"      => $this->input->post("kode_klu"),
			"urian_klu"     => $this->input->post("urian_klu")
		);
		
		echo $this->db->insert("tb_klu", $data);
	}
	
	public function simpan_akta(){
		//print_r($_POST);
		$data = array(
			"no_akta"      => $this->input->post("no_akta"),
			"tgl_akta"     => $this->input->post("tgl_akta"),
			"tempat_akta"  => $this->input->post("tempat_akta"),
			"nama_notaris" => $this->input->post("notaris")
		);
		
		echo $this->db->insert("tb_akta", $data);
	}
	
	public function simpan_lhp(){
		$no_lhp   = "LAP-".$this->input->post("no_lhp")."/WPJ.32/KP.0603/2019";
		$tgl_lhp  = $this->input->post("tgl_lhp");
	
		$this->model->updateLHP($no_lhp, $tgl_lhp);
	}
	
	public function data_NPWP(){
		$npwp  = $this->input->post("npwp");		
		$hasil = $this->model->dataNPWP($npwp);

		echo json_encode($hasil);
	}
	
	public function data_KLU(){
		$kode_klu  = $this->input->post("kode_klu");		
		$hasil     = $this->model->dataKLU($kode_klu);

		echo json_encode($hasil);
	}
	
	public function teliti_pkp($id_permohonan){
		
		if($this->session->userdata('status_login') == 'ON'){
				$id_user             = $this->session->userdata('id_user');
				
				$data['pageTitle']   = 'Teliti PKP';
				$data['datanya']     = $this->model->pemenuhanSyarat($id_permohonan);
				$data['menunye']     = $this->model->daftarMenu();
				$data['pageContent'] = $this->load->view('pkp/teliti_pkp', $data, TRUE);
				
				$this->load->view('template/layout', $data);
		}else{
			redirect('auth');
		}
	}
}