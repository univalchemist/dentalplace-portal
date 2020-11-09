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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['quenotification'] = 'Admin/quenotification';

/***************************Admin Routes***************************************/
$route['admin'] = 'Admin/login';
$route['admin-recover_password'] = 'Admin/recover_password';
$route['admin-otp_password'] = 'Admin/otp_password';
$route['admin-create-password'] = 'Admin/create_password';
$route['admin-dashboard'] = 'Admin/userdashboard';
$route['admin-dashboard/(:any)'] = 'Admin/userdashboard';
$route['vendor_dashboard'] = 'Admin/vendordashboard';
$route['push-notification'] = 'Admin/pushnotification';
$route['compose'] = 'Admin/compose';
$route['edit-notification/(:any)'] = 'Admin/editNotification';
$route['admin-category'] = 'Admin/category';
$route['admin-appointment'] = 'Admin/adminappointment'; 
  
/***************************Vendor Routes***************************************/
$route['login'] = 'Vendor_Controller/vendorloginfun';
$route['vendor_recover'] = 'Vendor_Controller/vendorrecoverfun';
$route['vendor_sent_otpcode'] = 'Vendor_Controller/vendorsendotpfun';
$route['vendor-create-password'] = 'Vendor_Controller/createpasswordfun';      
$route['vendor-appointment'] = 'Vendor_Controller/appointment';
$route['vendor-profile'] = 'Vendor_Controller/profile';
$route['vendor-chat'] = 'Vendor_Controller/chat';
$route['accept_appointment'] = 'Vendor_Controller/AcceptAppointment';
$route['cancel_appointment'] = 'Vendor_Controller/CancelAppointment';
$route['send_message'] = 'Vendor_Controller/SendMessage';
$route['get_new_chat_messages'] = 'Vendor_Controller/GetAllNewMessages';
$route['send_new_booking_by_vendor'] = 'Vendor_Controller/SendBookingByVendor';