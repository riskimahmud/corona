<?php
class Join_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }
	
	function dua_tabel($table1,$table2,$id,$field,$by){
		$this->db->select('*');    
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$this->db->order_by($field,$by);
		$query = $this->db->get();
		return	$query->result();
	}
	
	function dua_tabel_where($table1,$table2,$id,$field,$key){
		$this->db->select('*');    
		$this->db->where($field, $key);
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$query = $this->db->get();
		return	$query->result();
	}
	
	// dua tabel where array
	function dua_tabel_where_array($table1,$table2,$id,$where){
		$this->db->select('*');    
		$this->db->where($where);
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$query = $this->db->get();
		return	$query->result();
	}
	
	// dua tabel where array dan order by
	function dua_tabel_where_array_order($table1,$table2,$id,$where,$field,$by){
		$this->db->select('*');    
		$this->db->where($where);
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$this->db->order_by($field,$by);
		$query = $this->db->get();
		return	$query->result();
	}
	
	function dua_tabel_row($table1,$table2,$id){
		$this->db->select('*');    
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$query = $this->db->get();
		return	$query->row();
	}
	
	function dua_tabel_row_where($table1,$table2,$id,$field,$key){
		$this->db->select('*');    
		$this->db->where($field, $key);
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$query = $this->db->get();
		return	$query->row();
	}
	
	// Tiga tabel
	function tiga_tabel($table1,$table2,$table3,$id,$id2,$field,$by){
		$this->db->select('*');    
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$this->db->join($table3, $table1.".".$id2." = ".$table3.".".$id2);
		$this->db->order_by($field,$by);
		$query = $this->db->get();
		return	$query->result();
	}
	
	// Tiga tabel where
	function tiga_tabel_where($table1,$table2,$table3,$id,$id2,$field,$by){
		$this->db->select('*');    
		$this->db->where($field,$by);
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$this->db->join($table3, $table1.".".$id2." = ".$table3.".".$id2);
		$query = $this->db->get();
		return	$query->result();
	}
	
	// tiga tabel where array
	function tiga_tabel_where_array($table1,$table2,$table3,$id,$id2,$where){
		$this->db->select('*');    
		$this->db->where($where);
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$this->db->join($table3, $table1.".".$id2." = ".$table3.".".$id2);
		$query = $this->db->get();
		return	$query->result();
	}
	
	// tiga tabel where array order
	function tiga_tabel_where_array_order($table1,$table2,$table3,$id,$id2,$where,$order,$order_by){
		$this->db->select('*');    
		$this->db->where($where);
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$this->db->join($table3, $table1.".".$id2." = ".$table3.".".$id2);
		$this->db->order_by($order,$order_by);
		$query = $this->db->get();
		return	$query->result();
	}
	
	// tiga tabel where array + like
	function tiga_tabel_where_array_like($table1,$table2,$table3,$id,$id2,$where,$like,$param){
		$this->db->select('*');    
		$this->db->where($where);
		$this->db->from($table1);
		$this->db->join($table2, $table1.".".$id." = ".$table2.".".$id);
		$this->db->join($table3, $table1.".".$id2." = ".$table3.".".$id2);
		$this->db->like($like, $param);
		$query = $this->db->get();
		return	$query->result();
	}
}
?>