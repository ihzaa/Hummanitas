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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$modules_path = APPPATH . 'modules/';
$modules = scandir($modules_path);


$route['translate_uri_dashes'] = FALSE;

$route['community/(:num)'] = 'community';
$route['community/(:num)/report'] = 'community/report';
$route['community/(:num)/setting'] = 'community/setting_community';
$route['community/(:num)/setting_community1'] = 'community/setting_community1';
$route['community/(:num)/member'] = 'community/listMember';
$route['community/(:num)/viewMember'] = 'community/userProfile';

$route['community/(:num)/get_user_detail'] = 'community/get_user_detail';
$route['community/(:num)/memberManagement/invite'] = 'community/invite';

//kolaborasi komunitas
$route['community/(:num)/collaboration'] = 'community/collaboration';
$route['community/(:num)/createCollab'] = 'community/createCollab';
$route['community/(:num)/collaboration/accept'] = 'community/acceptCollab';
$route['community/(:num)/collaboration/reject'] = 'community/rejectCollab';

//event komunitas
$route['community/(:num)/event'] = 'community/event';
$route['community/(:num)/event/add'] = 'community/createEvent';
$route['community/(:num)/event/editEvent'] = 'community/editEvent';
$route['community/(:num)/event/(:num)'] = 'community/event_detail';

//member management komunitas
$route['community/(:num)/memberManagement'] = 'community/memberManagement';
$route['community/(:num)/memberManagement/makeAdmin'] = 'community/makeAdmin';
$route['community/(:num)/memberManagement/accept'] = 'community/accept';
$route['community/(:num)/memberManagement/reject'] = 'community/reject';
$route['community/(:num)/memberManagement/removeAdmin'] = 'community/removeAdmin';
$route['community/(:num)/memberManagement/removeMember'] = 'community/removeMember';

//gallery komunitas
$route['community/(:num)/gallery'] = 'community/gallery';
$route['community/(:num)/gallery/(:num)'] = 'community/image';
$route['community/(:num)/gallery/(:num)/add'] = 'community/addPhoto';
$route['community/(:num)/gallery/add'] = 'community/createAlbum';


//Admin
$route['admin'] = 'admin/index';
$route['admin/report-community'] = 'admin/report_community';
$route['admin/report-user'] = 'admin/report_user';
$route['admin/report-community/del'] = 'admin/del_community';
$route['admin/report-user/del'] = 'admin/del_user';
$route['admin/report/read'] = 'admin/read_report';
$route['admin/report/del'] = 'admin/del_report';
$route['admin/kelola-profil'] = 'admin/kelola_profil';
$route['admin/kelola-profil/ubah-password'] = 'admin/ubah_password';

//guest
$route['community/(:num)/guest'] = 'community/guest';
$route['community/(:num)/privateGuest'] = 'community/privateGuest';
$route['community/(:num)/joinGuest'] = 'community/joinGuest';
$route['community/(:num)/guest/member'] = 'community/guestMember';
$route['community/(:num)/guest/gallery'] = 'community/guestGallery';
$route['community/(:num)/guest/gallery/(:num)'] = 'community/guestPhoto';

//ajax
$route['ajax'] = 'ajax/index';
$route['ajax/(:num)/listCom'] = 'ajax/listCom';
$route['ajax/(:num)/chat'] = 'ajax/chat';
$route['ajax/(:num)/leaveCommunity'] = 'ajax/leaveCommunity';
$route['ajax/(:num)/getChat'] = 'ajax/get_collab_chat';
$route['ajax/(:num)/getMember'] = 'ajax/get_collab_member';
$route['ajax/(:num)/getMemberDetail'] = 'ajax/get_member_detail';
$route['ajax/(:num)/listEventIncome'] = 'ajax/listEventIncome';

//post
$route['community/posting/like'] = 'community/communitycontroller_ku/like';
$route['community/posting/dislike'] = 'community/communitycontroller_ku/dislike';
$route['community/posting/delete'] = 'community/communitycontroller_ku/deletePost';
$route['community/(:num)/posting'] = 'community/communitycontroller_ku/posting';
$route['posting/comment/store'] = 'community/communitycontroller_ku/storeComment';

//outcome
$route['community/(:num)/finance/outcome'] = 'community/community_outcome/outcome';
$route['community/(:num)/finance/outcome/add'] = 'community/community_outcome/outcomeAdd';

//finance
$route['community/(:num)/finance/income/1'] = 'community/communitynew/idx';
$route['community/(:num)/finance/income/1/addTransaction'] = 'community/communitynew/addMonthlyTransaction';
$route['ajax/(:num)/saveDonation'] = 'ajax/saveDonation';
$route['community/(:num)/finance/income/2'] = 'community/communitynew/event_income';
$route['community/(:num)/finance/income/2/addEvent'] = 'community/communitynew/add_event';
$route['community/(:num)/finance/income/2/addTransaction'] = 'community/communitynew/addEventTransaction';
$route['community/(:num)/finance/income/3'] = 'community/communitynew/total_income';
