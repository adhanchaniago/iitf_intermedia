<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'App_view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'App_view/login';
$route['login/loginprocess'] = 'App_view/loginProcess';
$route['logout'] = 'App_view/logout';
$route['timeline'] = 'App_view/timeline';
$route['register'] = 'App_view/reg_close';//'App_view/register';
$route['register/registerprocess'] = 'App_view/reg_close';//'App_view/registerProcess';
$route['daftar'] = 'App_view/step';
$route['seminar/register'] = 'App_view/reg_seminar';
$route['seminar/register/send'] = 'App_view/regnow_seminar';
$route['user'] = 'App_view/step';
$route['user/submitkoor'] = 'App_view/saveKoor';
$route['user/pilihlomba'] = 'App_view/pilihlomba';
$route['user/team'] = 'App_view/saveTeam';
$route['user/delAnggota/(:num)'] = 'App_view/delTeam/$1';
$route['user/bayar'] = 'App_view/pembayaran';
$route['user/submission'] = 'App_view/submission';
$route['user/verification'] = 'App_view/verification';
$route['user/dashboard'] = 'App_view/dash';
$route['detail'] = 'App_view/detailLomba';
$route['lupa_password'] = 'App_view/lupaPassword';
$route['lupa_password/process'] = 'App_view/lupaPasswordProcess';

