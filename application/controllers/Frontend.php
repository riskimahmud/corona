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
		$this->load->library('googlemaps');

		$config['center'] = '0.5490078, 123.0050009';
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);

		$sebaran			=	$this->crud_model->select_all_where("sebaran", "id_sebaran <>", "11");
		foreach ($sebaran as $seb) {
			$marker = array();
			$marker['position'] = $seb->lat . ", " . $seb->lng;
			$marker['infowindow_content'] = $seb->kecamatan;
			$marker['animation'] = 'DROP';
			$marker['icon'] = base_url("assets_front/img/marker/covid.png");
			$marker['onclick'] = 'detail_sebaran(' . $seb->id_sebaran . ')';
			$this->googlemaps->add_marker($marker);
		}

		$data['map'] = $this->googlemaps->create_map();

		$data['title']		=	"Dashboard";
		$data['page']		=	"/dashboard";
		//$nasional			=	$this->crud_model->select_one_order("nasional","id_nasional","DESC");
		$nasional	=	array(
			"positif"		=>	"Sedang diupdate",
			"dirawat"		=>	"Sedang diupdate",
			"sembuh"		=>	"Sedang diupdate",
			"meninggal"		=>	"Sedang diupdate",
			"last_update"	=>	date("Y-m-d H:i:s")
		);

		$positif			=	$this->crud_model->select_one_order("positif", "id_positif", "DESC");
		$gorontalo			=	$this->crud_model->select_one_order("gorontalo", "id_gorontalo", "DESC");
		// 			$api = json_decode(file_get_contents("https://api.kawalcorona.com/"));
		$api = json_decode(file_get_contents("https://api.kawalcorona.com/indonesia/"));
		foreach ($api as $a) {
			$nasional	=	array(
				"positif"		=>	$a->positif,
				"dirawat"		=>	$a->dirawat,
				"sembuh"		=>	$a->sembuh,
				"meninggal"		=>	$a->meninggal,
				"last_update"	=>	date('Y-m-d H:i:s')
			);
		}

		// 			foreach($api as $a){
		// 				if($a->attributes->Country_Region == "Indonesia"){
		// 					$timestamp	=	substr($a->attributes->Last_Update,0,10);
		// 	$nasional			=	array(
		// 		"positif"		=>	$a->attributes->Confirmed,
		// 		"dirawat"		=>	$a->attributes->Active,
		// 		"sembuh"		=>	$a->attributes->Recovered,
		// 		"meninggal"		=>	$a->attributes->Deaths,
		// 		"last_update"	=>	date('Y-m-d H:i:s', $timestamp)
		// 	);
		// 				}
		// 			}
		$gorontalo			=	$this->crud_model->select_one_order("gorontalo", "id_gorontalo", "DESC");
		$data['nasional']	=	$nasional;
		$data['positif']	=	$positif;
		$data['gorontalo']	=	$gorontalo;
		$data['kasus']		=	$this->crud_model->select_custom_row("select sum(positif) as positif, sum(aktif) as aktif, sum(sembuh) as sembuh, sum(meninggal) as meninggal, last_update from sebaran");
		$data['hoax']		=	$this->crud_model->select_all_where_limit("hoax", "status", "1", "create_at", "DESC", "4");
		$data['infografik']	=	$this->crud_model->select_all_where_limit("berita", "status", "1", "create_at", "DESC", "16");
		$data['dokumen']	=	$this->crud_model->select_all_where_limit("dokumen", "judul <>", "", "create_at", "DESC", "5");
		$data['galeri']		=	$this->crud_model->select_all_where_limit("galeri", "create_at <>", "", "create_at", "DESC", "12");
		$tmp_kemarin		= 	mktime(0, 0, 0, date("n"), date("j") - 1, date("Y"));
		$hari_ini			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d")));
		$kemarin			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d", $tmp_kemarin)));
		$bulan_ini			=	$this->crud_model->select_sum("visitors", "views", array("month(date)" => date("m")));
		$tahun_ini			=	$this->crud_model->select_sum("visitors", "views", array("Year(date)" => date("Y")));
		$data['dashboard']	=	TRUE;
		$data['kunjungan']	=	array("hari_ini" => $hari_ini, "kemarin" => $kemarin, "bulan_ini" => $bulan_ini, "tahun_ini" => $tahun_ini);
		$waktu 				= 	date('Y-m-d');
		$ip 				= 	$_SERVER['REMOTE_ADDR'];
		$cek				=	$this->crud_model->select_one_where_array("visitors", array("ip" => $ip, "date" => $waktu));
		if (empty($cek)) {
			$this->crud_model->insert("visitors", array("date" => $waktu, "ip" => $ip, "views" => "1"));
		}
		$this->load->view("frontend/main", $data);
	}

	public function faq()
	{
		$data['title']		=	"FAQ";
		$data['page']		=	"/faq";
		$data['dashboard']	=	FALSE;

		$data['data']				=	$this->crud_model->select_all_order("faq", "id_faq", "ASC");

		$tmp_kemarin		= 	mktime(0, 0, 0, date("n"), date("j") - 1, date("Y"));
		$hari_ini			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d")));
		$kemarin			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d", $tmp_kemarin)));
		$bulan_ini			=	$this->crud_model->select_sum("visitors", "views", array("month(date)" => date("m")));
		$tahun_ini			=	$this->crud_model->select_sum("visitors", "views", array("Year(date)" => date("Y")));
		$data['kunjungan']	=	array("hari_ini" => $hari_ini, "kemarin" => $kemarin, "bulan_ini" => $bulan_ini, "tahun_ini" => $tahun_ini);

		$this->load->view("frontend/main", $data);
	}

	public function publikasi()
	{
		$data['title']		=	"PUBLIKASI";
		$data['page']		=	"/publikasi";
		$data['dashboard']	=	FALSE;

		$data['infografik']	=	$this->crud_model->select_all_where_order("berita", "status", "1", "id_berita", "ASC");
		$data['dokumen']	=	$this->crud_model->select_all_order("dokumen", "id_dokumen", "ASC");

		$tmp_kemarin		= 	mktime(0, 0, 0, date("n"), date("j") - 1, date("Y"));
		$hari_ini			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d")));
		$kemarin			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d", $tmp_kemarin)));
		$bulan_ini			=	$this->crud_model->select_sum("visitors", "views", array("month(date)" => date("m")));
		$tahun_ini			=	$this->crud_model->select_sum("visitors", "views", array("Year(date)" => date("Y")));
		$data['kunjungan']	=	array("hari_ini" => $hari_ini, "kemarin" => $kemarin, "bulan_ini" => $bulan_ini, "tahun_ini" => $tahun_ini);

		$this->load->view("frontend/main", $data);
	}

	public function data()
	{

		$data['title']		=	"DATA";
		$data['page']		=	"/data";
		$data['dashboard']	=	FALSE;
		//$nasional			=	$this->crud_model->select_one_order("nasional","id_nasional","DESC");
		$nasional	=	array(
			"positif"		=>	"Sedang diupdate",
			"dirawat"		=>	"Sedang diupdate",
			"sembuh"		=>	"Sedang diupdate",
			"meninggal"		=>	"Sedang diupdate",
			"last_update"	=>	date("Y-m-d H:i:s")
		);
		$api = json_decode(file_get_contents("https://api.kawalcorona.com/indonesia/"));
		foreach ($api as $a) {
			$nasional	=	array(
				"positif"		=>	$a->positif,
				"dirawat"		=>	$a->dirawat,
				"sembuh"		=>	$a->sembuh,
				"meninggal"		=>	$a->meninggal,
				"last_update"	=>	date('Y-m-d H:i:s')
			);
		}
		// 			$api = json_decode(file_get_contents("https://api.kawalcorona.com/"));
		// 			foreach($api as $a){
		// 				if($a->attributes->Country_Region == "Indonesia"){
		// 					$timestamp	=	substr($a->attributes->Last_Update,0,10);
		// 					$nasional			=	array(
		// 						"positif"		=>	$a->attributes->Confirmed,
		// 						"dirawat"		=>	$a->attributes->Active,
		// 						"sembuh"		=>	$a->attributes->Recovered,
		// 						"meninggal"		=>	$a->attributes->Deaths,
		// 						"last_update"	=>	date('Y-m-d H:i:s', $timestamp)
		// 					);
		// 				}
		// 			}
		$positif			=	$this->crud_model->select_one_order("positif", "id_positif", "DESC");
		$gorontalo			=	$this->crud_model->select_one_order("gorontalo", "id_gorontalo", "DESC");
		$data['kasus']		=	$this->crud_model->select_custom_row("select sum(positif) as positif, sum(aktif) as aktif, sum(sembuh) as sembuh, sum(meninggal) as meninggal, last_update from sebaran");
		$data['nasional']	=	$nasional;
		$data['positif']	=	$positif;
		$data['gorontalo']	=	$gorontalo;

		$config['center'] = '0.5490078, 123.0050009';
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);

		$sebaran			=	$this->crud_model->select_all_where("sebaran", "id_sebaran <>", "11");
		// $sebaran			=	$this->crud_model->select_all_where("sebaran", "id_sebaran <>", "10");
		foreach ($sebaran as $seb) {
			$marker = array();
			$marker['position'] = $seb->lat . ", " . $seb->lng;
			$marker['infowindow_content'] = $seb->kecamatan;
			$marker['animation'] = 'DROP';
			$marker['icon'] = base_url("assets_front/img/marker/covid.png");
			$marker['onclick'] = 'detail_sebaran(' . $seb->id_sebaran . ')';
			$this->googlemaps->add_marker($marker);
		}

		$data['map'] = $this->googlemaps->create_map();

		$tmp_kemarin		= 	mktime(0, 0, 0, date("n"), date("j") - 1, date("Y"));
		$hari_ini			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d")));
		$kemarin			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d", $tmp_kemarin)));
		$bulan_ini			=	$this->crud_model->select_sum("visitors", "views", array("month(date)" => date("m")));
		$tahun_ini			=	$this->crud_model->select_sum("visitors", "views", array("Year(date)" => date("Y")));
		$data['kunjungan']	=	array("hari_ini" => $hari_ini, "kemarin" => $kemarin, "bulan_ini" => $bulan_ini, "tahun_ini" => $tahun_ini);

		$this->load->view("frontend/main", $data);
	}

	public function detail_sebaran()
	{
		$data['pilolodaa']		=	array();
		$id						=	$this->input->post("id");
		$detail					=	$this->crud_model->select_one("sebaran", "id_sebaran", $id);
		$data['data']			=	$detail;
		//if($id == "7"){
		//	$data['pilolodaa']	=	$this->crud_model->select_one("sebaran","id_sebaran","10");
		//}
		$this->load->view("frontend/detail_sebaran", $data);
	}

	public function kontak()
	{
		$data['title']		=	"KONTAK";
		$data['page']		=	"/kontak";
		$data['dashboard']	=	FALSE;

		$tmp_kemarin		= 	mktime(0, 0, 0, date("n"), date("j") - 1, date("Y"));
		$hari_ini			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d")));
		$kemarin			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d", $tmp_kemarin)));
		$bulan_ini			=	$this->crud_model->select_sum("visitors", "views", array("month(date)" => date("m")));
		$tahun_ini			=	$this->crud_model->select_sum("visitors", "views", array("Year(date)" => date("Y")));
		$data['kunjungan']	=	array("hari_ini" => $hari_ini, "kemarin" => $kemarin, "bulan_ini" => $bulan_ini, "tahun_ini" => $tahun_ini);

		$this->load->view("frontend/main", $data);
	}

	public function galeri()
	{
		$data['title']		=	"GALERI";
		$data['page']		=	"/galeri";
		$data['dashboard']	=	FALSE;

		$data['data']	=	$this->crud_model->select_all_order("galeri", "id_galeri", "ASC");

		$tmp_kemarin		= 	mktime(0, 0, 0, date("n"), date("j") - 1, date("Y"));
		$hari_ini			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d")));
		$kemarin			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d", $tmp_kemarin)));
		$bulan_ini			=	$this->crud_model->select_sum("visitors", "views", array("month(date)" => date("m")));
		$tahun_ini			=	$this->crud_model->select_sum("visitors", "views", array("Year(date)" => date("Y")));
		$data['kunjungan']	=	array("hari_ini" => $hari_ini, "kemarin" => $kemarin, "bulan_ini" => $bulan_ini, "tahun_ini" => $tahun_ini);

		$this->load->view("frontend/main", $data);
	}

	public function download()
	{
		$id					=	$this->uri->segment(3);
		$detail				=	$this->crud_model->select_one("berita", "id_berita", $id);
		$this->load->helper('download');
		$nama	=	$detail->gambar;
		$data	=	file_get_contents("./uploads/berita/" . $detail->gambar);
		force_download($nama, $data);
	}

	public function download_dokumen()
	{
		$id					=	$this->uri->segment(3);
		$detail				=	$this->crud_model->select_one("dokumen", "id_dokumen", $id);
		$this->load->helper('download');
		$nama	=	$detail->file;
		$data	=	file_get_contents("./uploads/dokumen/" . $detail->file);
		force_download($nama, $data);
	}

	public function pengaduan()
	{
		$data['title']		=	"Pengaduan";
		$data['page']		=	"/pengaduan";
		$data['dashboard']	=	FALSE;
		$this->load->view("frontend/main", $data);
	}

	public function pengaduan_aksi()
	{
		$nama		=	$this->input->post("nama");
		$no_ktp		=	$this->input->post("no_ktp");
		$no_telp	=	$this->input->post("no_telp");
		$pekerjaan	=	$this->input->post("pekerjaan");
		$alamat		=	$this->input->post("alamat");
		$terlapor	=	$this->input->post("terlapor");
		$isi_aduan	=	$this->input->post("isi_aduan");
		$data		=	array(
			"id"			=>	$this->crud_model->cek_id("aduan", "id"),
			"nama"			=>	$nama,
			"no_ktp"		=>	$no_ktp,
			"no_telp"		=>	$no_telp,
			"pekerjaan"		=>	$pekerjaan,
			"alamat"		=>	$alamat,
			"terlapor"		=>	$terlapor,
			"isi_aduan"		=>	$isi_aduan,
			"tanggal_aduan"	=>	date("Y-m-d"),
			"status"		=>	"new"
		);
		$insert		=	$this->crud_model->insert("aduan", $data);
		if ($insert) {
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Aduan Berhasil Dikirim"
			);
		} else {
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Aduan Gagal Dikirim"
			);
		}
		// print_r($data);
		$this->session->set_flashdata("notifikasi", $notifikasi);
		redirect("frontend/pengaduan");
	}

	public function berita()
	{
		$data['title']		=	"Berita";
		$data['page']		=	"/berita";
		$data['dashboard']	=	FALSE;

		$where				=	array();
		$key				=	array();
		$where['status']	=	"1";
		$jumlah_data 		= 	$this->crud_model->select_all_where_array_num_row("berita", $where);
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'frontend/berita/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$data['data']				=	$this->crud_model->select_paging_where("berita", $where, $config['per_page'], $from, "create_at", "DESC");

		$this->load->view("frontend/main", $data);
	}

	public function detail_berita()
	{
		$data['title']		=	"Detail Berita";
		$data['page']		=	"/detail_berita";
		$data['dashboard']	=	FALSE;
		$id					=	$this->uri->segment(3);
		$data['data']		=	$this->crud_model->select_one("berita", "id_berita", $id);

		$this->load->view("frontend/main", $data);
	}

	public function lawanhoax()
	{
		$data['title']		=	"Lawan Hoax";
		$data['page']		=	"/hoax";
		$data['dashboard']	=	FALSE;

		$where				=	array();
		$key				=	array();
		$where['status']	=	"1";
		$jumlah_data 		= 	$this->crud_model->select_all_where_array_num_row("hoax", $where);
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'frontend/lawanhoax/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination pagination-border">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$data['data']				=	$this->crud_model->select_paging_where("hoax", $where, $config['per_page'], $from, "create_at", "DESC");

		$tmp_kemarin		= 	mktime(0, 0, 0, date("n"), date("j") - 1, date("Y"));
		$hari_ini			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d")));
		$kemarin			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d", $tmp_kemarin)));
		$bulan_ini			=	$this->crud_model->select_sum("visitors", "views", array("month(date)" => date("m")));
		$tahun_ini			=	$this->crud_model->select_sum("visitors", "views", array("Year(date)" => date("Y")));
		$data['kunjungan']	=	array("hari_ini" => $hari_ini, "kemarin" => $kemarin, "bulan_ini" => $bulan_ini, "tahun_ini" => $tahun_ini);

		$this->load->view("frontend/main", $data);
	}

	public function detail_hoax()
	{
		$data['title']		=	"Detail HOAX";
		$data['page']		=	"/detail_hoax";
		$data['dashboard']	=	FALSE;
		$id					=	$this->uri->segment(3);
		$detail				=	$this->crud_model->select_one("hoax", "id_hoax", $id);
		$data['data']		=	$detail;

		// -------- Tambah HITS -----------
		$hits				=	$detail->hits + 1;
		$data_update		=	array("hits" => $hits);
		$this->crud_model->update("hoax", $data_update, "id_hoax", $id);
		// -------- Tambah HITS -----------

		$tmp_kemarin		= 	mktime(0, 0, 0, date("n"), date("j") - 1, date("Y"));
		$hari_ini			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d")));
		$kemarin			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d", $tmp_kemarin)));
		$bulan_ini			=	$this->crud_model->select_sum("visitors", "views", array("month(date)" => date("m")));
		$tahun_ini			=	$this->crud_model->select_sum("visitors", "views", array("Year(date)" => date("Y")));
		$data['kunjungan']	=	array("hari_ini" => $hari_ini, "kemarin" => $kemarin, "bulan_ini" => $bulan_ini, "tahun_ini" => $tahun_ini);

		$this->load->view("frontend/main", $data);
	}

	public function sebaran_all()
	{
		$this->load->library('googlemaps');
		$api = json_decode(file_get_contents("https://api.kawalcorona.com/"));
		$config['center'] = '0.5490078, 123.0050009';
		$config['zoom'] = '2';
		$this->googlemaps->initialize($config);

		foreach ($api as $a) {
			$marker = array();
			$marker['position'] = $a->attributes->Lat . ", " . $a->attributes->Long_;
			$marker['infowindow_content'] = '<h1>' . $a->attributes->Country_Region . '</h1><h3>Positif : ' . $a->attributes->Confirmed . '<br>Dirawat : ' . $a->attributes->Active . '<br>Sembuh : ' . $a->attributes->Recovered . '<br>Meninggal : ' . $a->attributes->Deaths . '</h3>';
			$marker['animation'] = 'DROP';
			$marker['icon'] = base_url("assets_front/img/marker/welfareroom.png");
			$this->googlemaps->add_marker($marker);
		}
		$data['map'] = $this->googlemaps->create_map();
		$data['page'] = "/sebaran";
		$data['data'] = $api;

		$this->load->view("frontend/main", $data);
	}

	public function sebaran_prov()
	{
		$this->load->library('googlemaps');
		$api = json_decode(file_get_contents("https://api.kawalcorona.com/indonesia/provinsi"));

		$data['page'] = "/sebaran_prov";
		$data['data'] = $api;

		$tmp_kemarin		= 	mktime(0, 0, 0, date("n"), date("j") - 1, date("Y"));
		$hari_ini			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d")));
		$kemarin			=	$this->crud_model->select_sum("visitors", "views", array("date" => date("Y-m-d", $tmp_kemarin)));
		$bulan_ini			=	$this->crud_model->select_sum("visitors", "views", array("month(date)" => date("m")));
		$tahun_ini			=	$this->crud_model->select_sum("visitors", "views", array("Year(date)" => date("Y")));
		$data['kunjungan']	=	array("hari_ini" => $hari_ini, "kemarin" => $kemarin, "bulan_ini" => $bulan_ini, "tahun_ini" => $tahun_ini);

		$this->load->view("frontend/main", $data);
	}
}
