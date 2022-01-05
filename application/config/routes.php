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
$route['default_controller'] = 'status';
$route['404_override'] = 'status/error';
$route['translate_uri_dashes'] = FALSE;

/*
* ROTAS API
* - Rotas amigáveis para acesso pelo aplicativo
*/

// DASHBOARD
$route['api/dashboard']['GET']                  = 'dashboard/getDashboard';
$route['api/dashboard/detalhe/(:any)']['GET']   = 'dashboard/getDetalharStatus/$1';
$route['api/dashboard']['POST']                 = 'dashboard/postDashboard';
// $route['api/dashboard']['PUT']          = 'api/dashboard/putDashboard';
// $route['api/dashboard']['DELETE']       = 'api/dashboard/deleteDashboard';

// OPERAÇÕES
$route['api/operacao']['GET']           = 'operacao/getOperacao'; 
$route['api/operacao/(:any)']['GET']    = 'operacao/getOperacao/$1';
$route['api/operacao/detalhe/']['GET']    = 'operacao/getOperacaoDetalhe/';
$route['api/operacao/detalhe/(:any)']['GET']    = 'operacao/getOperacaoDetalhe/$1';

//EMPRESAS
$route['api/empresa']['GET']            = 'empresa/getEmpresa'; 
$route['api/empresa/(:any)']['GET']     = 'empresa/getEmpresa/$1'; 

//NOTIFICAÇÃO
$route['api/notificacao']['GET']            = 'notificacao/getNotificacao'; 
// $route['api/notificacao/(:any)']['GET']     = 'api/notificacao/getNotificacao/$1'; getOperacaoDetalhe

// PASS
$route['pass/(:any)']['GET']    = 'pass/index/$1';

// USUARIOS
$route['usuarios']['GET']                              = 'usuarios/index';
$route['usuarios/nome']['GET']                         = 'usuarios/getName';
$route['usuarios/nome/']['GET']                        = 'usuarios/getName';
$route['usuarios/nome/(:any)']['GET']                  = 'usuarios/getName/$1';
$route['usuarios']['POST']                             = 'usuarios/postUser';
