<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kontak extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		if(empty($this->session->userdata('user'))){
			redirect('Login/logout');
		}
	}
	
	public $tabel	='kontak';
	public $label	='Kontak';
	public $base	='Kontak';
	public $page	='/kontak';
	public $key		='id';
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
			$this->load->view("backend/main", $a);
	}
}