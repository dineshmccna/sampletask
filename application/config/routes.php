<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'login_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['signup'] = 'login_controller/sign_up';
$route['userlist'] = 'user_controller/user_list';
$route['userregister'] = 'user_controller/register_user';
$route['checkduplicate'] = 'user_controller/check_duplicate';
$route['login'] = 'login_controller/log_in';
$route['dashboard'] = 'dashboard_controller/dashboard';
$route['logout'] = 'login_controller/logout';
$route['profile'] = 'dashboard_controller/view_profile';
$route['profile_edit/(:any)'] = 'dashboard_controller/edit_profile/$1';
$route['checkduplicate_edit'] = 'dashboard_controller/check_duplicate_edit';
$route['member_edit'] = 'dashboard_controller/member_edit';
$route['forgot_password1']='login_controller/send_email';
$route['get_password']='login_controller/get_password';
$route['forgot_password']='login_controller/forgot_password';
$route['member_list']='dashboard_controller/member_list';
$route['delete_member']='dashboard_controller/delete_member';