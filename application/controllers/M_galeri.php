<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_galeri extends CI_Controller {
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		if(empty($this->session->userdata('user'))){
			redirect('Login/logout');
		}
	}
	
	public $tabel	='galeri';
	public $label	='Galeri';
	public $base	='m_galeri';
	public $page	='/galeri';
	public $key		='id_galeri';
	public $ket		= array();
	public $bread	= array();
	
	public function index()
	{
			$a	=	array();
			
			$a['page']		=	$this->page;
			$a['title']		=	$this->label;
			// $a['title']		=	"";
			$a['base']		=	$this->base;
			$a['ket']		=	$this->ket;
			$a['data']		=	$this->crud_model->select_all_order($this->tabel,$this->key,"ASC");
			
			$this->bread[]	=	array(
				"active"	=>	FALSE,
				"icon"		=>	"icon-home home-icon",
				"link"		=>	site_url(),
				"label"		=>	"Dashboard",
				"divider"	=>	TRUE,
			);
			
			$this->bread[]	=	array(
				"active"	=>	TRUE,
				"icon"		=>	"",
				"link"		=>	"",
				"label"		=>	$this->label,
				"divider"	=>	FALSE,
			);
			
			$a['bread']		=	$this->bread;
			$a['tabel']		=	$this->tabel;
			$a['key']		=	$this->key;
			$a['label']		=	$this->label;
			$a['tombol_head']	=	TRUE;
			
			$this->load->view("backend/main", $a);
	}
	
	// tambah aksi
	public function tambah_aksi(){
		$id				=	$this->crud_model->cek_id($this->tabel,$this->key);
		$judul			=	$this->input->post("judul");
		$data			=	array(
			"id_galeri"		=>	$id,
			"judul"			=>	$judul
		);
		
		$config['upload_path']     	= './uploads/galeri/';
		$config['allowed_types']   	= 'jpg|png';
		$config['max_size']       	= 4000;
		$config['max_filename'] 	= '255';
		$config['encrypt_name'] 	= TRUE;
		
		$this->load->library('upload', $config);
		if ( $this->upload->do_upload('gambar')){
			$data_file = $this->upload->data();
			//Compress Image
			$this->_create_thumbs($data_file['file_name']);
			$data['gambar']	=	$data_file['file_name'];
		}
		
		$tambah		=	$this->crud_model->insert($this->tabel,$data);
		if($tambah){
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Galeri Berhasil Ditambah"
			);
		}else{
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Galeri Gagal Ditambah"
			);
		}
		$this->session->set_flashdata("notifikasi",$notifikasi);
		redirect($this->base);
	}
	
	// perbarui aksi
	public function perbarui_aksi(){
		$id				=	$this->input->post("id");
		$judul			=	$this->input->post("judul");;
		$data			=	array(
			"judul"			=>	$judul
		);
		
		$detail			=	$this->crud_model->select_one($this->tabel,$this->key,$id);
		
		$config['upload_path']     	= './uploads/gambar/';
		$config['allowed_types']   	= 'jpg|png';
		$config['max_size']       	= 4000;
		$config['max_filename'] 	= '255';
		$config['encrypt_name'] 	= TRUE;
		
		$this->load->library('upload', $config);
		if ( $this->upload->do_upload('gambar')){
			unlink('./uploads/gambar/'.$detail->gambar);
			$data_file = $this->upload->data();
			//Compress Image
			$this->_create_thumbs($data_file['file_name']);
			$data['gambar']	=	$data_file['file_name'];
		}
		
		$perbarui	=	$this->crud_model->update($this->tabel,$data,$this->key,$id);
		if($perbarui){
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Galeri Berhasil Diperbarui"
			);
		}else{
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Galeri Gagal Diperbarui"
			);
		}
		$this->session->set_flashdata("notifikasi",$notifikasi);
		redirect($this->base);
	}
	
	function _create_thumbs($file_name){
        // Image resizing config
        $config = array(
            // Small Image
            array(
                'image_library' => 'GD2',
                'source_image'  => './uploads/galeri/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 450,
                'height'        => 300,
                'new_image'     => './uploads/galeri/thumb/'.$file_name
            ));
 
        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
    }
	
	// hapus
	public function hapus($id){
		$detail			=	$this->crud_model->select_one($this->tabel,$this->key,$id);
		
		$hapus	=	$this->crud_model->hapus_id($this->tabel,$this->key,$id);
		if($hapus){
			unlink('./uploads/galeri/'.$detail->gambar);
			unlink('./uploads/galeri/thumb/'.$detail->gambar);
			$notifikasi		=	array(
				"status"	=>	1, "pesan"	=>	"Galeri Berhasil Dihapus"
			);
		}else{
			$notifikasi		=	array(
				"status"	=>	0, "pesan"	=>	"Galeri Gagal Dihapus"
			);
		}
		$this->session->set_flashdata("notifikasi",$notifikasi);
		redirect($this->base);
	}
	
}