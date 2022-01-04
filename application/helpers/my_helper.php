<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function header_no_cache()
{

	header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");

	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

	header("Cache-Control: post-check=0, pre-check=0", FALSE);

	header("Pragma: no-cache");
}

// ambil_notifikasi
function get_notif($status, $pesan)
{
	if ($status == "1") {
		$st	=	"success";
	} else {
		$st	=	"danger";
	}
	$ret	=	'<div class="alert alert-' . $st . '">' . $pesan . '</div>';
	return $ret;
}

// fungsi untuk tanggal indonesia
function tgl_indonesia($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$tanggal = substr($tgl, 8, 2);
		$nama_bulan = array(
			"Januari", "Februari", "Maret", "April", "Mei",
			"Juni", "Juli", "Agustus", "September",
			"Oktober", "November", "Desember"
		);
		$bulan = $nama_bulan[substr($tgl, 5, 2) - 1];
		$tahun = substr($tgl, 0, 4);
		$fix	=	$tanggal . ' ' . $bulan . ' ' . $tahun;
	}
	return $fix;
}

// fungsi untuk tanggal laporan
function tgl_laporan($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$tanggal = substr($tgl, 8, 2);
		$nama_bulan = array(
			"Jan", "Feb", "Mar", "Apr", "Mei",
			"Jun", "Jul", "Agu", "Sep",
			"Okt", "Nov", "Des"
		);
		$bulan = $nama_bulan[substr($tgl, 5, 2) - 1];
		$tahun = substr($tgl, 0, 4);
		$fix	=	$tanggal . ' ' . $bulan . ' ' . $tahun;
	}
	return $fix;
}

// fungsi untuk mengambil tanggal (hanya tanggal)
function tanggal_bulan($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$tanggal = substr($tgl, 8, 2);
		$nama_bulan = array(
			"Januari", "Februari", "Maret", "April", "Mei",
			"Juni", "Juli", "Agustus", "September",
			"Oktober", "November", "Desember"
		);
		$bulan = $nama_bulan[substr($tgl, 5, 2) - 1];
		$tahun = substr($tgl, 0, 4);
		$fix	=	$tanggal . " " . $bulan;
	}
	return $fix;
}

// fungsi untuk mengambil tanggal (hanya tanggal)
function tanggal($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$tanggal = substr($tgl, 8, 2);
		$fix	=	$tanggal;
	}
	return $fix;
}

// fungsi untuk mengambil tanggal (hanya bulan)
function bulan($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$nama_bulan = array(
			"Jan", "Feb", "Mar", "Apr", "Mei",
			"Jun", "Jul", "Agu", "Sep",
			"Okt", "Nov", "Des"
		);
		$bulan = $nama_bulan[substr($tgl, 5, 2) - 1];
		$fix	=	$bulan;
	}
	return $fix;
}

// fungsi untuk mengambil tanggal (hanya bulan Full)
function nama_bulan($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$nama_bulan = array(
			"Januari", "Februari", "Maret", "April", "Mei",
			"Juni", "Juli", "Agustus", "September",
			"Oktober", "November", "Desember"
		);
		$bulan = $nama_bulan[substr($tgl, 5, 2) - 1];
		$fix	=	$bulan;
	}
	return $fix;
}

// fungsi untuk mengambil tanggal (hanya tahun)
function tahun($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$tahun = substr($tgl, 0, 4);
		$fix	=	$tahun;
	}
	return $fix;
}

// fungsi untuk mengambil tanggal (hanya bulan)
function bulan_tahun($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$nama_bulan = array(
			"Jan", "Feb", "Mar", "Apr", "Mei",
			"Jun", "Jul", "Agu", "Sep",
			"Okt", "Nov", "Des"
		);
		$bulan = $nama_bulan[substr($tgl, 5, 2) - 1];
		$tahun = substr($tgl, 2, 2);
		$fix	=	$bulan . " " . $tahun;
	}
	return $fix;
}

// Fungsi tanggal full
function tgl_full($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$hari = array(
			1 => 'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);
		// $hari 	 = substr($tgl,8,2);
		$tanggal = substr($tgl, 8, 2);
		$nama_bulan = array(
			"Januari", "Februari", "Maret", "April", "Mei",
			"Juni", "Juli", "Agustus", "September",
			"Oktober", "November", "Desember"
		);
		$bulan = $nama_bulan[substr($tgl, 5, 2) - 1];
		$tahun = substr($tgl, 0, 4);
		$jam = substr($tgl, 11, 5);

		$num = date('N', strtotime($tgl));
		$fix = $hari[$num] . ", " . $tanggal . " " . $bulan . " " . $tahun . ", Pukul " . $jam;
	}
	return $fix;
}

// fungsi untuk hari dan tanggal
function hari_tanggal($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$hari = array(
			1 => 'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);
		// $hari 	 = substr($tgl,8,2);
		$tanggal = substr($tgl, 8, 2);
		$nama_bulan = array(
			"Januari", "Februari", "Maret", "April", "Mei",
			"Juni", "Juli", "Agustus", "September",
			"Oktober", "November", "Desember"
		);
		$bulan = $nama_bulan[substr($tgl, 5, 2) - 1];
		$tahun = substr($tgl, 0, 4);

		$num = date('N', strtotime($tgl));
		$fix = $hari[$num] . ", " . $tanggal . " " . $bulan . " " . $tahun;
	}
	return $fix;
}

// fungsi untuk hari
function hari($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$hari = array(
			1 => 'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);
		$tanggal = substr($tgl, 8, 2);
		$num = date('N', strtotime($tgl));
		$fix = $hari[$num];
	}
	return $fix;
}

// Fungsi jam dari tgl full
function jam($tgl)
{
	if ($tgl == "0000-00-00" || $tgl == NULL) {
		$fix	=	"-";
	} else {
		$jam = substr($tgl, 11, 5);
		$fix	=	"Pukul :" . $jam;
	}
	return $fix;
}

// fungsi untuk ambil bulan dari for
function bulan_for($id)
{
	$nama_bulan = array(
		"Januari", "Februari", "Maret", "April", "Mei",
		"Juni", "Juli", "Agustus", "September",
		"Oktober", "November", "Desember"
	);
	$bulan = $nama_bulan[$id - 1];
	$fix	=	$bulan;
	return $fix;
}

function text_to_date($text = null)
{
	if ($text === null) {
		return null;
	}

	$nama_bulan = array(
		"Januari" => "01",
		"Februari" => "02",
		"Maret" => "03",
		"April" => "04",
		"Mei" => "05",
		"Juni" => "06",
		"Juli" => "07",
		"Agustus" => "08",
		"September" => "09",
		"Oktober" => "10",
		"November" => "11",
		"Desember" => "12"
	);
	$pisah = explode(" ", $text);

	if (strpos($text, ' ') !== false) {
		// explodable
		if (array_key_exists(ucfirst(strtolower($pisah[1])), $nama_bulan)) {
			// echo "The 'first' element is in the array";
			return $pisah['2'] . "-" . $nama_bulan[ucfirst(strtolower($pisah[1]))] . "-" . $pisah[0];
		} else {
			return "Salah";
		}

		// return $pisah['2'] . "-" . $nama_bulan[ucfirst(strtolower($pisah[1]))] . "-" . $pisah[0];
		// if (count($pisah) === 2) {
		// 	return "salah";
		// } else {
		// 	return $pisah[1];
		// }
	} else {
		return "Salah";
		// not explodable
	}
}
