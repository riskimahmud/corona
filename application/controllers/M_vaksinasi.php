<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_vaksinasi extends CI_Controller
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
    }

    // jadwal vaksinasi
    public function jadwal()
    {
        $a    =    array();

        $a['page']      =    "/vaksin/jadwal";
        $a['title']     =    "Jadwal Vaksinasi";
        $a['label']     =    "Jadwal Vaksinasi";
        $a['data']      =    $this->crud_model->select_all_order("jadwal_vaksin", "tanggal", "DESC");

        $this->bread[]  =    array(
            "active"    =>    TRUE,
            "icon"      =>    "",
            "link"      =>    "",
            "label"     =>    "Jadwal Vakin",
            "divider"   =>    FALSE,
        );

        $a['bread']        =    $this->bread;
        $this->load->view("backend/main", $a);
    }

    // tambah
    public function tambah()
    {
        $this->load->library('form_validation');
        if ($this->form_validation->run("jadwal") == FALSE) {
            $a    =    array();

            $a['page']        =    "/vaksin/tambah";
            $a['title']        =    "Tambah Jadwal Vaksinasi";
            $a['label']        =    "Tambah Jadwal Vaksinasi";

            $this->bread[]    =    [
                "active"    =>    FALSE,
                "icon"      =>    "",
                "link"      =>    "jadwal-vaksinasi",
                "label"     =>    "Jadwal Vaksinasi",
                "divider"   =>    TRUE,
            ];
            $this->bread[]    =    [
                "active"    =>    TRUE,
                "icon"      =>    "",
                "link"      =>    "",
                "label"     =>    "Tambah Jadwal Vaksinasi",
                "divider"   =>    FALSE,
            ];

            $a['bread']        =    $this->bread;
            $this->load->library('ckeditor');
            $this->load->library('ckfinder');



            $this->ckeditor->basePath = base_url() . 'assets/ckeditor/';
            $this->ckeditor->config['toolbar'] = array(
                array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
            );
            $this->ckeditor->config['language'] = 'in';

            //Add Ckfinder to Ckeditor
            $this->ckfinder->SetupCKEditor($this->ckeditor, 'assets/kcfinder/browse.php');
            $this->load->view("backend/main", $a);
        } else {
            $data   =   [
                "id_jadwal_vaksin"   =>  $this->crud_model->cek_id("jadwal_vaksin", "id_jadwal_vaksin"),
                "tanggal"   =>  $this->input->post('tanggal', true),
                "lama"   =>  $this->input->post('lama', true),
                "dari_jam"   =>  $this->input->post('dari_jam', true),
                "tempat"   =>  $this->input->post('tempat', true),
                "penyelenggara"   =>  $this->input->post('penyelenggara', true),
                "keterangan"   =>  $this->input->post('keterangan', true),
            ];

            if ($this->input->post('sampai_jam', true) != "00:00") {
                $data["sampai_jam"] =   $this->input->post('sampai_jam', true);
            }

            $tambah        =    $this->crud_model->insert("jadwal_vaksin", $data);
            if ($tambah) {
                $notifikasi        =    array(
                    "status"    =>    1, "pesan"    =>    "Jadwal Vaksinasi Berhasil Ditambah"
                );
            } else {
                $notifikasi        =    array(
                    "status"    =>    0, "pesan"    =>    "Jadwal Vaksinasi Gagal Ditambah"
                );
            }
            $this->session->set_flashdata("notifikasi", $notifikasi);
            redirect("jadwal-vaksinasi");
        }
    }

    // ubah
    public function ubah($id = null)
    {
        $jadwal_vaksin =   $this->crud_model->select_one("jadwal_vaksin", "id_jadwal_vaksin", $id);
        if (empty($jadwal_vaksin)) {
            redirect("admin/home");
        }

        $this->load->library('form_validation');
        if ($this->form_validation->run("jadwal") == FALSE) {
            $a    =    array();

            $a['page']          =    "/vaksin/ubah";
            $a['title']         =    "Ubah Jadwal Vaksinasi";
            $a['label']         =    "Ubah Jadwal Vaksinasi";
            $a['data']          =   $jadwal_vaksin;

            $this->bread[]    =    [
                "active"    =>    FALSE,
                "icon"      =>    "",
                "link"      =>    "jadwal-vaksinasi",
                "label"     =>    "Jadwal Vaksinasi",
                "divider"   =>    TRUE,
            ];
            $this->bread[]    =    [
                "active"    =>    TRUE,
                "icon"      =>    "",
                "link"      =>    "",
                "label"     =>    "Ubah Jadwal Vaksinasi",
                "divider"   =>    FALSE,
            ];

            $a['bread']        =    $this->bread;

            $this->load->library('ckeditor');
            $this->load->library('ckfinder');

            $this->ckeditor->basePath = base_url() . 'assets/ckeditor/';
            $this->ckeditor->config['toolbar'] = array(
                array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
            );
            $this->ckeditor->config['language'] = 'in';

            //Add Ckfinder to Ckeditor
            $this->ckfinder->SetupCKEditor($this->ckeditor, 'assets/kcfinder/browse.php');
            $this->load->view("backend/main", $a);
        } else {
            $data   =   [
                "tanggal"   =>  $this->input->post('tanggal', true),
                "lama"   =>  $this->input->post('lama', true),
                "dari_jam"   =>  $this->input->post('dari_jam', true),
                "tempat"   =>  $this->input->post('tempat', true),
                "penyelenggara"   =>  $this->input->post('penyelenggara', true),
                "keterangan"   =>  $this->input->post('keterangan', true),
            ];

            if ($this->input->post('sampai_jam', true) != "00:00") {
                $data["sampai_jam"] =   $this->input->post('sampai_jam', true);
            } else {
                $data["sampai_jam"] =   NULL;
            }

            $ubah        =    $this->crud_model->update("jadwal_vaksin", $data, "id_jadwal_vaksin", $id);
            if ($ubah) {
                $notifikasi        =    array(
                    "status"    =>    1, "pesan"    =>    "Jadwal Vaksinasi Berhasil Diubah"
                );
            } else {
                $notifikasi        =    array(
                    "status"    =>    0, "pesan"    =>    "Jadwal Vaksinasi Gagal Diubah"
                );
            }
            $this->session->set_flashdata("notifikasi", $notifikasi);
            redirect("jadwal-vaksinasi");
        }
    }

    // hapus
    public function hapus($id = null)
    {
        $jadwal_vaksin =   $this->crud_model->select_one("jadwal_vaksin", "id_jadwal_vaksin", $id);
        if (empty($jadwal_vaksin)) {
            redirect("admin/home");
        }
        $hapus        =    $this->crud_model->hapus_id("jadwal_vaksin", "id_jadwal_vaksin", $id);
        if ($hapus) {
            $notifikasi        =    array(
                "status"    =>    1, "pesan"    =>    "Jadwal Vaksinasi Berhasil Dihapus"
            );
        } else {
            $notifikasi        =    array(
                "status"    =>    0, "pesan"    =>    "Jadwal Vaksinasi Gagal Dihapus"
            );
        }
        $this->session->set_flashdata("notifikasi", $notifikasi);
        redirect("jadwal-vaksinasi");
    }

    // cek dari jam
    public function dari_check()
    {
        if ($this->input->post('dari_jam', true) == "00:00") {
            $this->form_validation->set_message('dari_check', 'Dari Jam Tidak Valid');
            return FALSE;
        } else {
            return true;
        }
    }

    // reset pencarian pasien
    public function reset_pencarian_pasien()
    {
        $this->session->unset_userdata("keyword");
        redirect('pasien-vaksinasi');
    }

    // Pasien vaksinasi
    public function pasien($page = null)
    {
        $a    =    array();

        $this->load->library('pagination');

        $a['page']      =    "/vaksin/pasien";
        $a['title']     =    "Pasien Vaksinasi";
        $a['label']     =    "Pasien Vaksinasi";
        // $a['data']      =    $this->crud_model->select_all_where_limit("vaksin", "id_vaksin >", "0", "tanggal", "ASC", "1000");

        $this->bread[]  =    array(
            "active"    =>    TRUE,
            "icon"      =>    "",
            "link"      =>    "",
            "label"     =>    "Jadwal Vakin",
            "divider"   =>    FALSE,
        );

        $a['bread']        =    $this->bread;

        if ($this->input->post('submit', true)) {
            $a['keyword']    =   $this->input->post('keyword', true);
            $this->session->set_userdata("keyword", $a['keyword']);
        } else {
            $a['keyword']    =   $this->session->userdata("keyword");
        }

        $config['base_url'] = site_url('pasien-vaksinasi');
        // $config['total_rows'] = $this->crud_model->select_all_num_row('vaksin');
        $this->db->like('nama', $a['keyword']);
        $this->db->or_like('tiket', $a['keyword']);
        $this->db->from('vaksin');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 20;

        $a['data']  =   $this->crud_model->select_paging("vaksin", $config['per_page'], ($page !== null) ? (($page - 1) * $config['per_page']) : 0, 'tanggal', 'ASC', $a['keyword']);
        $a['no']    =   ($page) ? (($page - 1) * $config['per_page'] + 1) : 1;
        $a['total_rows']    =   $config['total_rows'];

        $this->pagination->initialize($config);

        $this->load->view("backend/main", $a);
    }

    // detail pasien vaksinasi
    public function detail_pasien()
    {
        $vaksin =   $this->crud_model->select_one("vaksin", "id_vaksin", $this->input->post('id_vaksin', true));
        $data['vaksin'] =   $vaksin;
        $this->load->view("backend/vaksin/detail_vaksin", $data);
    }

    // import pasien
    public function import()
    {
        $this->load->library('form_validation');
        if ($this->form_validation->run("import_pasien") == FALSE) {
            $a    =    array();

            $a['page']        =    "/vaksin/import";
            $a['title']        =    "Import Pasien Vaksinasi";
            $a['label']        =    "Import Pasien Vaksinasi";

            $this->bread[]    =    [
                "active"    =>    FALSE,
                "icon"      =>    "",
                "link"      =>    "pasien-vaksinasi",
                "label"     =>    "Pasien Vaksinasi",
                "divider"   =>    TRUE,
            ];
            $this->bread[]    =    [
                "active"    =>    TRUE,
                "icon"      =>    "",
                "link"      =>    "",
                "label"     =>    "Import Pasien Vaksinasi",
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
                    $cek    =   $this->crud_model->cek_tiket(["tiket" => $row[11]]);
                    if ($cek > 0) continue;
                    $data[] = [
                        // 'tanggal' => date_format(date_create_from_format('d/m/Y', $row[0]), 'Y-m-d'),
                        'tanggal' => $row[0],
                        'provinsi' => $row[1],
                        'kabupaten' => $row[2],
                        'faskes' => $row[3],
                        'nik' => str_replace("'", "", $row[4]),
                        'nama' => $row[5],
                        'jenis_kelamin' => $row[6],
                        'kelompok_usia' => $row[7],
                        'kategori' => $row[8],
                        'sub_kategori' => $row[9],
                        'dosis' => $row[10],
                        'tiket' => $row[11],
                        'jenis_vaksin' => $row[12],
                    ];

                    // Simpan data ke database.
                    // $this->crud_model->import("vaksin", $data);
                }
                if (!empty($data)) {
                    $this->crud_model->import_batch("vaksin", $data);
                }
                fclose($handle);

                $notifikasi        =    array(
                    "status"    =>    1, "pesan"    =>    "Data berhasil diimport"
                );
                $this->session->set_flashdata("notifikasi", $notifikasi);
                redirect("pasien-vaksinasi");
            } else {
                $notifikasi        =    array(
                    "status"    =>    0, "pesan"    =>    "Format File tidak didukung"
                );
                $this->session->set_flashdata("notifikasi", $notifikasi);
                redirect("import-pasien-vaksinasi");
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
            if (filesize($_FILES['file']['tmp_name']) > 2108451) {
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
