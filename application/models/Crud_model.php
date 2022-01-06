<?php
class Crud_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	// Cek id
	function cek_id($table, $field)
	{
		$this->db->select('*');
		$this->db->order_by($field, "DESC");
		$this->db->limit(1);
		$cek = $this->db->get($table)->row();
		if (empty($cek)) {
			return "1";
		} else {
			$data	=	$cek->$field + 1;
			return $data;
		}
	}

	// cek data kalau sudah ada atau belum
	function cek_data($table, $field, $id)
	{
		$this->db->select('*');
		$this->db->where($field, $id);
		$cek = $this->db->get($table)->row();
		if (empty($cek)) {
			return true;
		} else {
			return false;
		}
	}

	// cek data kalau sudah ada atau belum dengan where array
	function cek_data_where_array($table, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		$cek = $this->db->get($table)->row();
		if (empty($cek)) {
			return true;
		} else {
			return false;
		}
	}

	// cek data kalau sudah ada atau belum 
	function cek_data_ex($table, $field, $id, $ex_field, $ex_id)
	{
		$this->db->select('*');
		$this->db->where($field, $id);
		$this->db->where($ex_field, $ex_id);
		$cek = $this->db->get($table)->row();
		if (empty($cek)) {
			return true;
		} else {
			return false;
		}
	}

	// ======== ********************************************************************** ==============

	// select
	function select_all($table)
	{
		$this->db->select('*');
		$query = $this->db->get($table);
		return $query->result();
	}

	// select where order
	function select_all_where_order($table, $where, $whereby, $order, $order_by)
	{
		$this->db->select('*');
		$this->db->where($where, $whereby);
		$this->db->order_by($order, $order_by);
		$query = $this->db->get($table);
		return $query->result();
	}

	// select order
	function select_all_order($table, $field, $by)
	{
		$this->db->select('*');
		$this->db->order_by($field, $by);
		$query = $this->db->get($table);
		return $query->result();
	}

	// select where
	function select_all_where($table, $field, $key)
	{
		$this->db->select('*');
		$this->db->where($field, $key);
		$query = $this->db->get($table);
		return $query->result();
	}

	// select where array
	function select_all_where_array($table, $where, $order = null)
	{
		$this->db->select('*');
		$this->db->where($where);
		if ($order !== null) {
			foreach ($order as $ind => $val) {
				$this->db->order_by($ind, $val);
			}
		}
		$query = $this->db->get($table);
		return $query->result();
	}

	// select where array row
	function select_all_where_array_row($table, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->result();
	}

	// select where group
	function select_all_where_group($table, $field, $key, $group)
	{
		$this->db->select('*');
		$this->db->where($field, $key);
		$this->db->group_by($group);
		$query = $this->db->get($table);
		return $query->result();
	}

	// select where limit
	function select_all_where_limit($table, $field, $key, $order, $order_by, $limit)
	{
		$this->db->select('*');
		$this->db->where($field, $key);
		$this->db->order_by($order, $order_by);
		$this->db->limit($limit);
		$query = $this->db->get($table);
		return $query->result();
	}

	// select where array limit
	function select_all_where_array_limit($table, $field, $key, $order, $orderby, $limit)
	{
		$this->db->select('*');
		$this->db->where($field, $key);
		$this->db->order_by($order, $orderby);
		$this->db->limit($limit);
		$query = $this->db->get($table);
		return $query->result();
	}

	// select where array order
	function select_all_where_array_order($table, $where, $order, $orderby)
	{
		$this->db->select('*');
		$this->db->where($where);
		$this->db->order_by($order, $orderby);
		$query = $this->db->get($table);
		return $query->result();
	}

	function select_one($table, $field, $key)
	{
		$this->db->select('*');
		$this->db->where($field, $key);
		$query = $this->db->get($table);
		return $query->row();
	}

	// select row array *** untuk update userdata user
	function select_one_row_array($table, $field, $key)
	{
		$this->db->select('*');
		$this->db->where($field, $key);
		$query = $this->db->get($table);
		return $query->row_array();
	}

	function select_one_where_array($table, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->row();
	}

	function select_one_order($table, $order, $orderby)
	{
		$this->db->select('*');
		$this->db->order_by($order, $orderby);
		$query = $this->db->get($table);
		return $query->row();
	}

	// select  kembalian jumlah data
	function select_all_num_row($table)
	{
		$this->db->select('*');
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	// select where kembalian jumlah data
	function select_all_where_num_row($table, $field, $key)
	{
		$this->db->select('*');
		$this->db->where($field, $key);
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	// select where array
	function select_all_where_array_num_row($table, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	// select where array + like
	function select_all_where_array_like_num_row($table, $where, $like = NULL, $like_match = NULL)
	{
		$this->db->select('*');
		$this->db->where($where);
		if ($like != NULL) {
			$this->db->like($like, $like_match);
		}
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	// select max
	function select_max($table, $field, $where, $key)
	{
		$this->db->select_max($field);
		$this->db->where($where, $key);
		$cek = $this->db->get($table)->row();
		if ($cek == NULL) {
			return "1";
		} else {
			$data	=	$cek->$field + 1;
			return $data;
		}
	}

	// select beberapa field semua
	function select_by_field($table, $field, $where)
	{
		$this->db->select($field);
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->result();
	}

	// select beberapa field baris
	function select_by_field_row($table, $field, $where)
	{
		$this->db->select($field);
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->row();
	}

	// Select paginasi
	function select_paging($table, $number, $offset, $order = null, $order_by = null, $like = null, $where = null)
	{
		if ($like !== null) {
			$noLike = 1;
			foreach ($like as $ind => $val) {
				if ($noLike > 1) {
					$this->db->or_like($ind, $val);
				} else {
					$this->db->like($ind, $val);
				}
				$noLike++;
			}
		}
		if ($order !== null) {
			$this->db->order_by($order, $order_by);
		}
		if ($where !== null) {
			$this->db->where($where);
		}
		return $this->db->get($table, $number, $offset)->result();
	}

	// Select paginasi where array
	function select_paging_where_array($table, $where, $number, $offset)
	{
		return $this->db->get($table, $number, $offset)->result();
	}

	// limit for paginasi
	public function select_paging_where($table, $where, $limit, $start, $order, $order_by)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by($order, $order_by);
		$this->db->where($where);
		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	// limit for paginasi
	public function select_paging_where_like($table, $where, $limit, $start, $order, $order_by, $like = NULL, $like_match = NULL)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by($order, $order_by);
		$this->db->where($where);
		if ($like != NULL) {
			$this->db->like($like, $like_match);
		}
		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	// select sum
	function select_sum($table, $field, $where)
	{
		$this->db->select_sum($field);
		$this->db->where($where);
		$query = $this->db->get($table);
		$data	=	$query->row();
		return $data->$field;
	}


	function select_custom($query, $array = false)
	{
		$q	=	$this->db->query($query);
		if ($array) {
			return $q->result_array();
		}
		return $q->result();
	}

	function select_custom_row($query)
	{
		$q	=	$this->db->query($query);
		return $q->row();
	}

	function select_custom_numrow($query)
	{
		$q	=	$this->db->query($query);
		return $q->num_rows();
	}

	function custom_query($query)
	{
		$q	=	$this->db->query($query);
		if ($q) {
			return true;
		} else {
			return false;
		}
	}

	function insert($table, $data)
	{
		$q	=	$this->db->insert($table, $data);
		if ($q) {
			return true;
		} else {
			return false;
		}
	}

	function insert_batch($table, $data)
	{
		$q	=	$this->db->insert_batch($table, $data);
		if ($q) {
			return true;
		} else {
			return false;
		}
	}

	function update($table, $data, $key, $id)
	{
		$this->db->where($key, $id);
		$q	=	$this->db->update($table, $data);
		if ($q) {
			return true;
		} else {
			return false;
		}
	}

	function update_where_array($table, $data, $where)
	{
		$this->db->where($where);
		$q	=	$this->db->update($table, $data);
		if ($q) {
			return true;
		} else {
			return false;
		}
	}

	// hapus id
	function hapus_id($table, $field, $id)
	{
		$this->db->where($field, $id);
		$del	=	$this->db->delete($table);
		if ($del) {
			return true;
		} else {
			return false;
		}
	}

	// cek nomor tiket
	function cek_tiket($where)
	{
		$this->db->select('id_vaksin');
		$this->db->where($where);
		$query = $this->db->get("vaksin");
		return $query->num_rows();
	}

	// import pasien vaksin
	function import($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	function import_batch($table, $data)
	{
		return $this->db->insert_batch($table, $data);
	}
}
