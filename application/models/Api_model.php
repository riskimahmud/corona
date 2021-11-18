<?php
class Api_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function select_odp($where)
	{
		$this->db->select('*');
		$this->db->where($where);
		$this->db->order_by("id_gorontalo", "DESC");
		$this->db->limit(1);
		$query = $this->db->get("gorontalo");
		return $query->row();
	}

	function select_positif($where)
	{
		$this->db->select('positif,dirawat,sembuh,meninggal');
		$this->db->where($where);
		$this->db->order_by("id_positif", "DESC");
		$this->db->limit(1);
		$query = $this->db->get("positif");
		return $query->row();
	}

	public function getVaksinasi($nik)
	{
		$this->db->order_by('tanggal', 'ASC');
		return $this->db->get_where("vaksin", ["nik" => $nik])->result_array();
	}

	public function getJadwalVaksinasi()
	{
		$this->db->select('*');
		$this->db->where(["tanggal >=" => date("Y-m-d")]);
		$this->db->order_by("tanggal", "ASC");
		$data = $this->db->get("jadwal_vaksin")->result_array();
		return $data;
	}

	public function getTempatTidur()
	{
		$this->db->select('*');
		$this->db->where("digunakan < kuota", null, false);
		$data = $this->db->get("tempat_rawat")->result_array();
		return $data;
	}
}
