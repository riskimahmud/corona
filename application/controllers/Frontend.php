<?php
class Frontend extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		$this->load->model('users_model');
		$this->load->library('googlemaps');
	}

	public $base	= 'frontend';
	public $konten	= '/frontend';

	public function index()
	{
		$data['page']		=	"dashboard";
		$date = date("Y-m-d");
		$where	=	[
			"tgl_masuk >" => "2020-01-01",
			"tgl_masuk <=" => $date
		];
		$data['kasus']	=	$this->crud_model->select_all_where_array_num_row("pasien", $where);
		$data['aktif']	=	$this->crud_model->select_custom_row("SELECT count('id_pasien') as jumlah FROM `pasien` WHERE tgl_masuk > '2020-01-01' and tgl_masuk <= '$date' and (tgl_keluar IS null or tgl_keluar > '$date')");
		$data['sembuh']	=	$this->crud_model->select_all_where_array_num_row("pasien", array_merge($where, [
			"tgl_keluar <=" => $date,
			"status" => "sembuh"
		]));
		$data['meninggal']	=	$this->crud_model->select_all_where_array_num_row("pasien", array_merge($where, [
			"tgl_keluar <=" => $date,
			"status" => "meninggal"
		]));
		$data['dosis1']	=	$this->crud_model->select_custom_row("SELECT count(id_vaksin) as jumlah FROM vaksin WHERE dosis = 'Dosis 1' GROUP BY dosis");
		$data['dosis2']	=	$this->crud_model->select_custom_row("SELECT count(id_vaksin) as jumlah FROM vaksin WHERE dosis = 'Dosis 2' GROUP BY dosis");
		$data['dosis3']	=	$this->crud_model->select_custom_row("SELECT count(id_vaksin) as jumlah FROM vaksin WHERE dosis = 'Dosis 3' GROUP BY dosis");
		$data['jenis_vaksin']	=	$this->crud_model->select_custom("SELECT jenis_vaksin, count(id_vaksin) as jumlah FROM vaksin GROUP BY jenis_vaksin");
		$data['infografik']	=	$this->crud_model->select_all_where_array_order("berita", ["status" => "1"], "create_at", "DESC");
		$data['faq']	=	$this->crud_model->select_all_order("faq", "create_at", "ASC");
		$data['jadwal']	=	$this->crud_model->select_all_where_array_order("jadwal_vaksin", [
			"tanggal >= " => date('Y-m-d', strtotime("-6 day", strtotime(date("Y-m-d"))))
		], "tanggal", "ASC");
		$data["dashboard"]	=	true;
		$this->load->view("frontend/main", $data);
	}

	public function pasien()
	{

		$data['title']		=	"Pasien Covid";
		$data['page']		=	"/pasien";

		$date = date("Y-m-d");
		$where	=	[
			"tgl_masuk >" => "2020-01-01",
			"tgl_masuk <=" => $date
		];
		$data['kasus']	=	$this->crud_model->select_all_where_array("pasien", $where);
		$data['aktif']	=	$this->crud_model->select_custom_row("SELECT count('id_pasien') as jumlah FROM `pasien` WHERE tgl_masuk > '2020-01-01' and tgl_masuk <= '$date' and (tgl_keluar IS null or tgl_keluar > '$date')");
		$data['sembuh']	=	$this->crud_model->select_all_where_array_num_row("pasien", array_merge($where, [
			"tgl_keluar <=" => $date,
			"status" => "sembuh"
		]));
		$data['meninggal']	=	$this->crud_model->select_all_where_array_num_row("pasien", array_merge($where, [
			"tgl_keluar <=" => $date,
			"status" => "meninggal"
		]));
		$data["dashboard"]	=	false;
		$data['sebaran']	=	$this->crud_model->select_custom("SELECT nama_puskesmas, (SELECT COUNT(id_pasien) FROM pasien p WHERE p.status = 'sembuh' and p.puskesmas = s.nama_puskesmas) as sembuh, (SELECT COUNT(id_pasien) FROM pasien p WHERE p.status = 'aktif' and p.puskesmas = s.nama_puskesmas) as aktif, (SELECT COUNT(id_pasien) FROM pasien p WHERE p.status = 'meninggal' and p.puskesmas = s.nama_puskesmas) as meninggal FROM puskesmas s");

		$this->load->view("frontend/main", $data);
	}

	public function vaksinasi()
	{
		$data['title']		=	"Vaksinasi";
		$data['page']		=	"/vaksinasi";
		$data["dashboard"]	=	false;

		$data['dosis1']	=	$this->crud_model->select_custom_row("SELECT count(id_vaksin) as jumlah FROM vaksin WHERE dosis = 'Dosis 1' GROUP BY dosis");
		$data['dosis2']	=	$this->crud_model->select_custom_row("SELECT count(id_vaksin) as jumlah FROM vaksin WHERE dosis = 'Dosis 2' GROUP BY dosis");
		$data['dosis3']	=	$this->crud_model->select_custom_row("SELECT count(id_vaksin) as jumlah FROM vaksin WHERE dosis = 'Dosis 3' GROUP BY dosis");
		$data['jenis_vaksin']	=	$this->crud_model->select_custom("SELECT jenis_vaksin, count(id_vaksin) as jumlah FROM vaksin GROUP BY jenis_vaksin");

		$data['sebaran']	=	$this->crud_model->select_custom("SELECT jenis_vaksin, (SELECT COUNT(id_vaksin) from vaksin a WHERE dosis = 'Dosis 1' and a.jenis_vaksin = b.jenis_vaksin) as dosis1, (SELECT COUNT(id_vaksin) from vaksin a WHERE dosis = 'Dosis 2' and a.jenis_vaksin = b.jenis_vaksin) as dosis2, (SELECT COUNT(id_vaksin) from vaksin a WHERE dosis = 'Dosis 3' and a.jenis_vaksin = b.jenis_vaksin) as dosis3 FROM `vaksin` b GROUP by jenis_vaksin");

		$data['jadwal']	=	$this->crud_model->select_all_where_array_order("jadwal_vaksin", [
			"tanggal >= " => date('Y-m-d', strtotime("-6 day", strtotime(date("Y-m-d"))))
		], "tanggal", "ASC");

		$this->load->view("frontend/main", $data);
	}

	public function detail_jadwal()
	{
		echo "oke";
	}
}
