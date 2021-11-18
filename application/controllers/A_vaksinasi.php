<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class A_vaksinasi extends REST_Controller
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
        $nama = $this->get('nama');

        if ($method == "pasien") {
            $data   =   $this->api->getVaksinasi($id, $nama);
        } elseif ($method == "jadwal") {
            $data   =   $this->api->getJadwalVaksinasi();
        } elseif ($method == "dosis") {
            $data['dosis']    =    $this->crud_model->select_custom("SELECT dosis, count(id_vaksin) as jumlah FROM vaksin GROUP BY dosis");
        } elseif ($method == "jenis_vaksin") {
            $data['jenis_vaksin']    =    $this->crud_model->select_custom("SELECT jenis_vaksin, count(id_vaksin) as jumlah FROM vaksin GROUP BY jenis_vaksin");
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
