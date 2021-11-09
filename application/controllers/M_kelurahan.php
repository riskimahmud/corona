<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_kelurahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Singapore');
        if (empty($this->session->userdata('user'))) {
            redirect('Login/logout');
        }
    }

    public $tabel    = 'kelurahan';
    public $label    = 'Kelurahan';
    public $base    = 'm_kelurahan';
    public $page    = '/kelurahan';
    public $key        = 'id_kelurahan';
    public $ket        = array();
    public $bread    = array();

    public function index()
    {
        $a    =    array();

        $a['page']        =    $this->page;
        $a['title']        =    $this->label;
        // $a['title']		=	"";
        $a['base']        =    $this->base;
        $a['ket']        =    $this->ket;
        $a['data']        =    $this->crud_model->select_all_order($this->tabel, $this->key, "ASC");

        $this->bread[]    =    array(
            "active"    =>    FALSE,
            "icon"        =>    "icon-home home-icon",
            "link"        =>    site_url(),
            "label"        =>    "Dashboard",
            "divider"    =>    TRUE,
        );

        $this->bread[]    =    array(
            "active"    =>    TRUE,
            "icon"        =>    "",
            "link"        =>    "",
            "label"        =>    $this->label,
            "divider"    =>    FALSE,
        );

        $a['bread']        =    $this->bread;
        $a['tabel']        =    $this->tabel;
        $a['key']        =    $this->key;
        $a['label']        =    $this->label;
        $a['tombol_head']    =    TRUE;
        $this->load->view("backend/main", $a);
    }

    // tambah aksi
    public function tambah_aksi()
    {
        $data            =    array(
            $this->key        =>    $this->crud_model->cek_id($this->tabel, $this->key),
            "nama_kelurahan"            =>    $this->input->post("nama_kelurahan"),
            "kecamatan"            =>    $this->input->post("kecamatan"),
        );

        $tambah        =    $this->crud_model->insert($this->tabel, $data);
        if ($tambah) {
            $notifikasi        =    array(
                "status"    =>    1, "pesan"    =>    "kelurahan Berhasil Ditambah"
            );
        } else {
            $notifikasi        =    array(
                "status"    =>    0, "pesan"    =>    "kelurahan Gagal Ditambah"
            );
        }
        $this->session->set_flashdata("notifikasi", $notifikasi);
        redirect($this->base);
    }

    // perbarui aksi
    public function perbarui_aksi()
    {
        $data            =    array(
            "nama_kelurahan"            =>    $this->input->post("nama_kelurahan"),
            "kecamatan"            =>    $this->input->post("kecamatan")
        );

        $perbarui    =    $this->crud_model->update($this->tabel, $data, $this->key, $this->input->post("id"));
        if ($perbarui) {
            $notifikasi        =    array(
                "status"    =>    1, "pesan"    =>    "kelurahan Berhasil Diperbarui"
            );
        } else {
            $notifikasi        =    array(
                "status"    =>    0, "pesan"    =>    "kelurahan Gagal Diperbarui"
            );
        }
        $this->session->set_flashdata("notifikasi", $notifikasi);
        redirect($this->base);
    }
}
