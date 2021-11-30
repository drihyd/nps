<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ThemeoptionsController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\UsermanagementController;

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
Route::any('/',[AdminController::class, 'auth_login']);
Route::post('adminlogin-verification',[AdminController::class, 'Loginsubmit'])->name('adminlogin.verification');
Route::get('logout', [AdminController::class,'logout'])->name('admin.logout');
Route::get('profile/',[AdminController::class,'profile']);
Route::post('profile/update',[AdminController::class,'update_profile']);
/* Dashbaord */
Route::get('dashboard', [AdminController::class,'dashboard_lists']);



Route::group( ['prefix' => 'admin','middleware' => 'admin'],function(){
	
	
	
	
	
});


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

Route::post('organizations/delete',[OrganizationsController::class,'delete_organization']);

Route::post('organizations/update_company', [OrganizationsController::class,'update_company'])->name('update_company');
Route::post('organizations/update_shortname', [OrganizationsController::class,'update_shortname'])->name('update_shortname');
Route::post('organizations/update_entitytype', [OrganizationsController::class,'update_entitytype'])->name('update_entitytype');
Route::post('organizations/update_address_1', [OrganizationsController::class,'update_address_1'])->name('update_address_1');
Route::post('organizations/update_address_2', [OrganizationsController::class,'update_address_2'])->name('update_address_2');
Route::post('organizations/update_pincode', [OrganizationsController::class,'update_pincode'])->name('update_pincode');
Route::post('organizations/update_city', [OrganizationsController::class,'update_city'])->name('update_city');
Route::post('organizations/update_gst_details', [OrganizationsController::class,'update_gst'])->name('update_gst_details');
Route::post('organizations/update_billing_address1', [OrganizationsController::class,'update_billing_address1'])->name('update_billing_address1');


/*Admin Theme options*/
Route::resource('theme_options', ThemeoptionsController::class)->middleware('auth');
Route::get('theme_options/create',[ThemeoptionsController::class,'create_theme_options']);
Route::post('theme_options/store',[ThemeoptionsController::class,'store_theme_options']);
Route::get('theme_options/edit/{id}',[ThemeoptionsController::class,'edit_theme_options']);
Route::post('theme_options/update',[ThemeoptionsController::class,'update_theme_options']);
Route::get('theme_options/delete/{id}',[ThemeoptionsController::class,'delete_theme_options']);

/*admin- Users */

Route::get('organizations/users', [UsermanagementController::class,'index']);
Route::get('organizations/user/create', [UsermanagementController::class,'create_user']);
Route::post('organizations/user/store', [UsermanagementController::class, 'store_user']);
Route::get('organizations/user/edit/{id}',[UsermanagementController::class,'edit_user']);
Route::post('organizations/user/update',[UsermanagementController::class,'update_user']);
Route::get('organizations/user/delete/{id}',[UsermanagementController::class,'delete_user']);