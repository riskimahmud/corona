<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_dokumen extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		if(empty($this->session->userdata('user'))){
			redirect('Login/logout');
		}
	}
	
	public $tabel	='dokumen';
	public $label	='Dokumen';
	public $base	='m_dokumen';
	public $page	='/dokumen';
	public $key		='id_dokumen';
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
			$a['data']		=	$this->crud_model->select_all_order($this->tabel,$this->key,"ASC");
			
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
		$judul			=	$this->input->post("judul");
		$data			=	array(
			"id_dokumen"	=>	$id,
			"judul"			=>	$judul
		);
		
		$config['upload_path']     	= './uploads/dokumen/';
		$config['allowed_types']   	= 'pdf|PDF';
		$config['max_size']       	= 2000;
		$config['max_filename'] 	= '255';
		$config['encrypt_name'] 	= TRUE;
		
		$this->load->library('upload', $config);
		if ( $this->upload->do_upload('dokumen')){
			$data_file = $this->upload->data();
			$data['file']	=	$data_file['file_name'];
		}
		
		$tambah		=	$this->crud_model->insert($this->tabel,$data);
		if($tambah){
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Dokumen Berhasil Ditambah"
			);
		}else{
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Dokumen Gagal Ditambah"
			);
		}
		$this->session->set_flashdata("notifikasi",$notifikasi);
		redirect($this->base);
	}
	
	// perbarui aksi
	public function perbarui_aksi(){
		$id				=	$this->input->post("id");
		$judul			=	$this->input->post("judul");
		$data			=	array(
			"judul"			=>	$judul
		);
		
		$detail			=	$this->crud_model->select_one($this->tabel,$this->key,$id);
		
		$config['upload_path']     	= './uploads/dokumen/';
		$config['allowed_types']   	= 'pdf|PDF';
		$config['max_size']       	= 2000;
		$config['max_filename'] 	= '255';
		$config['encrypt_name'] 	= TRUE;
		
		$this->load->library('upload', $config);
		if ( $this->upload->do_upload('dokumen')){
			unlink('./uploads/dokumen/'.$detail->file);
			$data_file = $this->upload->data();
			$data['file']	=	$data_file['file_name'];
		}
		
		$perbarui	=	$this->crud_model->update($this->tabel,$data,$this->key,$id);
		if($perbarui){
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Dokumen Berhasil Diperbarui"
			);
		}else{
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Dokumen Gagal Diperbarui"
			);
		}
		$this->session->set_flashdata("notifikasi",$notifikasi);
		redirect($this->base);
	}
	
	
	// hapus
	public function hapus($id){
		$detail			=	$this->crud_model->select_one($this->tabel,$this->key,$id);
		
		$hapus	=	$this->crud_model->hapus_id($this->tabel,$this->key,$id);
		if($hapus){
			unlink('./uploads/dokumen/'.$detail->file);
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Dokumen Berhasil Dihapus"
			);
		}else{
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Dokumen Gagal Dihapus"
			);
		}
		$this->session->set_flashdata("notifikasi",$notifikasi);
		redirect($this->base);
	}
}