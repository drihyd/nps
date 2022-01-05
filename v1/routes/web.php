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
use App\Http\Controllers\QuestionsOptionsController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ResponsesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DesignationlevelsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SlaConfigurationController;
use App\Http\Controllers\CustomerFieldsConfigurableController;
use App\Http\Controllers\SendSMSController; 


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

/** SMS **/

Route::get('send-sms', [SendSMSController::class, 'index']);

Route::get('/send-markdown-mail', [MailController::class, 'sendOfferMail']);
Route::get('/trigger_escalation_mails', [NetPromoterScore::class, 'trigger_escalation_mails']);


Route::any('/net_promoter_score',[NetPromoterScore::class, 'nps_login']);
Route::any('/nps_score_factor_count',[NetPromoterScore::class, 'nps_score_factor_count']);
Route::any('/',[NetPromoterScore::class, 'nps_login']);
Route::post('login-verification',[NetPromoterScore::class, 'Loginsubmit'])->name('login.verification');
Route::get('logout', [NetPromoterScore::class,'logout'])->name('user.logout');

Route::get('session.logout', [LoginController::class,'logout'])->name('session.logout');


Route::any('filter.responses', [ResponsesController::class,'response_list'])->name('filter.responses');

Route::any('filter.questions', [QuestionsController::class,'questions_list'])->name('filter.questions');
Route::any('filter.roles', [UsermanagementController::class,'department_users_list'])->name('filter.roles');
Route::any('filter.teams', [ActivitiesController::class,'activities_list'])->name('filter.teams');
Route::any('filter.levels', [DesignationlevelsController::class,'designation_levels_list'])->name('filter.levels');





Route::post('adminlogin-verification',[LoginController::class, 'Loginsubmit'])->name('adminlogin.verification');
Route::get('administrator/logout', [LoginController::class,'logout'])->name('admin.logout');
Route::get('administrator/profile/',[LoginController::class,'profile']);
Route::post('administrator/profile/update',[LoginController::class,'update_profile']);

Route::get('reset-password',[ChangePasswordController::class,'index'])->name('reset.password');
Route::post('reset-password-post',[ChangePasswordController::class,'store'])->name('verifying.password');



Route::get('offlinesurvey/{sid?}/{logid?}/{pid?}', [NetPromoterScore::class,'first_question_offline']);
Route::post('offline.surveyone.post', [NetPromoterScore::class,'surveyone_post'])->name('offline.surveyone.post');

/* Dashbaord */



Route::group(['prefix' => 'user','middleware' => 'isuser'],function(){

	Route::get('dashboard', [DashboardController::class,'dashboard_user_lists']);
	
	Route::get('survey', [NetPromoterScore::class,'survey_names']);
	Route::get('survey/start/{type?}', [NetPromoterScore::class,'take_person_onfo']);
	Route::get('takesurvey/{type?}', [NetPromoterScore::class,'first_question']);
	Route::get('picksurveymethod/{type?}', [NetPromoterScore::class,'picksurvey_method']);
	Route::get('second', [NetPromoterScore::class,'second_question']);
	Route::post('surveyintiate', [NetPromoterScore::class,'surveyone_post'])->name('surveyone.post.user');
	Route::post('post.survey.personinfo', [NetPromoterScore::class,'store_survey_personinfo'])->name('post.survey.personinfo.user');

	Route::get('responses', [ResponsesController::class,'response_list']);
	Route::get('responses/view/{per_id}', [ResponsesController::class,'frontend_response_view']);
	Route::get('responses/delete/{per_id}', [ResponsesController::class,'delete_responses']);
	

	
});



