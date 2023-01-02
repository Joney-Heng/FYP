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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//URL                           = // Controller
$route['home']                  = 'home';

//LOGIN & SIGN-UP
$route['login']                 = 'login';
$route['sign-up']               = 'signup';
$route['google-login']          = 'googleLogin';

//PRODUCT MANAGEMENT
$route['product'] = "admin/product/index";
$route['product/create'] = "admin/product/create";
$route['product/store'] = "admin/product/store";
$route['product/edit/(:num)'] = "admin/product/edit/$1";
$route['product/show/(:num)'] = "admin/product/show/$1";
$route['product/update/(:num)'] = "admin/product/update/$1";
$route['product/delete/(:num)'] = "admin/product/delete/$1";
$route['product/upload'] = "admin/product/uploadImage";

//SHOPPING MALL - MAINSITE
$route['mainsite'] = "mainsite/main/index";
$route['mainsite/product-details/(:num)'] = "mainsite/main/show/$1";

//SHOPPING CART
$route['mainsite/shopping-cart'] = "mainsite/cart/index";
$route['mainsite/add-to-cart'] = "mainsite/cart/addtoCart";
$route['mainsite/delete-cart'] = "mainsite/cart/deleteCart";
$route['mainsite/update-cart'] = "mainsite/cart/updateCart";
$route['mainsite/get-cart'] = "mainsite/cart/getCartDetails";

//ADDRESS BOOK
$route['mainsite/address-book'] = "mainsite/address/index";
$route['mainsite/add-new-address'] = "mainsite/address/addAddress";
$route['mainsite/delete-address'] = "mainsite/address/deleteAddress";
$route['mainsite/update-address'] = "mainsite/address/updateAddress";
$route['mainsite/get-address-details'] = "mainsite/address/getAddressDetails";
$route['mainsite/get-default-address-details'] = "mainsite/address/getDefaultAddressDetails";

//VOUCHER MANAGEMENT
$route['voucher'] = "admin/voucher/index";
$route['voucher/create'] = "admin/voucher/create";
$route['voucher/store'] = "admin/voucher/store";
$route['voucher/edit/(:num)'] = "admin/voucher/edit/$1";
$route['voucher/update/(:num)'] = "admin/voucher/update/$1";
$route['voucher/get-available-vouchers'] = "admin/voucher/getAvailableVouchers";
$route['voucher/get-applied-voucher-details'] = "admin/voucher/getAppliedVoucherDetails";


$route['voucher/delete'] = "admin/voucher/deleteVoucher";
$route['voucher/show/(:num)'] = "admin/voucher/show/$1";



