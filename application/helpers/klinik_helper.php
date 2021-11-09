<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function number_format_short( $n, $precision = 1 ) {
	if ($n < 900) {
		// 0 - 900
		$n_format = number_format($n, $precision);
		$suffix = '';
	} else if ($n < 900000) {
		// 0.9k-850k
		$n_format = number_format($n / 1000, $precision);
		$suffix = 'K';
	} else if ($n < 900000000) {
		// 0.9m-850m
		$n_format = number_format($n / 1000000, $precision);
		$suffix = 'M';
	} else if ($n < 900000000000) {
		// 0.9b-850b
		$n_format = number_format($n / 1000000000, $precision);
		$suffix = 'B';
	} else {
		// 0.9t+
		$n_format = number_format($n / 1000000000000, $precision);
		$suffix = 'T';
	}
  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
	if ( $precision > 0 ) {
		$dotzero = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}
	return $n_format . $suffix;
}

function get_userdata_apk($index){
	$ci =& get_instance();
	$ret	=	$ci->session->userdata("data_aplikasi")[$index];
	return $ret;
}

function get_userdata_user($index){
	$ci =& get_instance();
	$ret	=	$ci->session->userdata("user")[$index];
	return $ret;
}

function level_user(){
	$level	=	get_userdata_user("type");
	if($level == "admin"){
		$ret	=	"Administrator";
	}else{
		$ret	=	"SKPD";
	}
	return $ret;
}

function status_pinjam($status){
	if($status == "1"){
		$class	=	"info";
		$label	=	"Belum Dibayar";
	}elseif($status == "2"){
		$class	=	"primary";
		$label	=	"Proses";
	}elseif($status == "3"){
		$class	=	"warning";
		$label	=	"Selesai";
	}else{
		if(level_user() == "Pengguna"){
			$class	=	"danger";
		}else{
			$class	=	"important";
		}
		$label	=	"Dibatalkan";
	}
	if(level_user() == "Pengguna"){
		$ret	=	'<span class="badge badge-'.$class.'">'.$label.'</span>';
	}else{
		$ret	=	'<span class="label label-'.$class.'">'.$label.'</span>';
	}
	return $ret;
}

function status_bayar($status){
	if($status == "1"){
		$class	=	"info";
		$label	=	"Pending";
	}elseif($status == "2"){
		$class	=	"warning";
		$label	=	"Disetujui";
	}else{
		if(level_user() == "Pengguna"){
			$class	=	"danger";
		}else{
			$class	=	"important";
		}
		$label	=	"Dibatalkan";
	}
	if(level_user() == "Pengguna"){
		$ret	=	'<span class="badge badge-'.$class.'">'.$label.'</span>';
	}else{
		$ret	=	'<span class="label label-'.$class.'">'.$label.'</span>';
	}
	return $ret;
}

function rupiah($angka){	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

function random($panjang_karakter) {
	$karakter = '0123456789';
	$string = '';
	for($i = 0; $i < $panjang_karakter; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter[$pos];
	}
	return $string;
}
