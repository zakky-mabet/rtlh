<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* SKPD */
$route['login'] = 'login_skpd';
$route['login/signout'] = 'login_skpd/signout';

/* ADMIN */
