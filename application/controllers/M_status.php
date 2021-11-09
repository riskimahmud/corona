<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_status extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		if(empty($this->session->userdata('user'))){
			redirect('Login/logout');
		}
	}
	
	public $tabel	='status';
	public $label	='Status Draft';
	public $base	='m_status';
	public $page	='/status';
	public $key		='id_status';
	public $ket		= array("0" => "id_status", "1" => "nama_status");
	public $bread	= array();
	
	public function index()
	{
			$a	=	array();
			
			$a['page']		=	$this->page;
			$a['title']		=	$this->label;
			// $a['title']		=	"";
			$a['base']		=	$this->base;
			$a['ket']		=	$this->ket;
			$a['data']		=	$this->crud_model->select_all_order($this->tabel,"id_status","ASC");
			
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
		$nama			=	ucwords($this->input->post("nama"));
		$data			=	array(
			"id_status"			=>	$id,
			"nama_status"		=>	$nama
		);
		$tambah		=	$this->crud_model->insert($this->tabel,$data);
		if($tambah){
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	$nama." Berhasil Ditambah"
			);
		}else{
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	$nama." Gagal Ditambah"
			);
		}
		$this->session->set_flashdata("notifikasi",$notifikasi);
		redirect($this->base);
	}
	
	// perbarui aksi
	public function perbarui_aksi(){
		$id			=	$this->input->post("id");
		$nama		=	ucwords($this->input->post("nama"));
		$data			=	array(
			"nama_status"	=>	$nama
		);
		
		$perbarui	=	$this->crud_model->update($this->tabel,$data,$this->key,$id);
		if($perbarui){
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	$nama." Berhasil Diperbarui"
			);
		}else{
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	$nama." Gagal Diperbarui"
			);
		}
		$this->session->set_flashdata("notifikasi",$notifikasi);
		redirect($this->base);
	}
	
}