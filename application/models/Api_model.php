<?php
class Api_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }
	 
	function select_odp($where){
		$this->db->select('*'); 
		$this->db->where($where);
		$this->db->order_by("id_gorontalo","DESC");	
		$this->db->limit(1);	
		$query = $this->db->get("gorontalo");
		return $query->row();
	}
	 
	function select_positif($where){
		$this->db->select('positif,dirawat,sembuh,meninggal'); 
		$this->db->where($where);
		$this->db->order_by("id_positif","DESC");	
		$this->db->limit(1);	
		$query = $this->db->get("positif");
		return $query->row();
	}
}
?>