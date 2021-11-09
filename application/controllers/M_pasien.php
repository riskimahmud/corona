<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_pasien extends CI_Controller
{
    public $ket        = array();
    var $bread;

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Singapore');
        if (empty($this->session->userdata('user'))) {
            redirect('Login/logout');
        }
        $this->bread = [
            [
                "active"    =>    FALSE,
                "icon"      =>    "icon-home home-icon",
                "link"      =>    site_url(),
                "label"     =>    "Dashboard",
                "divider"   =>    TRUE,
            ]
        ];
        $url = $this->uri->segment(1);
        if ($url != "pasien") {
            $this->bread = [
                [
                    "active"    =>    FALSE,
                    "icon"      =>    "icon-home home-icon",
                    "link"      =>    site_url(),
                    "label"     =>    "Dashboard",
                    "divider"   =>    TRUE,
                ],
                [
                    "active"    =>    FALSE,
                    "icon"      =>    "",
                    "link"      =>    site_url("pasien"),
                    "label"     =>    "Daftar Pasien",
                    "divider"   =>    TRUE,
                ]
            ];
        }
    }


    public function index($id = null)
    {
        $a    =    array();

        $a['page']      =    "/pasien";
        $a['title']     =    "Daftar Pasien Covid-19";
        $a['label']     =    "Daftar Pasien Covid-19";
        $a['data']      =    $this->crud_model->select_all_order("pasien", "tgl_masuk", "DESC");
        $a['expire']    =    $this->crud_model->select_all_where_array_num_row("pasien", ["status" => "aktif", "tgl_expire <=" => date("Y-m-d")]);

        if ($id !== null) {
            if ($id == "aktif") {
                $a['title']     =    "Daftar Pasien Aktif Covid-19";
                $a['label']     =    "Daftar Pasien Aktif Covid-19";
                $a['data']      =    $this->crud_model->select_all_where_order("pasien", "status", "aktif", "tgl_masuk", "DESC");
            } elseif ($id == "checkup") {
                $a['title']     =    "Daftar Pasien Aktif Covid-19 Yang Masuk Waktu Checkup";
                $a['label']     =    "Daftar Pasien Aktif Covid-19 Yang Masuk Waktu Checkup";
                $a['data']      =    $this->crud_model->select_all_where_array_order("pasien", ["status" => "aktif", "tgl_expire <=" => date("Y-m-d")], "tgl_masuk", "DESC");
            }
        }

        $this->bread[]  =    array(
            "active"    =>    TRUE,
            "icon"      =>    "",
            "link"      =>    "",
            "label"     =>    "Daftar Pasien",
            "divider"   =>    FALSE,
        );

        $a['bread']        =    $this->bread;
        $this->load->view("backend/main", $a);
    }

    // detail
    public function detail()
    {
        $pasien =   $this->crud_model->select_one("pasien", "id_pasien", $this->input->post('id_pasien', true));
        $data['pasien'] =   $pasien;
        $data['tempat_rawat']   =   $this->crud_model->select_one("tempat_rawat", "id_tempat_rawat", $pasien->id_tempat_rawat);
        $this->load->view("backend/detail_pasien", $data);
    }

    // tambah
    public function tambah()
    {
        $this->load->library('form_validation');
        if ($this->form_validation->run("pasien") == FALSE) {
            $a    =    array();

            $a['page']        =    "/tambah_pasien";
            $a['title']        =    "Tambah Pasien Covid-19";
            $a['label']        =    "Tambah Pasien Covid-19";
            $a['kelurahan']     =   $this->crud_model->select_all("kelurahan");
            $a['puskesmas']     =   $this->crud_model->select_all("puskesmas");
            $a['tempat_rawat']     =   $this->crud_model->select_all("tempat_rawat");

            $this->bread[]    =    array(
                "active"    =>    TRUE,
                "icon"      =>    "",
                "link"      =>    "",
                "label"     =>    "Tambah Pasien",
                "divider"   =>    FALSE,
            );

            $a['bread']        =    $this->bread;
            $this->load->view("backend/main", $a);
        } else {
            $tempat_rawat   =   $this->crud_model->select_one("tempat_rawat", "id_tempat_rawat", $this->input->post('tempat_rawat', true));
            $data            =    array(
                "id_pasien"         =>  $this->crud_model->cek_id("pasien", "id_pasien"),
                "nik"               =>  $this->input->post("nik"),
                "nama"              =>  $this->input->post("nama"),
                "jenis_kelamin"     =>  $this->input->post("jenis_kelamin"),
                "umur"              =>  $this->input->post("umur"),
                "alamat"            =>  $this->input->post("alamat"),
                "kelurahan"         =>  $this->input->post("kelurahan"),
                "puskesmas"         =>  $this->input->post("puskesmas"),
                "id_tempat_rawat"   =>  $this->input->post("tempat_rawat"),
                "nilai_ct"          =>  $this->input->post("nilai_ct"),
                "cluster"           =>  $this->input->post("cluster"),
                "tgl_masuk"         =>  $this->input->post("tgl_positif"),
                "tgl_expire"        =>  date('Y-m-d', strtotime('+14 day', strtotime($this->input->post("tgl_positif")))),
                "status"            =>  'aktif',
            );

            $tambah        =    $this->crud_model->insert("pasien", $data);
            if ($tambah) {
                $notifikasi        =    array(
                    "status"    =>    1, "pesan"    =>    "Pasien Berhasil Ditambah"
                );
                if ($tempat_rawat->digunakan !== null) {
                    $this->crud_model->update("tempat_rawat", ["digunakan" => $tempat_rawat->digunakan + 1], "id_tempat_rawat", $this->input->post('tempat_rawat', true));
                }
            } else {
                $notifikasi        =    array(
                    "status"    =>    0, "pesan"    =>    "Pasien Gagal Ditambah"
                );
            }
            $this->session->set_flashdata("notifikasi", $notifikasi);
            redirect("pasien");
        }
    }

    // cek kuota
    public function cek_kuota()
    {
        $tempat_rawat   =   $this->crud_model->select_one("tempat_rawat", "id_tempat_rawat", $this->input->post('tempat_rawat', true));
        if ($tempat_rawat->kuota === null) {
            return true;
        } elseif ($tempat_rawat->kuota !== null && ($tempat_rawat->kuota > $tempat_rawat->digunakan)) {
            return true;
        } else {
            $this->form_validation->set_message('cek_kuota', $tempat_rawat->nama_tempat_rawat . ' Sudah Melebihi Kuota');
            return FALSE;
        }
    }

    // update data pasien
    public function update()
    {
        $old         =  $this->crud_model->select_one("pasien", "id_pasien", $this->input->post('id_pasien', true));
        $tempat_rawat =  $this->crud_model->select_one("tempat_rawat", "id_tempat_rawat", $old->id_tempat_rawat);
        $ubah        =    $this->crud_model->update("pasien", ["status" => $this->input->post('status', true), "tgl_keluar" => $this->input->post('tgl_update', true)], "id_pasien", $this->input->post('id_pasien', true));
        if ($ubah) {
            $notifikasi        =    array(
                "status"    =>    1, "pesan"    =>    "Status Pasien Berhasil Diubah"
            );
            if ($tempat_rawat->digunakan !== null) {
                $this->crud_model->update("tempat_rawat", ["digunakan" => $tempat_rawat->digunakan - 1], "id_tempat_rawat", $old->id_tempat_rawat);
            }
        } else {
            $notifikasi        =    array(
                "status"    =>    0, "pesan"    =>    "Status Pasien Gagal Diubah"
            );
        }
        $this->session->set_flashdata("notifikasi", $notifikasi);
        redirect("pasien");
    }

    // ubah
    public function ubah($id = null)
    {
        $pasien =   $this->crud_model->select_one("pasien", "id_pasien", $id);
        $tempat_rawat_old   =   $this->crud_model->select_one("tempat_rawat", "id_tempat_rawat", $pasien->id_tempat_rawat);
        if (empty($pasien)) {
            redirect("admin/home");
        }

        $this->load->library('form_validation');
        if ($this->form_validation->run("pasien") == FALSE) {
            $a    =    array();

            $a['page']          =    "/ubah_pasien";
            $a['title']         =    "Ubah Pasien Covid-19";
            $a['label']         =    "Ubah Pasien Covid-19";
            $a['kelurahan']     =   $this->crud_model->select_all("kelurahan");
            $a['puskesmas']     =   $this->crud_model->select_all("puskesmas");
            $a['tempat_rawat']  =   $this->crud_model->select_all("tempat_rawat");
            $a['data']          =   $pasien;

            $this->bread[]    =    array(
                "active"    =>    TRUE,
                "icon"      =>    "",
                "link"      =>    "",
                "label"     =>    "Ubah Pasien",
                "divider"   =>    FALSE,
            );

            $a['bread']        =    $this->bread;
            $this->load->view("backend/main", $a);
        } else {
            $tempat_rawat   =   $this->crud_model->select_one("tempat_rawat", "id_tempat_rawat", $this->input->post('tempat_rawat', true));
            $data            =    array(
                "nik"               =>  $this->input->post("nik"),
                "nama"              =>  $this->input->post("nama"),
                "jenis_kelamin"     =>  $this->input->post("jenis_kelamin"),
                "umur"              =>  $this->input->post("umur"),
                "alamat"            =>  $this->input->post("alamat"),
                "kelurahan"         =>  $this->input->post("kelurahan"),
                "puskesmas"         =>  $this->input->post("puskesmas"),
                "id_tempat_rawat"   =>  $this->input->post("tempat_rawat"),
                "nilai_ct"          =>  $this->input->post("nilai_ct"),
                "cluster"           =>  $this->input->post("cluster"),
                "tgl_masuk"         =>  $this->input->post("tgl_positif"),
                "tgl_expire"        =>  date('Y-m-d', strtotime('+14 day', strtotime($this->input->post("tgl_positif")))),
            );

            $ubah        =    $this->crud_model->update("pasien", $data, "id_pasien", $id);
            if ($ubah) {
                $notifikasi        =    array(
                    "status"    =>    1, "pesan"    =>    "Pasien Berhasil Diubah"
                );
                if ($pasien->status == "aktif") {
                    if ($tempat_rawat_old->digunakan !== null && $tempat_rawat_old->id_tempat_rawat !== $this->input->post('tempat_rawat', true)) {
                        $this->crud_model->update("tempat_rawat", ["digunakan" => $tempat_rawat_old->digunakan - 1], "id_tempat_rawat", $tempat_rawat_old->id_tempat_rawat);
                    }
                    if ($tempat_rawat->digunakan !== null && $tempat_rawat_old->id_tempat_rawat !== $this->input->post('tempat_rawat', true)) {
                        $this->crud_model->update("tempat_rawat", ["digunakan" => $tempat_rawat->digunakan + 1], "id_tempat_rawat", $this->input->post('tempat_rawat', true));
                    }
                }
            } else {
                $notifikasi        =    array(
                    "status"    =>    0, "pesan"    =>    "Pasien Gagal Diubah"
                );
            }
            $this->session->set_flashdata("notifikasi", $notifikasi);
            redirect("pasien");
        }
    }
}
