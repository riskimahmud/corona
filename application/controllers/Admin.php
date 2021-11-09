<?php
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function index()
	{
		$date = "2021-10-10";
		echo "Tanggal : " . tgl_indonesia($date);
		$where	=	[
			"tgl_masuk >" => "2020-01-01",
			"tgl_masuk <=" => $date
		];
		$kasus	=	$this->crud_model->select_all_where_array("pasien", $where);
		$aktif	=	$this->crud_model->select_custom("SELECT * FROM `pasien` WHERE tgl_masuk > '2020-01-01' and tgl_masuk <= '$date' and (tgl_keluar IS null or tgl_keluar > '$date')");
		$sembuh	=	$this->crud_model->select_all_where_array("pasien", array_merge($where, [
			"tgl_keluar <=" => $date,
			"status" => "sembuh"
		]));
		$meninggal	=	$this->crud_model->select_all_where_array("pasien", array_merge($where, [
			"tgl_keluar <=" => $date,
			"status" => "meninggal"
		]));


		echo "<br>Jumah Kasus : " . count($kasus);
		echo "<br>Jumah Kasus Aktif : " . count($aktif);
		echo "<br>Jumah Sembuh : " . count($sembuh);
		echo "<br>Jumah Meninggal : " . count($meninggal);
		echo "<pre>";
		print_r($kasus);
		echo "</pre>";
	}

	public function home()
	{
		if (empty($this->session->userdata('user'))) {
			redirect('Login/logout');
		} else {
			$data['title']		=	"Dashboard";
			$data['subtitle']	=	"Halaman Awal Aplikasi";
			$data['direktori']	=	"";
			$data['page']		=	"/dashboard";

			$bread	=	array();
			$bread[]	=	array(
				"active"	=>	TRUE,
				"icon"		=>	"icon-home home-icon",
				"link"		=>	"#",
				"label"		=>	"Dashboard",
				"divider"	=>	FALSE,
			);
			$data['bread']		=	$bread;
			$this->load->view('backend/main', $data);
			// echo $capen;
		}
	}

	public function profil()
	{
		if (empty($this->session->userdata('user'))) {
			redirect('Login/logout');
		} else {
			$data['title']		=	"Profil";
			$data['judul']		=	"Profil";
			$data['direktori']	=	"";
			$data['page']		=	"/profil";
			$data['base']		=	"admin";
			$data['bread']		=	array();
			$data['data']		=	$this->crud_model->select_one("user", "id", $this->session->userdata("user")["id"]);
			$this->load->view('backend/main', $data);
		}
	}

	public function simpan_profil()
	{
		$id					=	$this->input->post("id_user");
		$nama				=	$this->input->post("nama");
		$username			=	$this->input->post("username");
		$password			=	$this->input->post("password");

		$data	=	array(
			"nama"			=>	$nama,
			"username"		=>	$username
		);

		if ($password != "") {
			$data['password']	=	md5($password);
		}

		$simpan	=	$this->crud_model->update("user", $data, "id", $id);
		if ($simpan) {
			$new_data	=	$this->crud_model->select_one_row_array("user", "id", $id);
			$this->session->set_userdata("user", $new_data);
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Profil Berhasil Diperbarui"
			);
		} else {
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Profil Gagal Diperbarui"
			);
		}

		$this->session->set_flashdata("notifikasi", $notifikasi);
		redirect("admin/profil");
	}

	public function reset_password()
	{
		if (empty($this->session->userdata('user'))) {
			redirect('Login/logout');
		} else {
			$data['title']		=	"Reset Password";
			$data['direktori']	=	"";
			$data['page']		=	"/reset_password";
			$data['base']		=	"admin";
			$data['bread']		=	array();
			$data['data']		=	$this->crud_model->select_one("user", "id", $this->session->userdata("user")["id"]);
			$this->load->view('backend/main', $data);
		}
	}

	public function ganti_sandi_aksi()
	{
		$id				=	$this->input->post("id_user");
		$tmp_pass		=	$this->input->post("tmp_pass");
		$pass_lama		=	md5($this->input->post("pass_lama"));
		$pass_baru		=	$this->input->post("pass_baru");
		$re_pass_baru	=	$this->input->post("re_pass_baru");

		if ($pass_lama != $tmp_pass) {
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Password Lama tidak sesuai"
			);
		} else {
			if ($pass_baru != $re_pass_baru) {
				$notifikasi		=	array(
					"status"	=>	0, "pesan"	=>	"Password Baru tidak sesuai"
				);
			} else {
				$data	=	array(
					"password"		=>	md5($pass_baru),
				);
				$simpan	=	$this->crud_model->update("user", $data, "id", $id);
				if ($simpan) {
					$notifikasi		=	array(
						"status"	=>	1, "pesan"	=>	"Password Berhasil Diperbarui"
					);
				} else {
					$notifikasi		=	array(
						"status"	=>	0, "pesan"	=>	"Password Gagal Diperbarui"
					);
				}
			}
		}
		$this->session->set_flashdata("notifikasi", $notifikasi);
		redirect("admin/reset_password");
	}

	public function testing()
	{
		echo date('d-m-Y', strtotime('+7 day', strtotime("2021-11-03")));
	}
}
