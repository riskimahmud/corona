<?php
	class Runningtext extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model("api_model");
		}
		
		public function index(){
			$return		=	array();
			$total_odp				=	0;
			$odp_proses				=	0;
			$odp_selesai			=	0;
			$total_pdp				=	0;
			$pdp_proses				=	0;
			$pdp_selesai			=	0;
			$total_terkonfirmasi	=	0;
			$total_sembuh			=	0;
			$total_meninggal		=	0;
			$update_datetime		=	date("Y-m-d H:i:s");
			if(empty($this->input->get("Date_from")) || empty($this->input->get("Date_to"))){
				$get_dari	=	date("Y-m-d")." 00:00:00";
				$get_sampai	=	date("Y-m-d")." 23:59:59";
				$where	=	array(
					"create_at <>" => ""
				);
			}else{
				$get_dari	=	$this->input->get("Date_from");
				$get_sampai	=	$this->input->get("Date_to");
				$dari		=	substr($get_dari,0,19);
				$sampai		=	substr($get_sampai,0,19);
				$fix_dari 	= date('Y-m-d H:i:s', strtotime($dari));
				$fix_sampai = date('Y-m-d H:i:s', strtotime($sampai));
				
				$where	=	array(
					"create_at >=" =>	$fix_dari,
					"create_at <=" =>	$fix_sampai
				);
			}
			
			$odp		=	$this->api_model->select_odp($where);
			$positif	=	$this->api_model->select_positif($where);
			
			if(!empty($odp)){
				$total_odp			=	$odp->total_odp;
				$odp_proses			=	$odp->pro_pemantauan;
				$odp_selesai		=	$odp->sel_pemantauan;
				$total_pdp			=	$odp->total_pdp;
				$pdp_proses			=	$odp->dirawat;
				$pdp_selesai		=	$odp->sehat;
				$update_datetime	=	$odp->create_at;
			}
			if(!empty($positif)){
				$total_terkonfirmasi	=	$positif->positif;
				$total_sembuh			=	$positif->sembuh;
				$total_meninggal		=	$positif->meninggal;
			}
			
			$data	=	array(
				"total_odp"				=>	$total_odp,
				"odp_proses"			=>	$odp_proses,
				"odp_selesai"			=>	$odp_selesai,
				"detil_odp"				=>	array(),
				"total_pdp"				=>	$total_pdp,
				"pdp_proses"			=>	$pdp_proses,
				"pdp_selesai"			=>	$pdp_selesai,
				"detil_pdp"				=>	array(),
				"total_terkonfirmasi"	=>	$total_terkonfirmasi,
				"detil_terkonfirmasi"	=>	array(),
				"total_sembuh"			=>	$total_sembuh,
				"detil_sembuh"			=>	array(),
				"total_meninggal"		=>	$total_meninggal,
				"detil_meninggal"		=>	array(),
				"update_datetime"		=>	$update_datetime
			);
			
			$return["response_code"]	=	"RC200";
			$return["kode_wilayah"]	    =	"75.71";
			$return["message"]			=	"success";
			$return["description"]		=	"Data berhasil didapatkan";
			$return["date_from"]		=	$get_dari;
			$return["date_to"]			=	$get_sampai;
			$return["data"]				=	$data;
			
			// $response = array();
			echo "<marquee>DATA PANTAUAN COVID-19 DI KOTA GORONTALO
				  &nbsp;&nbsp;".tgl_full(date("Y-m-d H:i:s"))." WITA
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ODP&nbsp;&nbsp;TOTAL : ".$total_odp."
				  &nbsp;&nbsp;PROSES PEMANTAUAN : ".$odp_proses."
				  &nbsp;&nbsp;SELESAI PEMANTAUAN : ".$odp_selesai."
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PDP&nbsp;&nbsp;TOTAL : ".$total_pdp."
				  &nbsp;&nbsp;PROSES PENGAWASAN : ".$pdp_proses."
				  &nbsp;&nbsp;SELESAI PENGAWASAN : ".$pdp_selesai."
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KASUS TERKONFIRMASI POSITIF&nbsp;&nbsp;TOTAL : ".$total_terkonfirmasi."
				  &nbsp;&nbsp;SEMBUH : ".$total_sembuh."
				  &nbsp;&nbsp;MENINGGAL : ".$total_meninggal."</marquee>";
			//header('Content-Type: application/json');
			//echo json_encode($return,TRUE);

		}
	}
?>