Route::group( ['prefix' => 'admin','middleware' => 'isadmin'],function(){

	Route::get('dashboard', [DashboardController::class,'dashboard_lists']);
	Route::get('dashboard/doubtnutchart', [DashboardController::class,'doubtnutchart'])->name('dashboardcount.index');

	/*Admin Departments*/

	Route::get('departments', [DepartmentsController::class,'departments_list']);
	Route::get('departments/create', [DepartmentsController::class,'create_departments']);
	Route::post('departments/store', [DepartmentsController::class, 'store_departments']);
	Route::get('departments/edit/{id}',[DepartmentsController::class,'edit_departments']);
	Route::post('departments/update',[DepartmentsController::class,'update_departments']);
	Route::get('departments/delete/{id}',[DepartmentsController::class,'delete_departments']);

	/*Admin users*/
	Route::get('users',[UsermanagementController::class,'department_users_list']);
	Route::get('user/create', [UsermanagementController::class,'department_create_user']);
	Route::post('user/store', [UsermanagementController::class, 'department_store_user']);
	Route::get('user/edit/{id}',[UsermanagementController::class,'department_edit_user']);
	Route::post('user/update',[UsermanagementController::class,'department_update_user']);
	Route::get('user/delete/{id}',[UsermanagementController::class,'department_delete_user']);

	/*Admin Surveys*/
	Route::get('questionnaire', [SurveysController::class,'surveys_list']);
	Route::get('questionnaire/create', [SurveysController::class,'create_surveys']);
	Route::post('questionnaire/store', [SurveysController::class, 'store_surveys']);
	Route::get('questionnaire/edit/{id}',[SurveysController::class,'edit_surveys']);
	Route::post('questionnaire/update',[SurveysController::class,'update_surveys']);
	Route::get('questionnaire/delete/{id}',[SurveysController::class,'delete_surveys']);
	Route::post('changeStatus', [SurveysController::class,'changeStatus']);
	/*Admin Questions*/
	Route::get('questions', [QuestionsController::class,'questions_list']);
	Route::get('questions/create', [QuestionsController::class,'create_questions']);
	Route::post('questions/store', [QuestionsController::class, 'store_questions']);
	Route::get('questions/edit/{id}',[QuestionsController::class,'edit_questions']);
	Route::post('questions/update',[QuestionsController::class,'update_questions']);
	Route::get('questions/delete/{id}',[QuestionsController::class,'delete_questions']);
	/*Admin Question Options*/
	Route::get('questions_options', [QuestionsOptionsController::class,'questions_option_list']);
	Route::get('questions_options/create', [QuestionsOptionsController::class,'create_questions_options']);
	Route::post('questions_options/store', [QuestionsOptionsController::class, 'store_questions_options']);
	Route::get('questions_options/edit/{id}',[QuestionsOptionsController::class,'edit_questions_options']);
	Route::post('questions_options/update',[QuestionsOptionsController::class,'update_questions_options']);
	Route::get('questions_options/delete/{id}',[QuestionsOptionsController::class,'delete_questions_options']);
	/*Admin Activities*/
	
	
	
	/*Admin Activities*/
	Route::get('activities', [ActivitiesController::class,'activities_list']);
	Route::get('activities/create', [ActivitiesController::class,'create_activities']);
	Route::post('activities/store', [ActivitiesController::class, 'store_activities']);
	Route::get('activities/edit/{id}',[ActivitiesController::class,'edit_activities']);
	Route::post('activities/update',[ActivitiesController::class,'update_activities']);
	Route::get('activities/delete/{id}',[ActivitiesController::class,'delete_activities']);
	
	Route::get('customer_fields_configurables', [CustomerFieldsConfigurableController::class,'customer_fields_configurables_list']);
	Route::get('customer_fields_configurables/create', [CustomerFieldsConfigurableController::class,'create_customer_fields_configurables']);
	Route::post('customer_fields_configurables/store', [CustomerFieldsConfigurableController::class, 'store_customer_fields_configurables']);
	Route::get('customer_fields_configurables/edit/{id}',[CustomerFieldsConfigurableController::class,'edit_customer_fields_configurables']);
	Route::post('customer_fields_configurables/update',[CustomerFieldsConfigurableController::class,'update_customer_fields_configurables']);
	Route::get('customer_fields_configurables/delete/{id}',[CustomerFieldsConfigurableController::class,'delete_customer_fields_configurables']);

	/*Admin User Responses*/
	
	
	
	
	Route::get('survey', [NetPromoterScore::class,'survey_names']);
	Route::get('survey/start/{type?}', [NetPromoterScore::class,'take_person_onfo']);
	Route::get('takesurvey/{type?}', [NetPromoterScore::class,'first_question']);
	Route::get('picksurveymethod/{type?}', [NetPromoterScore::class,'picksurvey_method']);
	Route::get('second', [NetPromoterScore::class,'second_question']);
	Route::post('surveyintiate', [NetPromoterScore::class,'surveyone_post'])->name('surveyone.post.admin');
	Route::post('post.survey.personinfo', [NetPromoterScore::class,'store_survey_personinfo'])->name('post.survey.personinfo.admin');

	Route::get('responses', [ResponsesController::class,'response_list']);
	Route::get('responses/view/{per_id}', [ResponsesController::class,'response_view']);
	Route::get('responses/delete/{per_id}', [ResponsesController::class,'delete_responses']);
	// Route::post('responses/update_status', [ResponsesController::class,'response_update_status']);


	Route::get('feedback', [ResponsesController::class,'feedback_list']);

	/*Admin Group levels*/
	Route::get('designations', [DesignationlevelsController::class,'designations_list']);
	Route::get('designations/create', [DesignationlevelsController::class,'create_designations']);
	Route::post('designations/store', [DesignationlevelsController::class, 'store_designations']);
	Route::get('designations/edit/{id}',[DesignationlevelsController::class,'edit_designations']);
	Route::post('designations/update',[DesignationlevelsController::class,'update_designations']);
	Route::get('designations/delete/{id}',[DesignationlevelsController::class,'delete_designations']);

	/*Admin Role levels*/
	Route::get('designation_levels', [DesignationlevelsController::class,'designation_levels_list']);
	Route::get('designation_levels/create', [DesignationlevelsController::class,'create_designation_levels']);
	Route::post('designation_levels/store', [DesignationlevelsController::class, 'store_designation_levels']);
	Route::get('designation_levels/edit/{id}',[DesignationlevelsController::class,'edit_designation_levels']);
	Route::post('designation_levels/update',[DesignationlevelsController::class,'update_designation_levels']);
	Route::get('designation_levels/delete/{id}',[DesignationlevelsController::class,'delete_designation_levels']);
	/*Admin Role levels*/
	Route::get('designation_roles', [DesignationlevelsController::class,'designation_roles_list']);
	Route::get('designation_roles/create', [DesignationlevelsController::class,'create_designation_roles']);
	Route::post('designation_roles/store', [DesignationlevelsController::class, 'store_designation_roles']);
	Route::get('designation_roles/edit/{id}',[DesignationlevelsController::class,'edit_designation_roles']);
	Route::post('designation_roles/update',[DesignationlevelsController::class,'update_designation_roles']);
	Route::get('designation_roles/delete/{id}',[DesignationlevelsController::class,'delete_designation_roles']);

	Route::get('getrole_level',[DesignationlevelsController::class, 'getrole_level'])->name('getrole_level');

	/*Admin Notifications*/
	Route::get('notifications', [NotificationsController::class,'notifications_list']);
	Route::get('notifications/create', [NotificationsController::class,'create_notifications']);
	Route::post('notifications/store', [NotificationsController::class, 'store_notifications']);
	Route::get('notifications/edit/{id}',[NotificationsController::class,'edit_notifications']);
	Route::post('notifications/update',[NotificationsController::class,'update_notifications']);
	Route::get('notifications/delete/{id}',[NotificationsController::class,'delete_notifications']);

	/*Admin SLA Configurations*/
	Route::get('sla_configurations', [SlaConfigurationController::class,'sla_configurations_list']);
	Route::get('sla_configurations/create', [SlaConfigurationController::class,'create_sla_configurations']);
	Route::post('sla_configurations/store', [SlaConfigurationController::class, 'store_sla_configurations']);
	Route::get('sla_configurations/edit/{id}',[SlaConfigurationController::class,'edit_sla_configurations']);
	Route::post('sla_configurations/update',[SlaConfigurationController::class,'update_sla_configurations']);
	Route::get('sla_configurations/delete/{id}',[SlaConfigurationController::class,'delete_sla_configurations']);

	/*Admin C F C*/
	Route::get('notifications', [NotificationsController::class,'notifications_list']);
	Route::get('notifications/create', [NotificationsController::class,'create_notifications']);
	Route::post('notifications/store', [NotificationsController::class, 'store_notifications']);
	Route::get('notifications/edit/{id}',[NotificationsController::class,'edit_notifications']);
	Route::post('notifications/update',[NotificationsController::class,'update_notifications']);
	Route::get('notifications/delete/{id}',[NotificationsController::class,'delete_notifications']);

});

Route::post('responses/update_status', [ResponsesController::class,'response_update_status']);

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











