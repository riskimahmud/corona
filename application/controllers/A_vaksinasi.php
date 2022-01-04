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
            $tmp_data = $this->api->getVaksinasi($id, $nama);
            foreach ($tmp_data as $i => $v) {
                $tmp_data[$i]['tanggal']   =   tgl_indonesia($v['tanggal']);
            }
            $data   = $tmp_data;
        } elseif ($method == "statistik") {
			$data	=	[];
			$data['dosis1']	=	$this->crud_model->select_custom_row("SELECT count(id_vaksin) as jumlah FROM vaksin WHERE dosis = 'Dosis 1' GROUP BY dosis");
			$data['dosis2']	=	$this->crud_model->select_custom_row("SELECT count(id_vaksin) as jumlah FROM vaksin WHERE dosis = 'Dosis 2' GROUP BY dosis");
			$data['dosis3']	=	$this->crud_model->select_custom_row("SELECT count(id_vaksin) as jumlah FROM vaksin WHERE dosis = 'Dosis 3' GROUP BY dosis");
			$data['jenis_vaksin']	=	$this->crud_model->select_custom("SELECT jenis_vaksin, count(id_vaksin) as jumlah FROM vaksin GROUP BY jenis_vaksin");
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
