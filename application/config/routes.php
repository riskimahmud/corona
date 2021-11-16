<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'frontend';
$route['404_override'] = 'e404';
$route['translate_uri_dashes'] = TRUE;

$route['testing']    =   'Admin/testing';

// Pasien Covid
$route['pasien']    =   'M_pasien/index';
$route['pasien/(:any)']    =   'M_pasien/index/$1';
$route['detail-pasien']    =   'M_pasien/detail';
$route['tambah-pasien']    =   'M_pasien/tambah';
$route['ubah-pasien/(:num)']    =   'M_pasien/ubah/$1';
$route['update-data-pasien']    =   'M_pasien/update';

// Vaksinasi
$route['jadwal-vaksinasi']    =   'M_vaksinasi/jadwal';
$route['tambah-jadwal']    =   'M_vaksinasi/tambah';
$route['ubah-jadwal/(:num)']    =   'M_vaksinasi/ubah/$1';
$route['hapus-jadwal/(:num)']    =   'M_vaksinasi/hapus/$1';
$route['semua-pasien-vaksinasi']    =   'M_vaksinasi/reset_pencarian_pasien';
$route['pasien-vaksinasi']    =   'M_vaksinasi/pasien';
$route['pasien-vaksinasi/(:num)']    =   'M_vaksinasi/pasien/$1';
$route['import-pasien-vaksinasi']    =   'M_vaksinasi/import';
$route['detail-pasien-vaksin']    =   'M_vaksinasi/detail_pasien';

// frontend
$route['pasien-covid']  =   'Frontend/pasien';
$route['vaksinasi']  =   'Frontend/vaksinasi';
$route['detail-jadwal']  =   'Frontend/detail_jadwal';

// API
// $route['get-vaksinasi'] = 'Api/'
