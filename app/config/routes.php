<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['login.html'] = 'dashboard/login';
$route['register.html'] = 'dashboard/register';


$route['catalog/(:any)'] = 'catalog/post/$1';
$route['(:any).html'] = 'post/view/$1';



$route['404.html'] = 'dashboard/error404';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
