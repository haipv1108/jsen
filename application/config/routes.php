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
|	http://codeigniter.com/user_guide/general/routing.html
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


//admin
$route['admin'] = "admin/admin/index"; 
$route['admin/view'] = "admin/admin/view"; 
$route['admin/view/([0-9\-]+)'] = "admin/admin/view/$1"; 
$route['admin/edit'] = "admin/admin/edit"; 
$route['admin/add'] = "admin/admin/add";
$route['admin/delete'] = "admin/admin/delete";

//home - nguoi dung
$route['home'] = "home/user/index"; 
$route['home/login'] = "home/verify/login"; 
$route['home/logout'] = "home/verify/logout"; 
$route['home/register'] = "home/user/register";
$route['home/verify'] = "home/verify/index";

//member
$route['member'] = "member/member/index"; 
$route['member/view'] = "member/member/view"; 
$route['member/view/([0-9\-]+)'] = "member/member/view/$1"; 
$route['member/add'] = "member/member/add"; 
$route['member/edit'] = "member/member/edit"; 
$route['member/delete'] = "member/member/delete"; 

// home page
$route['default_controller'] = 'home_page/home_page/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//scanner
$router['scanner'] = "scanner/scanner/index";

// area_page
$router['kanto'] = "kanto/kanto";
$router['tokai'] = "tokai/tokai";
$router['kansai'] = "kansai/kansai";
$router['tohoku'] = "tohoku/tohoku";
$router['chugoku'] = "chugoku/chugoku";
$router['hokuriku'] = "hokuriku/hokuriku";
$router['kyusyu'] = "kyusyu/kyusyu";

// guide_area
$router['guide_area'] = 'guide_area/guide_area/index';
$router['guide_area/city'] = 'guide_area/guide_area/city';
$router['guide_area/list_work'] = 'guide_area/guide_area/list_work';
$router['guide_area/list_work'] = 'guide_area/guide_area/list_work';


// line
$router['guide_line'] = 'guide_line/guide_line/index';
$router['guide_line/line'] = 'guide_line/guide_line/line';
$router['guide_line/station'] = 'guide_line/guide_line/station';
$router['guide_line/list_work/([0-9\-]+)'] = 'guide_line/guide_line/list_work/$1';

//job
$router['guide_job'] = 'guide_job/guide_job/index';
$router['guide_job/job'] = 'guide_job/guide_job/job';
$router['guide_job/list_work'] = 'guide_job/guide_job/list_work';

//feature
$router['guide_feature'] = 'guide_feature/guide_feature/index';
$router['guide_feature/feature'] = 'guide_feature/guide_feature/feature';

//work
$router['work'] = 'work/work/index';



