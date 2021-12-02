<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NetPromoterScore;

use App\Http\Controllers\ThemeoptionsController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\UsermanagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\SurveysController;
use App\Http\Controllers\QuestionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::any('/net_promoter_score',[NetPromoterScore::class, 'nps_login']);
Route::any('/',[NetPromoterScore::class, 'nps_login']);
Route::post('login-verification',[NetPromoterScore::class, 'Loginsubmit'])->name('login.verification');
Route::get('logout', [NetPromoterScore::class,'logout'])->name('user.logout');

Route::get('session.logout', [LoginController::class,'logout'])->name('session.logout');



Route::post('adminlogin-verification',[LoginController::class, 'Loginsubmit'])->name('adminlogin.verification');
Route::get('administrator/logout', [LoginController::class,'logout'])->name('admin.logout');
Route::get('administrator/profile/',[LoginController::class,'profile']);
Route::post('administrator/profile/update',[LoginController::class,'update_profile']);

/* Dashbaord */



Route::group(['prefix' => 'user','middleware' => 'isuser'],function(){

	Route::get('survey', [NetPromoterScore::class,'first_question']);
	Route::get('second', [NetPromoterScore::class,'second_question']);
	Route::post('surveyonepost', [NetPromoterScore::class,'surveyone_post'])->name('surveyone.post');

	
});



Route::group( ['prefix' => 'admin','middleware' => 'isadmin'],function(){

	Route::get('dashboard', [DashboardController::class,'dashboard_lists']);

	Route::get('departments', [DepartmentsController::class,'departments_list']);
	Route::get('departments/create', [DepartmentsController::class,'create_departments']);
	Route::post('departments/store', [DepartmentsController::class, 'store_departments']);
	Route::get('departments/edit/{id}',[DepartmentsController::class,'edit_departments']);
	Route::post('departments/update',[DepartmentsController::class,'update_departments']);
	Route::get('departments/delete/{id}',[DepartmentsController::class,'delete_departments']);

	// users
	Route::get('users',[UsermanagementController::class,'department_users_list']);
	Route::get('user/create', [UsermanagementController::class,'department_create_user']);
	Route::post('user/store', [UsermanagementController::class, 'department_store_user']);
	Route::get('user/edit/{id}',[UsermanagementController::class,'department_edit_user']);
	Route::post('user/update',[UsermanagementController::class,'department_update_user']);
	Route::get('user/delete/{id}',[UsermanagementController::class,'department_delete_user']);


	Route::get('surveys', [SurveysController::class,'surveys_list']);
	Route::get('surveys/create', [SurveysController::class,'create_surveys']);
	Route::post('surveys/store', [SurveysController::class, 'store_surveys']);
	Route::get('surveys/edit/{id}',[SurveysController::class,'edit_surveys']);
	Route::post('surveys/update',[SurveysController::class,'update_surveys']);
	Route::get('surveys/delete/{id}',[SurveysController::class,'delete_surveys']);

	Route::get('questions', [QuestionsController::class,'questions_list']);
	Route::get('questions/create', [QuestionsController::class,'create_questions']);
	Route::post('questions/store', [QuestionsController::class, 'store_questions']);
	Route::get('questions/edit/{id}',[QuestionsController::class,'edit_questions']);
	Route::post('questions/update',[QuestionsController::class,'update_questions']);
	Route::get('questions/delete/{id}',[QuestionsController::class,'delete_questions']);

});


