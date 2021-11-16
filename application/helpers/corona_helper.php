<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function get_userdata_apk($index)
{
	$ci = &get_instance();
	$ret	=	$ci->session->userdata("data_aplikasi")[$index];
	return $ret;
}

function get_userdata_user($index)
{
	$ci = &get_instance();
	$ret	=	$ci->session->userdata("user")[$index];
	return $ret;
}

function level_user()
{
	$level	=	get_userdata_user("type");
	if ($level == "admin") {
		$ret	=	"Administrator";
	} else {
		$ret	=	"SKPD";
	}
	return $ret;
}

function titik_angka($angka, $rupiah = false)
{
	if ($rupiah) {
		$hasil = "Rp " . number_format($angka, 0, ',', '.');
	} else {
		$hasil = number_format($angka, 0, ',', '.');
	}
	return $hasil;
}

function random($panjang_karakter)
{
	$karakter = '0123456789';
	$string = '';
	for ($i = 0; $i < $panjang_karakter; $i++) {
		$pos = rand(0, strlen($karakter) - 1);
		$string .= $karakter[$pos];
	}
	return $string;
}
