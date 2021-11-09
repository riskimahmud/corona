<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Sebaran extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		if (empty($this->session->userdata('user'))) {
			redirect('Login/logout');
		}
	}

	public $tabel	= 'sebaran';
	public $label	= 'Sebaran';
	public $base	= 'sebaran';
	public $page	= '/sebaran';
	public $key		= 'id_sebaran';
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
		$a['data']		=	$this->crud_model->select_all_order($this->tabel, $this->key, "ASC");
		$a['waktu']		=	$this->crud_model->select_one($this->tabel, "id_sebaran", "1");

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

	// perbarui aksi
	public function perbarui_aksi()
	{
		$id				=	$this->input->post("id");
		$data			=	array(
			"positif"		=>	$this->input->post("positif"),
			"aktif"		=>	$this->input->post("aktif"),
			"sembuh"		=>	$this->input->post("sembuh"),
			"meninggal"		=>	$this->input->post("meninggal"),
		);

		$perbarui	=	$this->crud_model->update($this->tabel, $data, $this->key, $id);
		if ($perbarui) {
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Data Berhasil Diperbarui"
			);
		} else {
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Data Gagal Diperbarui"
			);
		}
		$this->session->set_flashdata("notifikasi", $notifikasi);
		redirect($this->base);
	}

	// perbarui waktu update
	public function waktu_update()
	{

		$data			=	array(
			"last_update"		=>	$this->input->post("tanggal") . " " . $this->input->post("jam")
		);

		$perbarui	=	$this->crud_model->update($this->tabel, $data, "id_sebaran <>", "9");
		if ($perbarui) {
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Waktu Update Berhasil Diperbarui"
			);
		} else {
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Waktu Update Gagal Diperbarui"
			);
		}
		$this->session->set_flashdata("notifikasi", $notifikasi);
		redirect($this->base);
	}
}