Route::group( ['prefix' => 'superadmin','middleware' => 'issuperadmin'],function(){

	Route::get('dashboard', [DashboardController::class,'dashboard_lists']);
	Route::get('organizations', [OrganizationsController::class,'organizations_lists'])->name('organizations_lists.index');

	

Route::get('organizations/add-basicinfo', [OrganizationsController::class,'add_basicinfo']);
Route::post('organizations/store', [OrganizationsController::class,'store_basicinfo']);
Route::get('organizations/add-address/{id}', [OrganizationsController::class,'add_address']);
Route::post('organizations/update_address', [OrganizationsController::class,'store_address']);
Route::get('organizations/add-gst-details/{id}', [OrganizationsController::class,'add_gst_details']);
Route::post('organizations/update_gst', [OrganizationsController::class,'store_gst_details']);
Route::get('organizations/add-admin-details/{id}', [OrganizationsController::class,'add_admin_details']);
Route::post('organizations/update_admin', [OrganizationsController::class,'store_admin_details']);
Route::get('organizations/add-license-details/{id}', [OrganizationsController::class,'add_license_details']);
Route::post('organizations/update_license', [OrganizationsController::class,'store_license_details']);

Route::any('organizations/get_permanent_address', [OrganizationsController::class,'get_permanent_address']);

Route::get('organizations/edit/{id}', [OrganizationsController::class,'edit_organization']);

Route::post('organizations/delete',[OrganizationsController::class,'delete_organization'])->name('organizations.delete');

Route::post('organizations/update_company', [OrganizationsController::class,'update_company'])->name('update_company');
Route::post('organizations/update_shortname', [OrganizationsController::class,'update_shortname'])->name('update_shortname');
Route::post('organizations/update_entitytype', [OrganizationsController::class,'update_entitytype'])->name('update_entitytype');
Route::post('organizations/update_address_1', [OrganizationsController::class,'update_address_1'])->name('update_address_1');
Route::post('organizations/update_address_2', [OrganizationsController::class,'update_address_2'])->name('update_address_2');
Route::post('organizations/update_pincode', [OrganizationsController::class,'update_pincode'])->name('update_pincode');
Route::post('organizations/update_city', [OrganizationsController::class,'update_city'])->name('update_city');
Route::post('organizations/update_country', [OrganizationsController::class,'update_country'])->name('update_country');

Route::post('organizations/update_gst_details', [OrganizationsController::class,'update_gst'])->name('update_gst_details');
Route::post('organizations/update_billing_address1', [OrganizationsController::class,'update_billing_address1'])->name('update_billing_address1');
Route::post('organizations/update_billing_address2', [OrganizationsController::class,'update_billing_address2'])->name('update_billing_address2');
Route::post('organizations/update_billing_pincode', [OrganizationsController::class,'update_billing_pincode'])->name('update_billing_pincode');
Route::post('organizations/update_billing_city', [OrganizationsController::class,'update_billing_city'])->name('update_billing_city');
Route::post('organizations/update_billing_country', [OrganizationsController::class,'update_billing_country'])->name('update_billing_country');
Route::post('organizations/update_admin_name', [OrganizationsController::class,'update_admin_name'])->name('update_admin_name');
Route::post('organizations/update_admin_email', [OrganizationsController::class,'update_admin_email'])->name('update_admin_email');
Route::post('organizations/update_admin_mobile', [OrganizationsController::class,'update_admin_mobile'])->name('update_admin_mobile');
Route::post('organizations/update_admin_alt_mobile', [OrganizationsController::class,'update_admin_alt_mobile'])->name('update_admin_alt_mobile');
Route::post('organizations/update_license_startdate', [OrganizationsController::class,'update_license_startdate'])->name('update_license_startdate');
Route::post('organizations/update_license_period_year', [OrganizationsController::class,'update_license_period_year'])->name('update_license_period_year');
Route::post('organizations/update_license_period_month', [OrganizationsController::class,'update_license_period_month'])->name('update_license_period_month');


/*Admin Theme options*/
Route::resource('theme_options', ThemeoptionsController::class)->middleware('auth');
Route::get('theme_options/create',[ThemeoptionsController::class,'create_theme_options']);
Route::post('theme_options/store',[ThemeoptionsController::class,'store_theme_options']);
Route::get('theme_options/edit/{id}',[ThemeoptionsController::class,'edit_theme_options']);
Route::post('theme_options/update',[ThemeoptionsController::class,'update_theme_options']);
Route::get('theme_options/delete/{id}',[ThemeoptionsController::class,'delete_theme_options']);

/*admin- Users */

Route::get('admin-users', [UsermanagementController::class,'index']);
Route::get('admin-user/create', [UsermanagementController::class,'create_user']);
Route::post('admin-user/store', [UsermanagementController::class, 'store_user']);
Route::get('admin-user/edit/{id}',[UsermanagementController::class,'edit_user']);
Route::post('admin-user/update',[UsermanagementController::class,'update_user']);
Route::get('admin-user/delete/{id}',[UsermanagementController::class,'delete_user']);




});











