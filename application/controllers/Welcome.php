<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->library('googlemaps');
		$api = json_decode(file_get_contents("https://api.kawalcorona.com/"));
		$config['center'] = '0.5490078, 123.0050009';
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);
		
		foreach($api as $a){
			$marker = array();
			$marker['position'] = $a->attributes->Lat.", ".$a->attributes->Long_;
			$marker['infowindow_content'] = '<h1>'.$a->attributes->Country_Region.'</h1><h3>Positif : '.$a->attributes->Confirmed.'<br>Dirawat : '.$a->attributes->Active.'<br>Sembuh : '.$a->attributes->Recovered.'<br>Meninggal : '.$a->attributes->Deaths.'</h3>';
			$marker['animation'] = 'DROP';
			$marker['icon'] = base_url("assets_front/img/marker/welfareroom.png");
			$this->googlemaps->add_marker($marker);
			// echo $a->attributes->OBJECTID;
			// echo "<br>";
		}
		$data['map'] = $this->googlemaps->create_map();
		
		// $this->load->view("frontend/main", $data);
		
		$this->load->view('v_map',$data);
	}
}
