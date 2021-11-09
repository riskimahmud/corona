<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function cek_session($menu){
		$CI =& get_instance();
		if(empty($CI->session->userdata('user'))){
			redirect('Login/logout');
		}else{
			$role	=	$CI->crud_model->select_one("role","id_user",$CI->session->userdata('user')['id_user']);
			if($role->$menu == "t"){
				redirect('Login/logout');
			}
		}
		// return $action;
	}
	
	function cek_action_edit(){
		$CI =& get_instance();
		$action	=	$CI->session->userdata("user")['action_edit'];
		if($action == "y"){
			return true;
		}else{
			return false;
		}
		// return $action;
	}
	
	function cek_akses_menu($menu,$id_user){
		$CI =& get_instance();
		// $role	=	$CI->crud_model->select_one("role","id_user",$id_user);
		// if($role->$menu == "y"){
			return true;
		// }else{
			// return false;
		// }
	}
	
	function cek_level($level){
		if($level == "1"){
			$ret	=	"Kelurahan";
		}elseif($level == "2"){
			$ret	=	"Operator";
		}elseif($level == "3"){
			$ret	=	"Administrator";
		}else{
			$ret	=	"Pimpinan";
		}
		return $ret;
	}
	
?>