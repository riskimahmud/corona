<?php
	class E404 extends CI_Controller {
		function __construct(){
			parent::__construct();
		}
		
		public function index()
		{
			$data['title']	=	"Halaman Tidak Ditemukan";
			$this->load->view('e404',$data);
		}
	}
?>