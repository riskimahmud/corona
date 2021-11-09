<?php

// core
define('ENVIRONMENT', 'development');
define('CI_SYSTEM_DIR', '../includes/ci_system_304');
define('CI_APPLICATION_DIR', 'application');

define('FORCE_SSL', FALSE);

define('ROOT_PATH', str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'] . '/'));
define('BASE_URI', 'ebos');
define('CONFIG_USE_DB', TRUE);
define('MY_RANDOM_CHAR', 'poSh4');

// app config
//define('APP_BASE_URL', 'http://corona.gorontalokota.go.id/');
define('APP_GLOBAL_PREFIX', 'ebs');
define('APP_ENCRYPTION_KEY', 'xh7Rg');
define('APP_SESSION_PATH', NULL);
define('APP_SESSION_COOKIE_NAME', 'ebs');
define('APP_COOKIE_PREFIX', 'eb');

$assign_to_config['assets_uri'] = 'assets';
$assign_to_config['assets_front_uri'] = 'assets_front';
$assign_to_config['uploads_uri'] = 'uploads';
$assign_to_config['def_paper'] = 'A4';
$assign_to_config['default_margin'] = '13,13,16,16';
$assign_to_config['mpdf_path'] = '../includes/mpdf_610/';
$assign_to_config['phpexcel_path'] = '../includes/phpexcel180/';

// $assign_to_config['app_name'] = 'SIJLo - Sistem Informasi Jayapura Laboratorium';
$assign_to_config['app_name_short'] = '';
$assign_to_config['app_title'] = '';
$assign_to_config['app_title_1'] = '';
$assign_to_config['app_title_2'] = '';
$assign_to_config['app_owner'] = 'Riski';
$assign_to_config['owner_address'] = '';

$assign_to_config['site_keywords'] = 'Eparty';
$assign_to_config['ttd_kota'] = 'Gorontalo';
$assign_to_config['tahun_awal_data'] = '2019';
