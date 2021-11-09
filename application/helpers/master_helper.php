<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function __construct() {
		//parent::__construct();
		$this->load->model("crud_model");
	}
	
	// ============================================
	// Cek data kalau sudah ada atau belum where array
	// ============================================
	function cek_data_where_array($table,$where){
		$CI =& get_instance();
		$CI->db->select('*'); 
		$CI->db->where($where);		
		$cek = $CI->db->get($table)->row();
		if(empty($cek)){
			return true;
		}else{
			return false;
		}
	}
	
	// ============================================
	// ambil nama dari table
	// ============================================
	function ambil_nama_by_id($table,$field,$field_by,$key){
		$CI =& get_instance();
		$sql	=	$CI->crud_model->select_one($table,$field_by,$key);
		$data	= 	empty($sql) ? "-" : $sql->$field;
		return $data;
	}
	
	// ============================================
	// ambil data by id return result no where
	// ============================================
	function ambil_data($tabel,$order,$order_by){
		$CI =& get_instance();
		$CI->db->select('*'); 
		$CI->db->order_by($order, $order_by);
		$CI->db->from($tabel);
		$query 	= 	$CI->db->get();
		$data	=	$query->result();
		return $data;
	}
	
	// ============================================
	// ambil data by id return result
	// ============================================
	function ambil_data_by_id($tabel,$field,$id){
		$CI =& get_instance();
		$CI->db->select('*'); 
		$CI->db->where($field, $id);
		$CI->db->from($tabel);
		$query 	= 	$CI->db->get();
		$data	=	$query->result();
		return $data;
	}
	
	// ============================================
	// ambil data by id return result order
	// ============================================
	function ambil_data_by_id_order($tabel,$field,$id,$order,$order_by){
		$CI =& get_instance();
		$CI->db->select('*'); 
		$CI->db->where($field, $id);
		$CI->db->order_by($order, $order_by);
		$CI->db->from($tabel);
		$query 	= 	$CI->db->get();
		$data	=	$query->result();
		return $data;
	}
	
	// ============================================
	// ambil data by id return row
	// ============================================
	function ambil_data_by_id_row($tabel,$field,$id){
		$CI =& get_instance();
		$CI->db->select('*'); 
		$CI->db->where($field, $id);
		$CI->db->from($tabel);
		$query 	= 	$CI->db->get();
		$data	=	$query->row();
		return $data;
	}
	
	// ============================================
	// ambil data by id return row where array
	// ============================================
	function ambil_data_by_id_row_where_array($tabel,$where){
		$CI =& get_instance();
		$CI->db->select('*'); 
		$CI->db->where($where);
		$CI->db->from($tabel);
		$query 	= 	$CI->db->get();
		$data	=	$query->row();
		return $data;
	}
	
	// ============================================
	// ambil data by id return result where array
	// ============================================
	function ambil_data_by_id_where_array($tabel,$where){
		$CI =& get_instance();
		$CI->db->select('*'); 
		$CI->db->where($where);
		$CI->db->from($tabel);
		$query 	= 	$CI->db->get();
		$data	=	$query->result();
		return $data;
	}
	
	// ============================================
	// ambil num_row by id return num_row where
	// ============================================
	function ambil_numrow_by_id($tabel,$field,$id){
		$CI =& get_instance();
		$CI->db->select('*'); 
		$CI->db->where($field,$id);
		$CI->db->from($tabel);
		$query 	= 	$CI->db->get();
		$data	=	$query->num_rows();
		return $data;
	}
	
	// ============================================
	// ambil num_row by id return num_row where array
	// ============================================
	function ambil_numrow_by_id_where_array($tabel,$where){
		$CI =& get_instance();
		$CI->db->select('*'); 
		$CI->db->where($where);
		$CI->db->from($tabel);
		$query 	= 	$CI->db->get();
		$data	=	$query->num_rows();
		return $data;
	}
?>