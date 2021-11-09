<?php
	class User extends CI_Controller {
		function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Singapore');
		}
		
		public $base	='User';
		public $tabel	='user';
		public $label	='User';
		public $page	='/pengguna';
		public $key		='id';
		public $ket		= array();
		public $bread	= array();
		
		public function index()
		{
			$data['title']			=	$this->label;
			$data['page']			=	$this->page;
			$data['data']		=	$this->crud_model->select_all_where_order("user","type","skpd","id","ASC");
			
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
				"label"		=>	"User",
				"divider"	=>	FALSE,
			);
			
			$data['tabel']		=	$this->tabel;
			$data['key']		=	$this->key;
			$data['base']		=	$this->base;
			$data['bread']		=	$this->bread;
			$data['tombol_head']	=	TRUE;
			
			$this->load->view("backend/main", $data);
		}
		
		// tambah aksi
		public function tambah_aksi(){
			$id				=	$this->crud_model->cek_id($this->tabel,$this->key);
			$nama			=	ucwords($this->input->post("nama"));
			$username		=	$this->input->post("username");
			$password		=	md5($this->input->post("password"));
			
			$data			=	array(
				"id"		=>	$id,
				"nama"		=>	$nama,
				"username"	=>	$username,
				"password"	=>	$password,
				"type"		=>	"skpd"
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
			$id				=	$this->input->post("id");
			$nama			=	ucwords($this->input->post("nama"));
			$username		=	$this->input->post("username");
			$password		=	$this->input->post("password");
			
			$data			=	array(
				"nama"		=>	$nama,
				"username"	=>	$username,
			);
			
			if($password != ""){
				$data['password']	=	md5($password);
			}
			
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
		
		public function detail()
		{
			foreach($_GET as $loc=>$item){
				$_GET[$loc] = base64_decode(urldecode($item));
			}
			$id_user		=	$_GET['id'];
			$data			=	array();
			$detail			=	$this->crud_model->select_one("tb_user","id_user",$id_user);
			$data['detail']	=	$detail;
			$data['produk']	=	$this->crud_model->select_all_where("tb_produk","id_user",$id_user);
			$data['title']	=	$detail->nama;
			$data['page']	=	"/detail_penyedia";
			$this->load->view("frontend/main", $data);
			
		}
	}
?>