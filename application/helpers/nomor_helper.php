<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function generate_nopermohonan($date){
		$CI =& get_instance();
		$sql	=	$CI->crud_model->select_max("permohonan","no_permohonan","year(tgl_permohonan)",$date);
		// $data	= 	empty($sql) ? "1" : $sql + 1;
		return $sql;
	}
	
	function generate_nojenisperbulan($id_jenis,$date){
		$pisah	=	explode("-",$date);
		$bulan	=	$pisah[1];		
		$where	=	array(
			"id_jenis"					=>	$id_jenis,
			"kode_sampel <>"			=>	"",
			"month(create_at)"			=>	$bulan,
			"year(create_at)"			=>	$date
			// "month('$date')"		=>	''
		);
		$CI =& get_instance();
		$sql	=	$CI->crud_model->select_all_where_array_num_row("permohonan_sampel",$where);
		if($sql == 0){
			$data	=	1;
		}else{
			$data	=	$sql + 1;
		}
		return $data;
	}
	
	function generate_nosurat(){
		
	}
?>