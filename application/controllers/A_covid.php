<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class A_covid extends REST_Controller
{
    // constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model("api_model", "api");
    }

    public function index_get()
    {
        $method = $this->get('method');
        $id = $this->get('id');

        if ($method == "tempat_tidur") {
            $data   =   $this->api->getTempatTidur();
        } elseif ($method == "pasien") {
            $data = [];
            $date = date("Y-m-d");
            $where    =    [
                "id_pasien >" => 0
                // "tgl_masuk >" => "2020-01-01",
                // "tgl_masuk <=" => $date
            ];
            $data['tanggal']  =    tgl_indonesia($date);
            $data['kasus']    =    $this->crud_model->select_all_where_array_num_row("pasien", $where);
            // $data['aktif']    =    $this->crud_model->select_custom_numrow("SELECT id_pasien FROM `pasien` WHERE tgl_masuk > '2020-01-01' and tgl_masuk <= '$date' and (tgl_keluar IS null or tgl_keluar > '$date')");
            $data['aktif']    =    $this->crud_model->select_all_where_array_num_row("pasien", array_merge($where, [
                // "tgl_keluar <=" => $date,
                "status" => "aktif"
            ]));
            $data['sembuh']    =    $this->crud_model->select_all_where_array_num_row("pasien", array_merge($where, [
                // "tgl_keluar <=" => $date,
                "status" => "sembuh"
            ]));
            $data['meninggal']    =    $this->crud_model->select_all_where_array_num_row("pasien", array_merge($where, [
                // "tgl_keluar <=" => $date,
                "status" => "meninggal"
            ]));
        } else {
            $data   =   false;
        }

        if ($data) {
            $this->response([
                'status' => true,
                'data' => $data,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
