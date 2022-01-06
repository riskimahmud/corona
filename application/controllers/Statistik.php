<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Statistik extends CI_Controller
{
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

    public function covid()
    {
        $data    =    array();

        $data['page']      =    "/statistik/covid";
        $data['title']     =    "Statistik Pasien Covid-19";
        $data['label']     =    "Statistik Pasien Covid-19";
        // $data['data']      =    $this->crud_model->select_all_order("jadwal_vaksin", "tanggal", "DESC");

        $this->bread[]  =    array(
            "active"    =>    TRUE,
            "icon"      =>    "",
            "link"      =>    "",
            "label"     =>    "Statistik Pasien Covid-19",
            "divider"   =>    FALSE,
        );

        $data['bread']        =    $this->bread;

        if ($this->input->post('submit', true)) {
            // echo json_encode($this->input->post());
            $where    =    [
                "tgl_masuk >" => $this->input->post('dari_tanggal', true),
                "tgl_masuk <=" => $this->input->post('sampai_tanggal', true)
            ];
            $kasus    =    $this->crud_model->select_all_where_array("pasien", $where, ["tgl_masuk" => "ASC"]);
            $aktif    =    $this->crud_model->select_custom("SELECT * FROM `pasien` WHERE tgl_masuk > '{$this->input->post('dari_tanggal', true)}' and tgl_masuk <= '{$this->input->post('sampai_tanggal', true)}' and (tgl_keluar IS null or tgl_keluar > '{$this->input->post('sampai_tanggal', true)}') order by tgl_masuk ASC");
            $sembuh    =    $this->crud_model->select_all_where_array("pasien", array_merge($where, [
                "tgl_keluar <=" => $this->input->post('sampai_tanggal', true),
                "status" => "sembuh"
            ]));
            $meninggal    =    $this->crud_model->select_all_where_array("pasien", array_merge($where, [
                "tgl_keluar <=" => $this->input->post('sampai_tanggal', true),
                "status" => "meninggal"
            ]));
            // $puskesmas    =    $this->crud_model->select_custom("SELECT puskesmas as nm_puskes, (SELECT COUNT(id_pasien) FROM pasien WHERE status = 'aktif' AND puskesmas = nm_puskes AND tgl_masuk > '{$this->input->post('dari_tanggal', true)}' and tgl_masuk <= '{$this->input->post('sampai_tanggal', true)}' and (tgl_keluar IS null or tgl_keluar > '{$this->input->post('sampai_tanggal', true)}')) as aktif, (SELECT COUNT(id_pasien) FROM pasien WHERE status = 'sembuh' AND puskesmas = nm_puskes AND tgl_masuk > '{$this->input->post('dari_tanggal', true)}' and tgl_masuk <= '{$this->input->post('sampai_tanggal', true)}' and (tgl_keluar IS null or tgl_keluar > '{$this->input->post('sampai_tanggal', true)}')) as sembuh, (SELECT COUNT(id_pasien) FROM pasien WHERE status = 'meninggal' AND puskesmas = nm_puskes AND tgl_masuk > '{$this->input->post('dari_tanggal', true)}' and tgl_masuk <= '{$this->input->post('sampai_tanggal', true)}' and (tgl_keluar IS null or tgl_keluar > '{$this->input->post('sampai_tanggal', true)}')) as meninggal FROM pasien WHERE tgl_masuk > '{$this->input->post('dari_tanggal', true)}' and tgl_masuk <= '{$this->input->post('sampai_tanggal', true)}' and (tgl_keluar IS null or tgl_keluar > '{$this->input->post('sampai_tanggal', true)}') GROUP BY nm_puskes order by tgl_masuk");
            $puskesmas = $this->crud_model->select_custom("SELECT puskesmas as nm_puskes, (SELECT COUNT(id_pasien) FROM pasien WHERE puskesmas = nm_puskes and status = 'aktif' and (tgl_masuk > '{$this->input->post('dari_tanggal', true)}' and tgl_masuk <= '{$this->input->post('sampai_tanggal', true)}' or (tgl_keluar IS null or tgl_keluar > '{$this->input->post('sampai_tanggal', true)}'))) as aktif, (SELECT COUNT(id_pasien) FROM pasien WHERE puskesmas = nm_puskes and status = 'sembuh' and tgl_keluar <= '{$this->input->post('sampai_tanggal', true)}') as sembuh, (SELECT COUNT(id_pasien) FROM pasien WHERE puskesmas = nm_puskes and status = 'meninggal' and tgl_keluar <= '{$this->input->post('sampai_tanggal', true)}') as meninggal from pasien group by nm_puskes", true);

            $nm_puskes = [];
            $series =   [
                ['name' => 'Aktif', 'data' => []],
                ['name' => 'Sembuh', 'data' => []],
                ['name' => 'Meninggal', 'data' => []],
            ];
            foreach ($puskesmas as $pus) {
                $nm_puskes[]    =   $pus['nm_puskes'];
                array_push($series[0]['data'], intval($pus['aktif']));
                array_push($series[1]['data'], intval($pus['sembuh']));
                array_push($series[2]['data'], intval($pus['meninggal']));
            }
            // echo $puskesmas[0]['aktif'];
            // echo var_dump(array_values($puskesmas));
            // echo json_encode($nm_puskes);
            // echo json_encode($column_stat);

            $data['kasus']  =   $kasus;
            $data['aktif']  =   $aktif;
            $data['sembuh'] =   $sembuh;
            $data['meninggal']  =   $meninggal;
            $data['cari']   =   true;
            $data['dari']   =   $this->input->post('dari_tanggal', true);
            $data['sampai'] =   $this->input->post('sampai_tanggal', true);
            $data['nm_puskes']  =   $nm_puskes;
            $data['column_stat']    =   $series;
            // echo "<br>Jumah Kasus : " . count($kasus);
            // echo "<br>Jumah Kasus Aktif : " . count($aktif);
            // echo "<br>Jumah Sembuh : " . count($sembuh);
            // echo "<br>Jumah Meninggal : " . count($meninggal);
            // echo json_encode($puskesmas);
        }

        $this->load->view("backend/main", $data);
    }
}
