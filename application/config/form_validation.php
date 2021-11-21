<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
	'testing'	=> array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required',
			'errors' => array(
				'required' => 'You must provide a %s.',
			),
		),
		array(
			'field' => 'passconf',
			'label' => 'Password Confirmation',
			'rules' => 'required|matches[password]'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required'
		)
	),
	'pasien' => [
		[
			'field' => 'nik',
			'label' => 'NIK',
			'rules' => 'trim|numeric|min_length[16]'
		],
		[
			'field' => 'nama',
			'label' => 'Nama',
			'rules' => 'trim|required'
		],
		[
			'field' => 'jenis_kelamin',
			'label' => 'Jenis Kelamin',
			'rules' => 'trim|required'
		],
		[
			'field' => 'umur',
			'label' => 'Umur',
			'rules' => 'trim|required|numeric'
		],
		[
			'field' => 'alamat',
			'label' => 'Alamat',
			'rules' => 'trim'
		],
		[
			'field' => 'alamat',
			'label' => 'Alamat',
			'rules' => 'trim'
		],
		[
			'field' => 'kelurahan',
			'label' => 'Kelurahan',
			'rules' => 'trim|required'
		],
		[
			'field' => 'puskesmas',
			'label' => 'Puskesmas',
			'rules' => 'trim|required'
		],
		[
			'field' => 'tempat_rawat',
			'label' => 'Tempat Rawat',
			'rules' => 'trim|required|callback_cek_kuota'
		],
		[
			'field' => 'nilai_ct',
			'label' => 'Nilai CT',
			'rules' => 'trim'
		],
		[
			'field' => 'cluster',
			'label' => 'Cluster',
			'rules' => 'trim'
		],
		[
			'field' => 'tgl_positif',
			'label' => 'Tanggal Positif',
			'rules' => 'trim|required'
		],
	],
	'jadwal' => [
		[
			'field' => 'penyelenggara',
			'label' => 'Penyelenggara',
			'rules' => 'trim|required'
		],
		[
			'field' => 'tempat',
			'label' => 'Tempat',
			'rules' => 'trim|required'
		],
		[
			'field' => 'tanggal',
			'label' => 'Tanggal',
			'rules' => 'trim|required'
		],
		[
			'field' => 'lama',
			'label' => 'Lama',
			'rules' => 'trim|required|numeric|max_length[2]'
		],
		[
			'field' => 'dari_jam',
			'label' => 'Dari Jam',
			'rules' => 'trim|callback_dari_check'
		],
		[
			'field' => 'sampai_jam',
			'label' => 'Sampai Jam',
			'rules' => 'trim'
		],
		[
			'field' => 'keterangan',
			'label' => 'Keterangan',
			'rules' => 'trim'
		],
	],
	'import_pasien' => [
		[
			'field' =>	'file',
			'label' =>	'File Excel',
			'rules'	=>	'callback_check_file'
		]
	]
);

$config['error_prefix'] = '<div class="text-error">';
$config['error_suffix'] = '</div>';





/* End of file form_validation.php */

/* Location: ./application/config/form_validation.php */
