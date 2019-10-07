<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login']     = 'welcome/login';
$route['DoLogin']   = 'welcome/proses_login';
$route['logout']    = 'welcome/logout';

// Surat Masuk
$route['surat-masuk']       = 'surat_masuk';
$route['input-surat-masuk'] = 'surat_masuk/form_input';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
