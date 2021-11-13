<?php
//error_reporting(1);
$this->load->view("frontend/header");
$this->load->view("frontend/menu");
$this->load->view("frontend/$page");
$this->load->view("frontend/footer");
