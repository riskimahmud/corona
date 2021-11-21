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

    public function menu($menu = null)
    {
        if ($menu == "batal") {
            $this->session->unset_userdata("keyword_covid");
        } else {
            $this->session->set_userdata("menu", $menu);
        }
        redirect("pasien");
    }


    public function index($page = null)
    {
        $a    =    array();

        $this->load->library('pagination');

        $a['page']      =    "/pasien";
        $a['title']     =    "Daftar Pasien Covid-19";
        $a['label']     =    "Daftar Pasien Covid-19";
        $a['data']      =    $this->crud_model->select_all_order("pasien", "tgl_masuk", "DESC");
        $a['expire']    =    $this->crud_model->select_all_where_array_num_row("pasien", ["status" => "aktif", "tgl_expire <=" => date("Y-m-d")]);

        $menu = $this->session->userdata("menu");

        if ($menu !== null && $menu != "semua") {
            if ($menu == "aktif") {
                $a['title']     =    "Daftar Pasien Aktif Covid-19";
                $a['label']     =    "Daftar Pasien Aktif Covid-19";
                $where          =    ["status" => "aktif"];
            } elseif ($menu == "checkup") {
                $a['title']     =    "Daftar Pasien Aktif Covid-19 Yang Masuk Waktu Checkup";
                $a['label']     =    "Daftar Pasien Aktif Covid-19 Yang Masuk Waktu Checkup";
                $where          =    ["status" => "aktif", "tgl_expire <=" => date("Y-m-d")];
            } else {
                $a['title']     =    "Daftar Pasien " . ucfirst($menu) . " Covid-19";
                $a['label']     =    "Daftar Pasien " . ucfirst($menu) . " Covid-19";
                $where          =    ["status" => $menu];
            }
            if ($this->input->post('submit', true)) {
                $a['keyword_covid']    =   $this->input->post('keyword_covid', true);
                $this->session->set_userdata("keyword_covid", $a['keyword_covid']);
            } else {
                $a['keyword_covid']    =   $this->session->userdata("keyword_covid");
            }

            $config['base_url'] = site_url('pasien');
            // $config['total_rows'] = $this->crud_model->select_all_num_row('vaksin');
            $this->db->like('nama', $a['keyword_covid']);
            $this->db->where($where);
            $this->db->from('pasien');
            $config['total_rows'] = $this->db->count_all_results();
            $config['per_page'] = 20;

            $a['data']  =   $this->crud_model->select_paging("pasien", $config['per_page'], ($page !== null) ? (($page - 1) * $config['per_page']) : 0, 'tgl_masuk', 'DESC', [
                "nama" => $a['keyword_covid']
            ], $where);
            $a['no']    =   ($page) ? (($page - 1) * $config['per_page'] + 1) : 1;
            $a['total_rows']    =   $config['total_rows'];

            $this->pagination->initialize($config);
        } else {
            if ($this->input->post('submit', true)) {
                $a['keyword_covid']    =   $this->input->post('keyword_covid', true);
                $this->session->set_userdata("keyword_covid", $a['keyword_covid']);
            } else {
                $a['keyword_covid']    =   $this->session->userdata("keyword_covid");
            }

            $config['base_url'] = site_url('pasien');
            // $config['total_rows'] = $this->crud_model->select_all_num_row('vaksin');
            $this->db->like('nama', $a['keyword_covid']);
            $this->db->from('pasien');
            $config['total_rows'] = $this->db->count_all_results();
            $config['per_page'] = 20;

            $a['data']  =   $this->crud_model->select_paging("pasien", $config['per_page'], ($page !== null) ? (($page - 1) * $config['per_page']) : 0, 'tgl_masuk', 'DESC', [
                "nama" => $a['keyword_covid']
            ], null);
            $a['no']    =   ($page) ? (($page - 1) * $config['per_page'] + 1) : 1;
            $a['total_rows']    =   $config['total_rows'];

            $this->pagination->initialize($config);
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

    // import pasien
    public function import()
    {
        $this->load->library('form_validation');
        if ($this->form_validation->run("import_pasien") == FALSE) {
            $a    =    array();

            $a['page']        =    "/import_pasien_covid";
            $a['title']        =    "Import Pasien Covid19";
            $a['label']        =    "Import Pasien Covid19";

            $this->bread[]    =    [
                "active"    =>    TRUE,
                "icon"      =>    "",
                "link"      =>    "",
                "label"     =>    "Import Pasien Covid 19",
                "divider"   =>    FALSE,
            ];

            $a['bread']        =    $this->bread;
            $this->load->view("backend/main", $a);
        } else {
            $file = $_FILES['file']['tmp_name'];

            // Medapatkan ekstensi file csv yang akan diimport.
            $ekstensi  = explode('.', $_FILES['file']['name']);

            // Validasi apakah file yang diupload benar-benar file csv.
            if (strtolower(end($ekstensi)) === 'csv' && $_FILES["file"]["size"] > 0) {
                $data = [];
                $handle = fopen($file, "r");
                $i = 0;
                while (($row = fgetcsv($handle, 2048))) {
                    $i++;
                    if ($i == 1) continue;
                    // Data yang akan disimpan ke dalam databse

                    // cek tiket yang sudah ada
                    $data[] = [
                        // 'tanggal' => date_format(date_create_from_format('d/m/Y', $row[0]), 'Y-m-d'),
                        'nama' => $row[0],
                        'jenis_kelamin' => $row[1],
                        'umur' => $row[2],
                        'puskesmas' => $row[3],
                        'kelurahan' => $row[4],
                        'nilai_ct' => $row[5],
                        'cluster' => $row[6],
                        'status' => $row[7],
                        'tgl_masuk' => $row[8],
                        'tgl_expire' => ($row[7] == 'aktif') ? date('Y-m-d', strtotime('+14 day', strtotime($row[8]))) : null,
                        'tgl_keluar' => $row[9],
                        'id_tempat_rawat' => $row[10],
                    ];

                    // Simpan data ke database.
                    // $this->crud_model->import("vaksin", $data);
                }
                if (!empty($data)) {
                    $this->crud_model->import_batch("pasien", $data);
                }
                fclose($handle);

                $notifikasi        =    array(
                    "status"    =>    1, "pesan"    =>    "Data berhasil diimport"
                );
                $this->session->set_flashdata("notifikasi", $notifikasi);
                redirect("pasien");
            } else {
                $notifikasi        =    array(
                    "status"    =>    0, "pesan"    =>    "Format File tidak didukung"
                );
                $this->session->set_flashdata("notifikasi", $notifikasi);
                redirect("import-pasien");
            }
        }
    }

    // cek file import excel
    public function check_file()
    {
        $check = TRUE;
        if ((!isset($_FILES['file'])) || $_FILES['file']['size'] == 0) {
            $this->form_validation->set_message('check_file', 'File belum dipilih');
            $check = FALSE;
        } else if (isset($_FILES['file']) && $_FILES['file']['size'] != 0) {
            $allowedExts = array("csv");
            $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            // if (filesize($_FILES['file']['tmp_name']) > 2108451) {
            if (filesize($_FILES['file']['tmp_name']) > 5108451) {
                $this->form_validation->set_message('check_file', 'File maximal 2mb');
                // $this->form_validation->set_message('check_file', 'Ukuran : ' . filesize($_FILES['file']['tmp_name']));
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('check_file', "FIle tidak didukung");
                $check = FALSE;
            }
        }
        return $check;
    }
}
