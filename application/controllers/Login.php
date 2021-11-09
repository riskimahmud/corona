<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function index()
	{
		if ($this->session->userdata('user')) {
			redirect('admin/home');
		} else {
			$data['title']		=	"Login";
			$data['page']		=	"/login";
			$this->load->view("login", $data);
		}
	}

	public function do_login()
	{
		$output = array('error' => false);

		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$data = $this->users_model->login($username, $password);

		if ($data) {
			// $update	= array(
			// "last_login"	=>	date("Y-m-d H:i:s")
			// );
			// $this->crud_model->update("users",$update,"id_user",$data['id_user']);
			$this->session->set_userdata('user', $data);
			redirect('admin/home');
		} else {
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"User Tidak Dikenali"
			);

			$this->session->set_flashdata("notifikasi", $notifikasi);
			redirect("login");
		}
	}

	public function logout()
	{
		$notifikasi		=	array(
			"status"	=>	1, "pesan"	=>	"Selamat Tinggal. Anda Berhasil Keluar"
		);

		$this->session->set_flashdata("notifikasi", $notifikasi);
		$this->session->unset_userdata('user');
		redirect("Login");
	}
}
