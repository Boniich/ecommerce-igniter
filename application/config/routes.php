<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';

$route['admin_login'] = 'admin_panel/login/admin_login';
$route['admin_logout'] = 'admin_panel/login/admin_login/logout';
$route['do_admin_login'] = 'admin_panel/login/admin_login/do_login';

$route['client_login'] = 'clients/auth/client_login';
$route['logout_client'] = 'clients/auth/client_login/logout';
$route['do_client_login'] = 'clients/auth/client_login/do_login';

$route['client_register'] = 'clients/auth/client_register';
$route['do_client_register'] = 'clients/auth/client_register/do_client_register';

$route['products'] = 'clients/client_product/index';
$route['product/(:num)'] = 'clients/client_product/get_product_details/$1';


$route['shopping_car'] = 'clients/shopping_car/shopping_car';
$route['add_product_to_car/(:num)'] = 'clients/shopping_car/shopping_car/add_product_to_car/$1';
$route['update_product_from_car/(:num)/(:num)'] = 'clients/shopping_car/shopping_car/update_product_from_shopping_car/$1/$2';
$route['delete_product_from_car/(:num)/(:num)'] = 'clients/shopping_car/shopping_car/delete_product_from_shopping_car/$1/$2';


$route['admin_panel/products'] = 'admin_panel/admin_product_panel/index';
$route['show_product_data/(:num)'] = 'admin_panel/admin_product_panel/show_product_data/$1';
$route['admin_panel/product/(:num)'] = 'admin_panel/admin_product_panel/get_product_details/$1';
$route['create_product'] = 'admin_panel/admin_product_panel/create_product';
$route['update_product/(:num)'] = 'admin_panel/admin_product_panel/update_product/$1';
$route['delete_product/(:num)'] = 'admin_panel/admin_product_panel/delete_product/$1';

$route['admin_panel/clients'] = 'admin_panel/admin_panel_client/index';
$route['get_client_data/(:num)'] = 'admin_panel/admin_panel_client/get_client_data/$1';
$route['admin_panel/client/(:num)'] = 'admin_panel/admin_panel_client/get_client_details/$1';
$route['create_client'] = 'admin_panel/admin_panel_client/create_client';
$route['update_client'] = 'admin_panel/admin_panel_client/update_client/$1';
$route['delete_client/(:num)'] = 'admin_panel/admin_panel_client/delete_client/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
