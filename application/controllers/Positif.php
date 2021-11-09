<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Positif extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		if(empty($this->session->userdata('user'))){
			redirect('Login/logout');
		}
	}
	
	public $tabel	='positif';
	public $label	='Pantauan Positif Covid19 Kota Gorontalo';
	public $base	='positif';
	public $page	='/positif';
	public $key		='id_positif';
	public $ket		= array();
	public $bread	= array();
	
	public function index()
	{
			$a	=	array();
			
			$a['page']		=	$this->page;
			$a['title']		=	$this->label;
			// $a['title']		=	"";
			$a['base']		=	$this->base;
			$a['ket']		=	$this->ket;
			$a['data']		=	$this->crud_model->select_all_order($this->tabel,$this->key,"DESC");
			
			$this->bread[]	=	array(
				"active"	=>	FALSE,
				"icon"		=>	"icon-home home-icon",
				"link"		=>	site_url(),
				"label"		=>	"Dashboard",
				"divider"	=>	TRUE,
			);
			
			$this->bread[]	=	array(
				"active"	=>	TRUE,
				"icon"		=>	"",
				"link"		=>	"",
				"label"		=>	$this->label,
				"divider"	=>	FALSE,
			);
			
			$a['bread']		=	$this->bread;
			$a['tabel']		=	$this->tabel;
			$a['key']		=	$this->key;
			$a['label']		=	$this->label;
			$a['tombol_head']	=	TRUE;

			$this->load->view("backend/main", $a);
	}
	
	// tambah aksi
	public function tambah_aksi(){
		$id				=	$this->crud_model->cek_id($this->tabel,$this->key);
		$last_update	=	$this->input->post("tgl_update")." ".$this->input->post("jam_update");
		if($last_update > date("Y-m-d H:i:s")){
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Waktu Update Tidak Valid"
			);
		}else{
			$data			=	array(
				"id_positif"	=>	$id,
				"positif"		=>	$this->input->post("positif"),
				"dirawat"		=>	$this->input->post("dirawat"),
				"sembuh"		=>	$this->input->post("sembuh"),
				"meninggal"		=>	$this->input->post("meninggal"),
				"create_at"		=>	$last_update
			);
			
			$tambah		=	$this->crud_model->insert($this->tabel,$data);
			if($tambah){
				$notifikasi		=	array(
					"status"	=>	1, "pesan"	=>	"Pantauan Gorontalo Berhasil Ditambah"
				);
			}else{
				$notifikasi		=	array(
					"status"	=>	0, "pesan"	=>	"Pantauan Gorontalo Gagal Ditambah"
				);
			}
		}
		$this->session->set_flashdata("notifikasi",$notifikasi);
		redirect($this->base);
	}
	
	// perbarui aksi
	public function perbarui_aksi(){
		$id				=	$this->input->post("id");
		$data			=	array(
			"positif"		=>	$this->input->post("positif"),
			"dirawat"		=>	$this->input->post("dirawat"),
			"sembuh"		=>	$this->input->post("sembuh"),
			"meninggal"		=>	$this->input->post("meninggal")
		);
		
		$perbarui	=	$this->crud_model->update($this->tabel,$data,$this->key,$id);
		if($perbarui){
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Pantauan Gorontalo Berhasil Diperbarui"
			);
		}else{
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Pantauan Gorontalo Gagal Diperbarui"
			);
		}
		$this->session->set_flashdata("notifikasi",$notifikasi);
		redirect($this->base);
	}
	
}