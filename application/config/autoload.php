<?php
defined('BASEPATH') or exit('No direct script access allowed');
$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'session', 'calendar', 'form_validation');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'download', 'file', 'form', 'text', 'date', 'captcha', 'string', 'html', 'corona_helper', 'common_helper', 'my_helper', 'js_helper', 'master_helper', 'session_helper');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('crud_model');
