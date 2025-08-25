<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\DeliveryTeamController;
use App\Http\Controllers\MainDeliveryTeamController;
use App\Http\Controllers\CustomerController;
// use App\Http\Controllers\MainCustomerController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\MainSellerController;

use App\Http\Controllers\CreateNewAdminController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MainEmployeesController;

use App\Http\Controllers\RazorpayPaymentController;

//===================================== Payment routes============================================
Route::get('payment', [RazorpayPaymentController::class, 'index']);
Route::post('payment', [RazorpayPaymentController::class, 'store']);    // needed

Route::get('razorpay_payment_testing_page', [RazorpayPaymentController::class, 'razorpay_payment_testing_page'])->name('razorpay_payment_testing_page');

        // ---------------------
Route::get('/test_for_razorpay_payment', [RazorpayPaymentController::class, 'test_for_razorpay_payment'])->name('test_for_razorpay_payment');
Route::post('/test_for_razorpay_payment_form_submission', [RazorpayPaymentController::class, 'test_for_razorpay_payment_form_submission'])->name('test_for_razorpay_payment_form_submission');

Route::get('/for_apply_middleware_on_payment_button', [RazorpayPaymentController::class, 'for_apply_middleware_on_payment_button'])->name('for_apply_middleware_on_payment_button')->middleware('customerAuth');
Route::post('/payment_of_products_by_customer', [RazorpayPaymentController::class, 'payment_of_products_by_customer'])->name('payment_of_products_by_customer')->middleware('customerAuth');
Route::post('/payment_of_single_item_products_by_customer_from_cart/{id}', [RazorpayPaymentController::class, 'payment_of_single_item_products_by_customer_from_cart'])->name('payment_of_single_item_products_by_customer_from_cart')->middleware('customerAuth');
Route::post('/payment_of_multiple_item_products_by_customer_from_cart', [RazorpayPaymentController::class, 'payment_of_multiple_item_products_by_customer_from_cart'])->name('payment_of_multiple_item_products_by_customer_from_cart')->middleware('customerAuth');

//=====================================Customer routes============================================
// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {
    return view('main_initial_page');
})->name('main_page');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dumydashboard');
    })->name('dashboard');
});

//here you go...

Route::get('/lrc', [UserController::class, 'customer_reg_log'])->name('lrc');
Route::get('/missing-internet-connection', [UserController::class, 'missing_internet_connection'])->name('missing_internet_connection');
Route::get('/page-not-found', [UserController::class, 'page_not_found'])->name('page_not_found');
Route::get('/employee_confirmation_mail_inside_link_page', [UserController::class, 'employee_confirmation_mail_inside_link_page'])->name('employee_confirmation_mail_inside_link_page');

Route::get('/customers_first_window', [CustomerController::class, 'customers_first_window'])->name('customers_first_window');
route::get('/customers_first_window/main_customer_feedback_form', [CustomerController::class, 'main_customer_feedback_form'])->name('main_customer_feedback_form');
Route::get('/customer_registration_page', [CustomerController::class, 'customer_registration_page'])->name('customer_registration_page')->middleware('customerLogoutAuth');
Route::get('/customer_login_page', [CustomerController::class, 'customer_login_page'])->name('customer_login_page')->middleware('customerLogoutAuth');
Route::post('/customer_registration_form_submission_route', [CustomerController::class, 'customer_registration_form_submission_route'])->name('customer_registration_form_submission_route');
Route::post('/customer_login_form_phone_no_submission_route', [CustomerController::class, 'customer_login_form_phone_no_submission_route'])->name('customer_login_form_phone_no_submission_route');
Route::post('/customer_login_otp_verification_route', [CustomerController::class, 'customer_login_otp_verification_route'])->name('customer_login_otp_verification_route');
Route::get('/customer_otp_verification/{c_id}', [CustomerController::class, 'customer_otp_verification'])->name('customer_otp_verification');

Route::get('/logged_in_customer', [CustomerController::class, 'logged_in_customer'])->name('logged_in_customer');
Route::get('/customer_logout', [CustomerController::class, 'customer_logout'])->name('customer_logout');
Route::get('/Logout_Error', [CustomerController::class, 'Logout_Error'])->name('Logout_Error');

// ================================================= customer account (show, update, delete account) (start) =================================================
Route::get('/customer_account/{customer_id}', [CustomerController::class, 'customer_account'])->name('customer_account')->middleware('customerAuth');
route::post('/updating_customer_user_record_from_customer_page_form_submission/{id}', [CustomerController::class, 'updating_customer_user_record_from_customer_page_form_submission'])->name('updating_customer_user_record_from_customer_page_form_submission')->middleware('customerAuth');
route::post('/updating_customer_user_address_record_from_customer_page_form_submission/{id}', [CustomerController::class, 'updating_customer_user_address_record_from_customer_page_form_submission'])->name('updating_customer_user_address_record_from_customer_page_form_submission')->middleware('customerAuth');
route::get('/deleting_customer_account_from_customer/{id}', [CustomerController::class, 'deleting_customer_account_from_customer'])->name('deleting_customer_account_from_customer')->middleware('customerAuth');
// ================================================= customer account (show, update, delete account) (end) =================================================

Route::get('/customer_address/{id}', [CustomerController::class, 'customer_address'])->name('customer_address')->middleware('customerAuth');
Route::get('/order_payment/{id}', [CustomerController::class, 'order_payment'])->name('order_payment')->middleware('customerAuth');
Route::post('/storing_customer_address_form_submission/{id}', [CustomerController::class, 'storing_customer_address_form_submission'])->name('storing_customer_address_form_submission')->middleware('customerAuth');
Route::get('/customer_cart_page', [CustomerController::class, 'customer_cart_page'])->name('customer_cart_page')->middleware('customerAuth');
Route::get('/customer_orders_page', [CustomerController::class, 'customer_orders_page'])->name('customer_orders_page')->middleware('customerAuth');
Route::get('/go_to_store_customer_address_page/{id}', [CustomerController::class, 'go_to_store_customer_address_page'])->name('go_to_store_customer_address_page')->middleware('customerAuth');
Route::get('/product_details_for_order/{id}', [CustomerController::class, 'product_details_for_order'])->name('product_details_for_order')->middleware('customerAuth');
Route::get('/customer_feedback_page', [CustomerController::class, 'customer_feedback_page'])->name('customer_feedback_page')->middleware('customerAuth');
route::post('/customer_feedback_form_submission/{customer_id}', [CustomerController::class, 'customer_feedback_form_submission'])->name('customer_feedback_form_submission')->middleware('customerAuth');
route::get('/customer-feedback-submitted', [CustomerController::class, 'customer_feedback_submitted_page'])->name('customer_feedback_submitted_page')->middleware('customerAuth');


route::post('/adding_product_to_cart_from_customer/{id}', [CustomerController::class, 'adding_product_to_cart_from_customer'])->name('adding_product_to_cart_from_customer')->middleware('customerAuth');
route::post('/adding_product_to_cart_from_customer_for_buy_now/{id}', [CustomerController::class, 'adding_product_to_cart_from_customer_for_buy_now'])->name('adding_product_to_cart_from_customer_for_buy_now')->middleware('customerAuth');
route::get('/removing_product_from_cart_by_customer/{id}', [CustomerController::class, 'removing_product_from_cart_by_customer'])->name('removing_product_from_cart_by_customer')->middleware('customerAuth');
route::get('/cancel_order_from_customer/{id}', [CustomerController::class, 'cancel_order_from_customer'])->name('cancel_order_from_customer')->middleware('customerAuth');

route::get('/product/{id}', [CustomerController::class, 'product'])->name('product');  // show single product page


Route::get('/profile', [UserController::class, 'profile'])->name('profile');

route::get('/dbcon',function(){
    return view('dbcon');
});

route::post('/datainsert', [UserController::class, 'Datainsert']);
Route::post('/loginuser', [UserController::class, 'Loginuser'])->name('loginuser');
Route::get('/verification/{c_id}', [UserController::class, 'verification'])->name('verification');
Route::post('/generate', [UserController::class, 'Generate'])->name('generate');
route::get('/customer_dashboard', [UserController::class, 'customer_dashboard'])->name('customer_dashboard');
route::get('/home', [MenuController::class, 'home'])->name('home');
route::get('/about', [MenuController::class, 'about'])->name('about');
route::get('/contact', [MenuController::class, 'contact'])->name('contact');
route::get('/', [MenuController::class, 'main_initial_page'])->name('main_initial_page');
route::get('/main_contact_page', [MenuController::class, 'main_contact_page'])->name('main_contact_page');
route::get('/main_report_page', [MenuController::class, 'main_report_page'])->name('main_report_page');
route::get('/main_about_page', [MenuController::class, 'main_about_page'])->name('main_about_page');
route::get('/account', [MenuController::class, 'account'])->name('account');
route::get('/help', [MenuController::class, 'help'])->name('help');
route::get('/change_info', [MenuController::class, 'change_info'])->name('change_info');


//=====================================Seller routes============================================
Route::get('/sellers_first_window', [SellerController::class, 'sellers_first_window'])->name('sellers_first_window');
Route::get('/seller_reg_log_info_page', [UserController::class, 'seller_reg_log_info_page'])->name('seller_reg_log_info_page');
Route::get('/seller_login_page', [UserController::class, 'seller_login_page'])->name('seller_login_page')->middleware('sellerLogoutAuth');
Route::get('/seller_registration_page', [UserController::class, 'seller_registration_page'])->name('seller_registration_page')->middleware('sellerLogoutAuth');
Route::post('/seller_registration_form_submission_route', [SellerController::class, 'seller_registration_form_submission_route'])->name('seller_registration_form_submission_route');
Route::post('/seller_login_form_phone_no_submission_route', [SellerController::class, 'seller_login_form_phone_no_submission_route'])->name('seller_login_form_phone_no_submission_route');
Route::post('/seller_login_otp_verification_route', [SellerController::class, 'seller_login_otp_verification_route'])->name('seller_login_otp_verification_route');
Route::get('/seller_login_page/seller_login_username_password_verification_page', [UserController::class, 'seller_login_username_password_verification_page'])->name('seller_login_username_password_verification_page')->middleware('sellerLogoutAuth');
Route::post('/seller_login_form_un_ps_submission_route', [SellerController::class, 'seller_login_form_un_ps_submission_route'])->name('seller_login_form_un_ps_submission_route');
Route::get('/lrs', [UserController::class, 'seller_reg_log'])->name('lrs');
route::post('/datainsertseller', [UserController::class, 'datainsertseller']);
Route::post('/loginuserseller', [UserController::class, 'loginuserseller'])->name('loginuserseller');
Route::get('/verificationS/{s_id}', [UserController::class, 'verificationS'])->name('verificationS');
Route::get('/seller_otp_verification/{s_id}', [SellerController::class, 'seller_otp_verification'])->name('seller_otp_verification');
Route::post('/generateS', [UserController::class, 'generateS'])->name('generateS');
Route::post('/sellerUnPs/{s_id}', [UserController::class, 'sellerUnPs'])->name('sellerUnPs');
Route::get('/seller_un_ps/{id}', [UserController::class, 'seller_un_ps'])->name('seller_un_ps');
route::get('/seller_un_ps_verify', [UserController::class, 'seller_un_ps_verify'])->name('seller_un_ps_verify');

// route::get('/seller_dashboard', [SellerController::class, 'seller_dashboard'])->name('seller_dashboard')->middleware('sellerAuth');
route::get('/seller_dashboard', [SellerController::class, 'seller_dashboard'])->name('seller_dashboard');
route::post('/seller_un_ps_verification_method', [UserController::class, 'seller_un_ps_verification_method'])->name('seller_un_ps_verification_method');
route::get('/seller_dashboard/seller_show_product_page', [UserController::class, function(){ return view('seller_show_product_page'); }])->name('seller_show_product_page');
route::get('/seller_dashboard/seller_add_new_product_page', [UserController::class, function(){ return view('seller_add_new_product_page'); }])->name('seller_add_new_product_page');
route::get('/seller_dashboard/seller_update_product_page', [UserController::class, function(){ return view('seller_update_product_page'); }])->name('seller_update_product_page');
route::get('/seller_dashboard/seller_orders_page', [UserController::class, function(){ return view('seller_orders_page'); }])->name('seller_orders_page');
route::get('/seller_dashboard/seller_feedback_page', [UserController::class, function(){ return view('seller_feedback_page'); }])->name('seller_feedback_page');
route::get('/seller_dashboard/seller_notification_page', [UserController::class, function(){ return view('seller_notification_page'); }])->name('seller_notification_page');
route::get('/seller_dashboard/seller_profile_page', [UserController::class, function(){ return view('seller_profile_page'); }])->name('seller_profile_page');
route::get('/seller_dashboard/seller_settings_page', [UserController::class, function(){ return view('seller_settings_page'); }])->name('seller_settings_page');
route::get('/seller_dashboard/seller_help_page', [UserController::class, function(){ return view('seller_help_page'); }])->name('seller_help_page');
route::get('/seller_dashboard/seller_about_us_page', [UserController::class, function(){ return view('seller_about_us_page'); }])->name('seller_about_us_page');
route::get('/seller_dashboard/seller_contact_us_page', [UserController::class, function(){ return view('seller_contact_us_page'); }])->name('seller_contact_us_page');

Route::get('/seller_logout', [SellerController::class, 'seller_logout'])->name('seller_logout')->middleware('sellerAuth');


//=====================================Admin routes============================================
Route::get('/admin_login_username_password_verification_page', [AdminController::class, 'admin_login_username_password_verification_page'])->name('admin_login_username_password_verification_page');
route::post('/admin_login_form_un_ps_submission_route', [AdminController::class, 'admin_login_form_un_ps_submission_route'])->name('admin_login_form_un_ps_submission_route');

Route::get('/admin_logout', [AdminController::class, 'admin_logout'])->name('admin_logout');

route::get('/main_contact_page/captcha_verification_page', [AdminController::class, 'captcha_verification_page'])->name('captcha_verification_page');
route::get('/main_contact_page/captcha_verification_page/captcha_submitted_page', [AdminController::class, 'captcha_submitted_page'])->name('captcha_submitted_page');
route::get('/admin_verify_un_ps', [AdminController::class, 'admin_verify_un_ps'])->name('admin_verify_un_ps');
route::post('/admin_un_ps_verification_method', [AdminController::class, 'admin_un_ps_verification_method'])->name('admin_un_ps_verification_method');
route::get('/dummy_dashboard', [AdminController::class, 'dummy_dashboard'])->name('dummy_dashboard');
route::get('/dummy_dashboard_copy', [AdminController::class, 'dummy_dashboard_copy'])->name('dummy_dashboard_copy');
route::get('/admin_dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');
route::get('/admin_dashboard/admin_show_users_page', [AdminController::class, function(){ return view('admin_show_users_page'); }])->name('admin_show_users_page');
route::get('/admin_dashboard/admin_show_products_page', [AdminController::class, function(){ return view('admin_show_products_page'); }])->name('admin_show_products_page');
route::get('/admin_dashboard/admin_show_categories_page', [AdminController::class, function(){ return view('admin_show_categories_page'); }])->name('admin_show_categories_page');
route::get('/admin_dashboard/admin_add_new_category_page', [AdminController::class, function(){ return view('admin_add_new_category_page'); }])->name('admin_add_new_category_page');
route::get('/admin_dashboard/admin_update_category_page', [AdminController::class, function(){ return view('admin_update_category_page'); }])->name('admin_update_category_page');
route::get('/admin_dashboard/admin_show_orders_page', [AdminController::class, function(){ return view('admin_show_orders_page'); }])->name('admin_show_orders_page');
route::get('/admin_dashboard/admin_notifications_page', [AdminController::class, function(){ return view('admin_notifications_page'); }])->name('admin_notifications_page');
route::get('/admin_dashboard/admin_feedbacks_page', [AdminController::class, function(){ return view('admin_feedbacks_page'); }])->name('admin_feedbacks_page');
route::get('/admin_dashboard/admin_communication_page', [AdminController::class, function(){ return view('admin_communication_page'); }])->name('admin_communication_page');
route::get('/admin_dashboard/admin_show_income_page', [AdminController::class, function(){ return view('admin_show_income_page'); }])->name('admin_show_income_page');
route::get('/admin_dashboard/admin_show_expenses_page', [AdminController::class, function(){ return view('admin_show_expenses_page'); }])->name('admin_show_expenses_page');
route::get('/admin_dashboard/admin_analytics_page', [AdminController::class, function(){ return view('admin_analytics_page'); }])->name('admin_analytics_page');
route::get('/admin_dashboard/admin_profile_page', [AdminController::class, function(){ return view('admin_profile_page'); }])->name('admin_profile_page');
route::get('/admin_dashboard/admin_settings_page', [AdminController::class, function(){ return view('admin_settings_page'); }])->name('admin_settings_page');
route::get('/admin_dashboard/admin_customization_page', [AdminController::class, function(){ return view('admin_customization_page'); }])->name('admin_customization_page');
route::get('/admin_dashboard/admin_help_page', [AdminController::class, function(){ return view('admin_help_page'); }])->name('admin_help_page');

// ===========================================main_admin_routes=========================================

Route::get('/secret_url_for_create_admin', [CreateNewAdminController::class, 'createAdmin'])->name('secret_url_for_create_admin');



// ================================================= ADMIN account (show, update, delete account) (start) =================================================
Route::get('/admin_account/{admin_id}', [MainAdminController::class, 'admin_account'])->name('admin_account')->middleware('adminAuth');
route::post('/updating_admin_user_record_from_admin_page_form_submission/{id}', [MainAdminController::class, 'updating_admin_user_record_from_admin_page_form_submission'])->name('updating_admin_user_record_from_admin_page_form_submission')->middleware('adminAuth');
Route::get('/sending_email_for_verify_admin_user/{admin_id}', [MainAdminController::class, 'sending_email_for_verify_admin_user'])->name('sending_email_for_verify_admin_user')->middleware('adminAuth');
route::post('/verifying_admin_email_verification_code_form_submission/{id}', [MainAdminController::class, 'verifying_admin_email_verification_code_form_submission'])->name('verifying_admin_email_verification_code_form_submission')->middleware('adminAuth');
route::get('/deleting_admin_account_from_admin/{id}', [MainAdminController::class, 'deleting_admin_account_from_admin'])->name('deleting_admin_account_from_admin')->middleware('adminAuth');
// ================================================= ADMIN account (show, update, delete account) (end) =================================================


route::get('/main_admin_dashboard', [AdminController::class, 'main_admin_dashboard'])->name('main_admin_dashboard')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_customers_page', [MainAdminController::class, 'main_admin_dashboard_show_customers_page'])->name('main_admin_dashboard_show_customers_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_sellers_page', [MainAdminController::class, 'main_admin_dashboard_show_sellers_page'])->name('main_admin_dashboard_show_sellers_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_delivery_team_page', [MainAdminController::class, 'main_admin_dashboard_show_delivery_team_page'])->name('main_admin_dashboard_show_delivery_team_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_products_page', [MainAdminController::class, 'main_admin_dashboard_show_products_page'])->name('main_admin_dashboard_show_products_page')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_update_product_page/{id}', [MainAdminController::class, 'main_admin_dashboard_update_product_page'])->name('main_admin_dashboard_update_product_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_update_product_page/{id}/show_main_image_to_admin_for_update_product_page/{product_id}', [MainAdminController::class, 'show_main_image_to_admin_for_update_product_page'])->name('show_main_image_to_admin_for_update_product_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_update_product_page/{id}/show_other_images_to_admin_for_update_product_page/{product_id}', [MainAdminController::class, 'show_other_images_to_admin_for_update_product_page'])->name('show_other_images_to_admin_for_update_product_page')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_show_categories_page', [MainAdminController::class, 'main_admin_dashboard_show_categories_page'])->name('main_admin_dashboard_show_categories_page')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_show_categories_page_with_alert', [MainAdminController::class, 'main_admin_dashboard_show_categories_page_with_alert'])->name('main_admin_dashboard_show_categories_page_with_alert')->middleware('adminAuth');

route::get('/checking_email', [MainAdminController::class, 'check_mailing']);

route::get('/main_admin_dashboard/main_admin_dashboard_show_sections_page', [MainAdminController::class, 'main_admin_dashboard_show_sections_page'])->name('main_admin_dashboard_show_sections_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_add_new_section_page', [MainAdminController::class, 'main_admin_dashboard_add_new_section_page'])->name('main_admin_dashboard_add_new_section_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_update_section_page/{id}', [MainAdminController::class, 'main_admin_dashboard_update_section_page'])->name('main_admin_dashboard_update_section_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_sections_page_with_alert', [MainAdminController::class, 'main_admin_dashboard_show_sections_page_with_alert'])->name('main_admin_dashboard_show_sections_page_with_alert')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_add_new_category_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_add_new_category_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_add_new_category_page')->middleware('adminAuth');
// route::get('/main_admin_dashboard/main_admin_dashboard_update_category_page', [MainAdminController::class, 'main_admin_dashboard_update_category_page'])->name('main_admin_dashboard_update_category_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_pending_orders_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_pending_orders_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_pending_orders_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_complated_orders_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_complated_orders_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_complated_orders_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_exchanged_orders_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_exchanged_orders_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_exchanged_orders_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_returned_orders_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_returned_orders_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_returned_orders_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_cancelled_orders_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_cancelled_orders_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_cancelled_orders_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_customers_feedbacks_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_customers_feedbacks_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_customers_feedbacks_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_sellers_feedbacks_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_sellers_feedbacks_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_sellers_feedbacks_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_delivery_team_feedbacks_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_delivery_team_feedbacks_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_delivery_team_feedbacks_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_communication_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_communication_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_communication_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_income_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_income_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_income_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_expenses_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_expenses_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_expenses_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_analytics_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_analytics_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_analytics_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_show_settings_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_show_settings_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_show_settings_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_customization_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_customization_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_customization_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_help_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_help_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_help_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_documentation_page', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_documentation_page', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_documentation_page')->middleware('adminAuth');


route::get('/main_admin_dashboard/main_admin_dashboard_page_for_updating_customer_record_from_admin/{id}', [MainAdminController::class, 'main_admin_dashboard_page_for_updating_customer_record_from_admin'])->name('main_admin_dashboard_page_for_updating_customer_record_from_admin')->middleware('adminAuth');
route::get('/main_admin_dashboard/deleting_customer_record_from_admin/{id}', [MainAdminController::class, 'deleting_customer_record_from_admin'])->name('deleting_customer_record_from_admin')->middleware('adminAuth');
route::post('/updating_customer_user_record_from_admin_page_form_submission/{id}', [MainAdminController::class, 'updating_customer_user_record_from_admin_page_form_submission'])->name('updating_customer_user_record_from_admin_page_form_submission')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_page_for_updating_seller_record_from_admin/{id}', [MainAdminController::class, 'main_admin_dashboard_page_for_updating_seller_record_from_admin'])->name('main_admin_dashboard_page_for_updating_seller_record_from_admin')->middleware('adminAuth');
route::get('/main_admin_dashboard/deleting_seller_record_from_admin/{id}', [MainAdminController::class, 'deleting_seller_record_from_admin'])->name('deleting_seller_record_from_admin')->middleware('adminAuth');
Route::get('/document_viewer/{id}', [MainAdminController::class, 'document_viewer'])->name('document_viewer');
route::post('/updating_seller_user_record_from_admin_page_form_submission/{id}', [MainAdminController::class, 'updating_seller_user_record_from_admin_page_form_submission'])->name('updating_seller_user_record_from_admin_page_form_submission')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_products_record', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_nothing_to_show_in_products_record', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_nothing_to_show_in_products_record')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_categories_record', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_nothing_to_show_in_categories_record', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_nothing_to_show_in_categories_record')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_sections_record', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_nothing_to_show_in_sections_record', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_nothing_to_show_in_sections_record')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_customers_record', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_nothing_to_show_in_customers_record', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_nothing_to_show_in_customers_record')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_selles_record', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_nothing_to_show_in_selles_record', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_nothing_to_show_in_selles_record')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_employees_application_record', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_nothing_to_show_in_employees_application_record', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_nothing_to_show_in_employees_application_record')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_confirmed_employees_application_record', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_nothing_to_show_in_confirmed_employees_application_record', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_nothing_to_show_in_confirmed_employees_application_record')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_joined_employees_record', [MainAdminController::class, function(){ $admin_session = Session::get('admin_session'); return view('main_admin_dashboard_nothing_to_show_in_joined_employees_record', ['admin_session' => $admin_session]); }])->name('main_admin_dashboard_nothing_to_show_in_joined_employees_record')->middleware('adminAuth');


route::get('/main_admin_dashboard/main_admin_dashboard_show_all_employee_application_page', [MainAdminController::class, 'main_admin_dashboard_show_all_employee_application_page'])->name('main_admin_dashboard_show_all_employee_application_page')->middleware('adminAuth');
Route::get('/employee_photo_viewer/{id}', [MainAdminController::class, 'employee_photo_viewer'])->name('employee_photo_viewer')->middleware('adminAuth');
Route::get('/employee_addharcard_viewer/{id}', [MainAdminController::class, 'employee_addharcard_viewer'])->name('employee_addharcard_viewer')->middleware('adminAuth');
Route::get('/employee_proof_of_percentage_of_twelve_viewer/{id}', [MainAdminController::class, 'employee_proof_of_percentage_of_twelve_viewer'])->name('employee_proof_of_percentage_of_twelve_viewer')->middleware('adminAuth');
Route::get('/employee_proof_of_bank_account_ownership_viewer/{id}', [MainAdminController::class, 'employee_proof_of_bank_account_ownership_viewer'])->name('employee_proof_of_bank_account_ownership_viewer')->middleware('adminAuth');
Route::get('/employee_proof_of_experience_viewer/{id}', [MainAdminController::class, 'employee_proof_of_experience_viewer'])->name('employee_proof_of_experience_viewer')->middleware('adminAuth');
route::get('/confirming_employee_application_from_admin/{id}', [MainAdminController::class, 'confirming_employee_application_from_admin'])->name('confirming_employee_application_from_admin')->middleware('adminAuth');
route::get('/unconfirming_employee_application_from_admin/{id}', [MainAdminController::class, 'unconfirming_employee_application_from_admin'])->name('unconfirming_employee_application_from_admin')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_show_all_confirmed_employee_application_page', [MainAdminController::class, 'main_admin_dashboard_show_all_confirmed_employee_application_page'])->name('main_admin_dashboard_show_all_confirmed_employee_application_page')->middleware('adminAuth');
Route::get('/confirmed_employee_photo_viewer/{id}', [MainAdminController::class, 'confirmed_employee_photo_viewer'])->name('confirmed_employee_photo_viewer')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_show_all_joined_employees_page', [MainAdminController::class, 'main_admin_dashboard_show_all_joined_employees_page'])->name('main_admin_dashboard_show_all_joined_employees_page')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_employee_confirmed_successfully_page', [MainAdminController::class, 'main_admin_dashboard_employee_confirmed_successfully_page'])->name('main_admin_dashboard_employee_confirmed_successfully_page')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_show_all_initial_delivery_team_applications_page', [MainAdminController::class, 'main_admin_dashboard_show_all_initial_delivery_team_applications_page'])->name('main_admin_dashboard_show_all_initial_delivery_team_applications_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_initial_delivery_team_applications', [MainAdminController::class, 'main_admin_dashboard_nothing_to_show_in_initial_delivery_team_applications'])->name('main_admin_dashboard_nothing_to_show_in_initial_delivery_team_applications')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page', [MainAdminController::class, 'main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page'])->name('main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_emp_page', [MainAdminController::class, 'main_admin_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_emp_page'])->name('main_admin_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_emp_page')->middleware('adminAuth');
Route::get('/delivery_team_application_photo_viewer_ADMIN/{id}', [MainAdminController::class, 'delivery_team_application_photo_viewer_ADMIN'])->name('delivery_team_application_photo_viewer_ADMIN');
route::get('/confirming_delivery_team_application_from_admin_first_step/{id}', [MainAdminController::class, 'confirming_delivery_team_application_from_admin_first_step'])->name('confirming_delivery_team_application_from_admin_first_step');
Route::get('/main_admin_dashboard/main_admin_dashboard_delivery_team_application_first_confirmed_successfully_page', [MainAdminController::class, 'main_admin_dashboard_delivery_team_application_first_confirmed_successfully_page'])->name('main_admin_dashboard_delivery_team_application_first_confirmed_successfully_page');
Route::get('/main_admin_dashboard/main_admin_dashboard_delivery_team_application_first_unconfirmed_successfully_page', [MainAdminController::class, 'main_admin_dashboard_delivery_team_application_first_unconfirmed_successfully_page'])->name('main_admin_dashboard_delivery_team_application_first_unconfirmed_successfully_page');
Route::get('/main_admin_dashboard/unconfirming_delivery_team_application_from_admin_first_step/{id}', [MainAdminController::class, 'unconfirming_delivery_team_application_from_admin_first_step'])->name('unconfirming_delivery_team_application_from_admin_first_step');

route::get('/main_admin_dashboard/main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page', [MainAdminController::class, 'main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page'])->name('main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_admin_page', [MainAdminController::class, 'main_admin_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_admin_page'])->name('main_admin_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_admin_page')->middleware('adminAuth');

route::get('/main_admin_dashboard/main_admin_dashboard_show_all_delivery_team_applications_eligible_by_employee_page', [MainAdminController::class, 'main_admin_dashboard_show_all_delivery_team_applications_eligible_by_employee_page'])->name('main_admin_dashboard_show_all_delivery_team_applications_eligible_by_employee_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_employee_page', [MainAdminController::class, 'main_admin_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_employee_page'])->name('main_admin_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_employee_page')->middleware('adminAuth');
route::get('/confirming_delivery_team_application_from_admin_second_step/{id}', [MainAdminController::class, 'confirming_delivery_team_application_from_admin_second_step'])->name('confirming_delivery_team_application_from_admin_second_step');

route::get('/main_admin_dashboard/main_admin_dashboard_show_all_delivery_team_applications_eligible_by_admin_page', [MainAdminController::class, 'main_admin_dashboard_show_all_delivery_team_applications_eligible_by_admin_page'])->name('main_admin_dashboard_show_all_delivery_team_applications_eligible_by_admin_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_admin_page', [MainAdminController::class, 'main_admin_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_admin_page'])->name('main_admin_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_admin_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_delivery_team_page_admin_page', [MainAdminController::class, 'main_admin_dashboard_nothing_to_show_in_delivery_team_page_admin_page'])->name('main_admin_dashboard_nothing_to_show_in_delivery_team_page_admin_page')->middleware('adminAuth');
route::get('/unconfirming_delivery_team_application_from_admin_second_step/{id}', [MainAdminController::class, 'unconfirming_delivery_team_application_from_admin_second_step'])->name('unconfirming_delivery_team_application_from_admin_second_step');

route::get('/main_admin_dashboard/main_admin_dashboard_show_current_delivery_team_page', [MainAdminController::class, 'main_admin_dashboard_show_current_delivery_team_page'])->name('main_admin_dashboard_show_current_delivery_team_page')->middleware('adminAuth');
route::get('/main_admin_dashboard/main_admin_dashboard_nothing_to_show_in_current_delivery_team_page', [MainAdminController::class, 'main_admin_dashboard_nothing_to_show_in_current_delivery_team_page'])->name('main_admin_dashboard_nothing_to_show_in_current_delivery_team_page')->middleware('adminAuth');

// ==========================admin access
route::post('/adding_new_catagory', [MainAdminController::class, 'adding_new_catagory'])->name('adding_new_catagory');
route::get('/delete_category/{id}', [MainAdminController::class, 'delete_category'])->name('delete_category');
route::get('/update_category/{id}', [MainAdminController::class, 'update_category'])->name('update_category');
route::post('/updating_new_catagory/{id}', [MainAdminController::class, 'updating_new_catagory'])->name('updating_new_catagory');
route::post('/adding_new_section', [MainAdminController::class, 'adding_new_section'])->name('adding_new_section');
route::get('/delete_section/{id}', [MainAdminController::class, 'delete_section'])->name('delete_section');
route::post('/updating_new_section/{id}', [MainAdminController::class, 'updating_new_section'])->name('updating_new_section');
route::get('/delete_product_from_admin/{id}', [MainAdminController::class, 'delete_product_from_admin'])->name('delete_product_from_admin');
Route::post('/admin_update_products_form_submission_route/{id}', [MainAdminController::class, 'admin_update_products_form_submission_route'])->name('admin_update_products_form_submission_route');

route::get('/deleting_delivery_team_member_record_from_admin/{id}', [MainAdminController::class, 'deleting_delivery_team_member_record_from_admin'])->name('deleting_delivery_team_member_record_from_admin');

//===================================Main seller dashboard routes

// ================================================= seller account (show, update, delete account) (start) =================================================
Route::get('/seller_account/{seller_id}', [MainSellerController::class, 'seller_account'])->name('seller_account')->middleware('sellerAuth');
route::post('/updating_seller_user_record_from_seller_page_form_submission/{id}', [MainSellerController::class, 'updating_seller_user_record_from_seller_page_form_submission'])->name('updating_seller_user_record_from_seller_page_form_submission')->middleware('sellerAuth');
Route::get('/sending_email_for_verify_seller_user/{seller_id}', [MainSellerController::class, 'sending_email_for_verify_seller_user'])->name('sending_email_for_verify_seller_user')->middleware('sellerAuth');
route::post('/verifying_seller_email_verification_code_form_submission/{id}', [MainSellerController::class, 'verifying_seller_email_verification_code_form_submission'])->name('verifying_seller_email_verification_code_form_submission')->middleware('sellerAuth');
route::get('/deleting_seller_account_from_seller/{id}', [MainSellerController::class, 'deleting_seller_account_from_seller'])->name('deleting_seller_account_from_seller')->middleware('sellerAuth');
route::get('/showing_proof_of_bank_account_ownership_to_seller_for_account/{id}', [MainSellerController::class, 'showing_proof_of_bank_account_ownership_to_seller_for_account'])->name('showing_proof_of_bank_account_ownership_to_seller_for_account')->middleware('sellerAuth');
// ================================================= seller account (show, update, delete account) (end) =================================================


route::get('/main_seller_dashboard', [MainSellerController::class, 'main_seller_dashboard'])->name('main_seller_dashboard')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_all_products_page', [MainSellerController::class, 'main_seller_dashboard_show_all_products_page'])->name('main_seller_dashboard_show_all_products_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_add_new_product_page', [MainSellerController::class, 'main_seller_dashboard_add_new_product_page'])->name('main_seller_dashboard_add_new_product_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_update_product_page/{id}', [MainSellerController::class, 'main_seller_dashboard_update_product_page'])->name('main_seller_dashboard_update_product_page')->middleware('sellerAuth');

route::get('/main_seller_dashboard/main_seller_dashboard_show_all_products_page_with_alert', [MainSellerController::class, 'main_seller_dashboard_show_all_products_page_with_alert'])->name('main_seller_dashboard_show_all_products_page_with_alert')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_update_product_page/{id}/show_main_image_for_update_product_page/{product_id}', [MainSellerController::class, 'show_main_image_for_update_product_page'])->name('show_main_image_for_update_product_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_update_product_page/{id}/show_other_images_for_update_product_page/{product_id}', [MainSellerController::class, 'show_other_images_for_update_product_page'])->name('show_other_images_for_update_product_page')->middleware('sellerAuth');

route::get('/main_seller_dashboard/main_seller_dashboard_show_new_orders_page', [MainSellerController::class, 'main_seller_dashboard_show_new_orders_page'])->name('main_seller_dashboard_show_new_orders_page')->middleware('sellerAuth');
route::get('/accept_order_from_seller/{id}', [MainSellerController::class, 'accept_order_from_seller'])->name('accept_order_from_seller')->middleware('sellerAuth');
route::get('/mark_order_as_ready_from_seller/{id}', [MainSellerController::class, 'mark_order_as_ready_from_seller'])->name('mark_order_as_ready_from_seller')->middleware('sellerAuth');
route::get('/mark_order_as_pending_from_seller/{id}', [MainSellerController::class, 'mark_order_as_pending_from_seller'])->name('mark_order_as_pending_from_seller')->middleware('sellerAuth');
route::get('/cancel_order_from_seller/{id}', [MainSellerController::class, 'cancel_order_from_seller'])->name('cancel_order_from_seller')->middleware('sellerAuth');
route::get('/get_order_in_order_list_from_cancelled_orders_from_seller/{id}', [MainSellerController::class, 'get_order_in_order_list_from_cancelled_orders_from_seller'])->name('get_order_in_order_list_from_cancelled_orders_from_seller')->middleware('sellerAuth');
route::get('/Cancel_order_Acceptance_from_seller/{id}', [MainSellerController::class, 'Cancel_order_Acceptance_from_seller'])->name('Cancel_order_Acceptance_from_seller')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_pending_orders_page', [MainSellerController::class, 'main_seller_dashboard_show_pending_orders_page'])->name('main_seller_dashboard_show_pending_orders_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_marked_as_ready_orders_page', [MainSellerController::class, 'main_seller_dashboard_show_marked_as_ready_orders_page'])->name('main_seller_dashboard_show_marked_as_ready_orders_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_shipped_orders_page', [MainSellerController::class, 'main_seller_dashboard_show_shipped_orders_page'])->name('main_seller_dashboard_show_shipped_orders_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_cancelled_orders_page', [MainSellerController::class, 'main_seller_dashboard_show_cancelled_orders_page'])->name('main_seller_dashboard_show_cancelled_orders_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_completed_orders_page', [MainSellerController::class, 'main_seller_dashboard_show_completed_orders_page'])->name('main_seller_dashboard_show_completed_orders_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_total_stock_page', [MainSellerController::class, 'main_seller_dashboard_show_total_stock_page'])->name('main_seller_dashboard_show_total_stock_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_update_stock_page', [MainSellerController::class, 'main_seller_dashboard_update_stock_page'])->name('main_seller_dashboard_update_stock_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_payment_notifications_page', [MainSellerController::class, 'main_seller_dashboard_show_payment_notifications_page'])->name('main_seller_dashboard_show_payment_notifications_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_income_page', [MainSellerController::class, 'main_seller_dashboard_show_income_page'])->name('main_seller_dashboard_show_income_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_new_exchange_request_page', [MainSellerController::class, 'main_seller_dashboard_show_new_exchange_request_page'])->name('main_seller_dashboard_show_new_exchange_request_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_new_return_request_page', [MainSellerController::class, 'main_seller_dashboard_show_new_return_request_page'])->name('main_seller_dashboard_show_new_return_request_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_exchanged_orders_page', [MainSellerController::class, 'main_seller_dashboard_show_exchanged_orders_page'])->name('main_seller_dashboard_show_exchanged_orders_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_returned_orders_page', [MainSellerController::class, 'main_seller_dashboard_show_returned_orders_page'])->name('main_seller_dashboard_show_returned_orders_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_order_notification_page', [MainSellerController::class, 'main_seller_dashboard_show_order_notification_page'])->name('main_seller_dashboard_show_order_notification_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_other_notification_page', [MainSellerController::class, 'main_seller_dashboard_show_other_notification_page'])->name('main_seller_dashboard_show_other_notification_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_show_customers_feedback_page', [MainSellerController::class, 'main_seller_dashboard_show_customers_feedback_page'])->name('main_seller_dashboard_show_customers_feedback_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_customer_communication_by_mail_page', [MainSellerController::class, 'main_seller_dashboard_customer_communication_by_mail_page'])->name('main_seller_dashboard_customer_communication_by_mail_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_admin_communication_by_mail_page', [MainSellerController::class, 'main_seller_dashboard_admin_communication_by_mail_page'])->name('main_seller_dashboard_admin_communication_by_mail_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_settings_page', [MainSellerController::class, 'main_seller_dashboard_settings_page'])->name('main_seller_dashboard_settings_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_help_page', [MainSellerController::class, 'main_seller_dashboard_help_page'])->name('main_seller_dashboard_help_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_about_us_page', [MainSellerController::class, 'main_seller_dashboard_about_us_page'])->name('main_seller_dashboard_about_us_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_contact_us_page', [MainSellerController::class, 'main_seller_dashboard_contact_us_page'])->name('main_seller_dashboard_contact_us_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_documentation_page', [MainSellerController::class, 'main_seller_dashboard_documentation_page'])->name('main_seller_dashboard_documentation_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_profile_page', [MainSellerController::class, 'main_seller_dashboard_profile_page'])->name('main_seller_dashboard_profile_page')->middleware('sellerAuth');
route::get('/main_seller_dashboard/main_seller_dashboard_customization_page', [MainSellerController::class, 'main_seller_dashboard_customization_page'])->name('main_seller_dashboard_customization_page')->middleware('sellerAuth');

route::get('/main_seller_dashboard/main_seller_dashboard_nothing_to_show_in_products_record', [MainSellerController::class, 'main_seller_dashboard_nothing_to_show_in_products_record'])->name('main_seller_dashboard_nothing_to_show_in_products_record')->middleware('sellerAuth');

Route::get('/sellers_feedback_page', [SellerController::class, 'sellers_feedback_page'])->name('sellers_feedback_page')->middleware('sellerAuth');
route::post('/sellers_feedback_form_submission/{seller_id}', [SellerController::class, 'sellers_feedback_form_submission'])->name('sellers_feedback_form_submission')->middleware('sellerAuth');

//=============== seller access
Route::post('/seller_add_new_products_form_submission_route', [MainSellerController::class, 'seller_add_new_products_form_submission_route'])->name('seller_add_new_products_form_submission_route');
route::get('/delete_product_from_seller/{id}', [MainSellerController::class, 'delete_product_from_seller'])->name('delete_product_from_seller');
Route::post('/seller_update_products_form_submission_route/{id}', [MainSellerController::class, 'seller_update_products_form_submission_route'])->name('seller_update_products_form_submission_route');



//============================================== Employees routes ==============================================
route::get('/employees_first_window', [EmployeesController::class, 'employees_first_window'])->name('employees_first_window');
route::get('/employee_application_page', [EmployeesController::class, 'employee_application_page'])->name('employee_application_page')->middleware('employeeLogoutAuth');
route::get('/employee_confirm_account_page', [EmployeesController::class, 'employee_confirm_account_page'])->name('employee_confirm_account_page');
route::get('/employee_login_page_first_step', [EmployeesController::class, 'employee_login_page_first_step'])->name('employee_login_page_first_step')->middleware('employeeLogoutAuth');
route::get('/employee_login_page_second_step/{id}', [EmployeesController::class, 'employee_login_page_second_step'])->name('employee_login_page_second_step')->middleware('employeeLogoutAuth');
Route::post('/employee_application_form_submission_route', [EmployeesController::class, 'employee_application_form_submission_route'])->name('employee_application_form_submission_route');
route::get('/employee_application_page/employee_application_submitted_page', [EmployeesController::class, 'employee_application_submitted_page'])->name('employee_application_submitted_page');

Route::get('/confirmed_employee_account_creation_first_page', [EmployeesController::class, 'confirmed_employee_account_creation_first_page'])->name('confirmed_employee_account_creation_first_page')->middleware('employeeLogoutAuth');
Route::post('/employee_account_creation_first_step_submission_route', [EmployeesController::class, 'employee_account_creation_first_step_submission_route'])->name('employee_account_creation_first_step_submission_route');

Route::get('/confirmed_employee_account_creation_second_page/{emp_id}', [EmployeesController::class, 'confirmed_employee_account_creation_second_page'])->name('confirmed_employee_account_creation_second_page')->middleware('employeeLogoutAuth');
Route::post('/employee_account_creation_second_step_submission_route/{emp_id}', [EmployeesController::class, 'employee_account_creation_second_step_submission_route'])->name('employee_account_creation_second_step_submission_route');

route::get('/employee_username_password_created_successfully_page', [EmployeesController::class, 'employee_username_password_created_successfully_page'])->name('employee_username_password_created_successfully_page')->middleware('employeeLogoutAuth');
Route::post('/employee_login_form_phone_no_submission_route', [EmployeesController::class, 'employee_login_form_phone_no_submission_route'])->name('employee_login_form_phone_no_submission_route');
Route::get('/employee_otp_verification/{e_id}', [EmployeesController::class, 'employee_otp_verification'])->name('employee_otp_verification');
Route::post('/employee_login_otp_verification_route', [EmployeesController::class, 'employee_login_otp_verification_route'])->name('employee_login_otp_verification_route');
Route::post('/employee_login_form_un_ps_submission_route/{id}', [EmployeesController::class, 'employee_login_form_un_ps_submission_route'])->name('employee_login_form_un_ps_submission_route');
Route::get('/employee_logout', [EmployeesController::class, 'employee_logout'])->name('employee_logout');


Route::get('/main_employee_dashboard', [MainEmployeesController::class, 'main_employee_dashboard'])->name('main_employee_dashboard')->middleware('employeeAuth');

Route::get('/main_employee_dashboard/main_employee_dashboard_show_all_initial_applications_of_delivery_team_page', [MainEmployeesController::class, 'main_employee_dashboard_show_all_initial_applications_of_delivery_team_page'])->name('main_employee_dashboard_show_all_initial_applications_of_delivery_team_page')->middleware('employeeAuth');
Route::get('/main_employee_dashboard/main_employee_dashboard_nothing_to_show_in_initial_delivery_team_applications', [MainEmployeesController::class, 'main_employee_dashboard_nothing_to_show_in_initial_delivery_team_applications'])->name('main_employee_dashboard_nothing_to_show_in_initial_delivery_team_applications')->middleware('employeeAuth');
Route::get('/main_employee_dashboard/main_employee_dashboard_delivery_team_application_first_confirmed_successfully_page', [MainEmployeesController::class, 'main_employee_dashboard_delivery_team_application_first_confirmed_successfully_page'])->name('main_employee_dashboard_delivery_team_application_first_confirmed_successfully_page')->middleware('employeeAuth');
Route::get('/main_employee_dashboard/main_employee_dashboard_delivery_team_application_first_unconfirmed_successfully_page', [MainEmployeesController::class, 'main_employee_dashboard_delivery_team_application_first_unconfirmed_successfully_page'])->name('main_employee_dashboard_delivery_team_application_first_unconfirmed_successfully_page')->middleware('employeeAuth');

Route::get('/main_employee_dashboard/main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page', [MainEmployeesController::class, 'main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page'])->name('main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page')->middleware('employeeAuth');
route::get('/main_employee_dashboard/main_employee_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_emp_page', [MainEmployeesController::class, 'main_employee_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_emp_page'])->name('main_employee_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_emp_page')->middleware('employeeAuth');

Route::get('/main_employee_dashboard/main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page', [MainEmployeesController::class, 'main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page'])->name('main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page')->middleware('employeeAuth');
route::get('/main_employee_dashboard/main_employee_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_admin_page', [MainEmployeesController::class, 'main_employee_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_admin_page'])->name('main_employee_dashboard_nothing_to_show_in_delivery_team_applications_confirmed_by_admin_page')->middleware('employeeAuth');

Route::get('/delivery_team_application_photo_viewer/{id}', [MainEmployeesController::class, 'delivery_team_application_photo_viewer'])->name('delivery_team_application_photo_viewer');
Route::get('/delivery_team_application_addharcard_viewer/{id}', [MainEmployeesController::class, 'delivery_team_application_addharcard_viewer'])->name('delivery_team_application_addharcard_viewer');

Route::get('/delivery_team_application_vehicle_RC_book_viewer/{id}', [MainEmployeesController::class, 'delivery_team_application_vehicle_RC_book_viewer'])->name('delivery_team_application_vehicle_RC_book_viewer');
Route::get('/delivery_team_application_vehicle_PUC_viewer/{id}', [MainEmployeesController::class, 'delivery_team_application_vehicle_PUC_viewer'])->name('delivery_team_application_vehicle_PUC_viewer');
Route::get('/delivery_team_application_vehicle_Licence_viewer/{id}', [MainEmployeesController::class, 'delivery_team_application_vehicle_Licence_viewer'])->name('delivery_team_application_vehicle_Licence_viewer');
Route::get('/delivery_team_application_vehicle_Insurance_viewer/{id}', [MainEmployeesController::class, 'delivery_team_application_vehicle_Insurance_viewer'])->name('delivery_team_application_vehicle_Insurance_viewer');
Route::get('/delivery_team_application_proof_of_bank_account_ownership_viewer/{id}', [MainEmployeesController::class, 'delivery_team_application_proof_of_bank_account_ownership_viewer'])->name('delivery_team_application_proof_of_bank_account_ownership_viewer');
Route::get('/delivery_team_application_proof_of_experience_viewer/{id}', [MainEmployeesController::class, 'delivery_team_application_proof_of_experience_viewer'])->name('delivery_team_application_proof_of_experience_viewer');
Route::get('/delivery_team_application_proof_of_test_document_viewer/{id}', [MainEmployeesController::class, 'delivery_team_application_proof_of_test_document_viewer'])->name('delivery_team_application_proof_of_test_document_viewer');


route::get('/confirming_delivery_team_application_from_employee_first_step/{id}', [MainEmployeesController::class, 'confirming_delivery_team_application_from_employee_first_step'])->name('confirming_delivery_team_application_from_employee_first_step');
route::get('/unconfirming_delivery_team_application_from_employee_first_step/{id}', [MainEmployeesController::class, 'unconfirming_delivery_team_application_from_employee_first_step'])->name('unconfirming_delivery_team_application_from_employee_first_step');
route::get('/main_employee_dashboard/contacting_to_the_delivery_team_applicant_from_emp/{id}', [MainEmployeesController::class, 'contacting_to_the_delivery_team_applicant_from_emp'])->name('contacting_to_the_delivery_team_applicant_from_emp');
Route::get('/main_employee_dashboard/main_employee_dashboard_mail_sent_successfully_to_the_delivery_boy_for_contact/{id}', [MainEmployeesController::class, 'main_employee_dashboard_mail_sent_successfully_to_the_delivery_boy_for_contact'])->name('main_employee_dashboard_mail_sent_successfully_to_the_delivery_boy_for_contact');

route::post('/confirming_delivery_team_application_from_employee_second_step/{id}', [MainEmployeesController::class, 'confirming_delivery_team_application_from_employee_second_step'])->name('confirming_delivery_team_application_from_employee_second_step');
Route::get('/main_employee_dashboard/main_employee_dashboard_delivery_team_application_second_confirmed_successfully_page', [MainEmployeesController::class, 'main_employee_dashboard_delivery_team_application_second_confirmed_successfully_page'])->name('main_employee_dashboard_delivery_team_application_second_confirmed_successfully_page')->middleware('employeeAuth');

Route::get('/main_employee_dashboard/main_employee_dashboard_show_all_delivery_team_applications_eligible_by_employee_page', [MainEmployeesController::class, 'main_employee_dashboard_show_all_delivery_team_applications_eligible_by_employee_page'])->name('main_employee_dashboard_show_all_delivery_team_applications_eligible_by_employee_page')->middleware('employeeAuth');
route::get('/main_employee_dashboard/main_employee_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_employee_page', [MainEmployeesController::class, 'main_employee_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_employee_page'])->name('main_employee_dashboard_nothing_to_show_in_delivery_team_applications_eligible_by_employee_page')->middleware('employeeAuth');
route::get('/unconfirming_delivery_team_application_from_employee_second_step/{id}', [MainEmployeesController::class, 'unconfirming_delivery_team_application_from_employee_second_step'])->name('unconfirming_delivery_team_application_from_employee_second_step');
Route::get('/main_employee_dashboard/main_employee_dashboard_delivery_team_application_second_unconfirmed_successfully_page', [MainEmployeesController::class, 'main_employee_dashboard_delivery_team_application_second_unconfirmed_successfully_page'])->name('main_employee_dashboard_delivery_team_application_second_unconfirmed_successfully_page')->middleware('employeeAuth');

Route::get('/employee_feedback_page', [EmployeesController::class, 'employee_feedback_page'])->name('employee_feedback_page')->middleware('employeeAuth');
route::post('/employee_feedback_form_submission/{employee_id}', [EmployeesController::class, 'employee_feedback_form_submission'])->name('employee_feedback_form_submission')->middleware('employeeAuth');

// ================================================= employee account (show, update, delete account) (start) =================================================
Route::get('/employee_account/{employee_id}', [MainEmployeesController::class, 'employee_account'])->name('employee_account')->middleware('employeeAuth');
route::post('/updating_employee_user_record_from_employee_page_form_submission/{id}', [MainEmployeesController::class, 'updating_employee_user_record_from_employee_page_form_submission'])->name('updating_employee_user_record_from_employee_page_form_submission')->middleware('employeeAuth');
Route::get('/sending_email_for_verify_employee_user/{employee_id}', [MainEmployeesController::class, 'sending_email_for_verify_employee_user'])->name('sending_email_for_verify_employee_user')->middleware('employeeAuth');
route::post('/verifying_employee_email_verification_code_form_submission/{id}', [MainEmployeesController::class, 'verifying_employee_email_verification_code_form_submission'])->name('verifying_employee_email_verification_code_form_submission')->middleware('employeeAuth');
route::get('/deleting_employee_account_from_employee/{id}', [MainEmployeesController::class, 'deleting_employee_account_from_employee'])->name('deleting_employee_account_from_employee')->middleware('employeeAuth');
route::get('/showing_photo_to_employee_for_account/{id}', [MainEmployeesController::class, 'showing_photo_to_employee_for_account'])->name('showing_photo_to_employee_for_account')->middleware('employeeAuth');
route::get('/showing_aadharcard_to_employee_for_account/{id}', [MainEmployeesController::class, 'showing_aadharcard_to_employee_for_account'])->name('showing_aadharcard_to_employee_for_account')->middleware('employeeAuth');
route::get('/showing_proof_of_bank_account_ownership_to_employee_for_account/{id}', [MainEmployeesController::class, 'showing_proof_of_bank_account_ownership_to_employee_for_account'])->name('showing_proof_of_bank_account_ownership_to_employee_for_account')->middleware('employeeAuth');
// ================================================= employee account (show, update, delete account) (end) =================================================


//===================================== Deliveryboy routes============================================
Route::get('/delivery_team_info_page', [DeliveryTeamController::class, 'delivery_team_info_page'])->name('delivery_team_info_page');
Route::get('/delivery_team_first_window', [DeliveryTeamController::class, 'delivery_team_first_window'])->name('delivery_team_first_window');
Route::get('/delivery_team_application_page', [DeliveryTeamController::class, 'delivery_team_application_page'])->name('delivery_team_application_page')->middleware('deliveryTeamMemberLogoutAuth');
Route::post('/delivery_team_application_form_submission_route', [DeliveryTeamController::class, 'delivery_team_application_form_submission_route'])->name('delivery_team_application_form_submission_route');

route::get('/delivery_team_application_page/delivery_team_application_submitted_page', [DeliveryTeamController::class, 'delivery_team_application_submitted_page'])->name('delivery_team_application_submitted_page');

Route::get('/confirmed_delivery_applicant_account_creation_first_page', [DeliveryTeamController::class, 'confirmed_delivery_applicant_account_creation_first_page'])->name('confirmed_delivery_applicant_account_creation_first_page')->middleware('deliveryTeamMemberLogoutAuth');
Route::post('/delivery_applicant_account_creation_first_step_submission_route', [DeliveryTeamController::class, 'delivery_applicant_account_creation_first_step_submission_route'])->name('delivery_applicant_account_creation_first_step_submission_route');
Route::get('/confirmed_delivery_applicant_account_creation_second_page/{delivery_applicant_id}', [DeliveryTeamController::class, 'confirmed_delivery_applicant_account_creation_second_page'])->name('confirmed_delivery_applicant_account_creation_second_page')->middleware('deliveryTeamMemberLogoutAuth');
Route::post('/delivery_applicant_account_creation_second_step_submission_route/{delivery_applicant_id}', [DeliveryTeamController::class, 'delivery_applicant_account_creation_second_step_submission_route'])->name('delivery_applicant_account_creation_second_step_submission_route');
route::get('/delivery_applicant_username_password_created_successfully_page', [DeliveryTeamController::class, 'delivery_applicant_username_password_created_successfully_page'])->name('delivery_applicant_username_password_created_successfully_page');

route::get('/delivery_team_member_login_page_first_step', [DeliveryTeamController::class, 'delivery_team_member_login_page_first_step'])->name('delivery_team_member_login_page_first_step')->middleware('deliveryTeamMemberLogoutAuth');
Route::post('/delivery_team_member_login_form_phone_no_submission_route', [DeliveryTeamController::class, 'delivery_team_member_login_form_phone_no_submission_route'])->name('delivery_team_member_login_form_phone_no_submission_route');
Route::get('/delivery_team_member_otp_verification/{d_id}', [DeliveryTeamController::class, 'delivery_team_member_otp_verification'])->name('delivery_team_member_otp_verification');
Route::post('/delivery_team_member_login_otp_verification_route', [DeliveryTeamController::class, 'delivery_team_member_login_otp_verification_route'])->name('delivery_team_member_login_otp_verification_route');
route::get('/delivery_team_member_login_page_second_step/{id}', [DeliveryTeamController::class, 'delivery_team_member_login_page_second_step'])->name('delivery_team_member_login_page_second_step')->middleware('deliveryTeamMemberLogoutAuth');
Route::post('/delivery_team_member_login_form_un_ps_submission_route/{id}', [DeliveryTeamController::class, 'delivery_team_member_login_form_un_ps_submission_route'])->name('delivery_team_member_login_form_un_ps_submission_route');
Route::get('/delivery_team_member_logout', [DeliveryTeamController::class, 'delivery_team_member_logout'])->name('delivery_team_member_logout');

Route::get('/main_delivery_team_member_dashboard', [MainDeliveryTeamController::class, 'main_delivery_team_member_dashboard'])->name('main_delivery_team_member_dashboard')->middleware('deliveryTeamMemberAuth');
Route::get('/main_delivery_team_member_dashboard/main_delivery_team_member_dashboard_show_new_orders_page', [MainDeliveryTeamController::class, 'main_delivery_team_member_dashboard_show_new_orders_page'])->name('main_delivery_team_member_dashboard_show_new_orders_page')->middleware('deliveryTeamMemberAuth');
route::get('/claim_delivery_from_delivery_team_member/{id}', [MainDeliveryTeamController::class, 'claim_delivery_from_delivery_team_member'])->name('claim_delivery_from_delivery_team_member')->middleware('deliveryTeamMemberAuth');

Route::get('/main_delivery_team_member_dashboard/main_delivery_team_member_dashboard_show_pending_orders_page', [MainDeliveryTeamController::class, 'main_delivery_team_member_dashboard_show_pending_orders_page'])->name('main_delivery_team_member_dashboard_show_pending_orders_page')->middleware('deliveryTeamMemberAuth');
route::get('/cancel_delivery_from_delivery_team_member/{id}', [MainDeliveryTeamController::class, 'cancel_delivery_from_delivery_team_member'])->name('cancel_delivery_from_delivery_team_member')->middleware('deliveryTeamMemberAuth');

Route::get('/main_delivery_team_member_dashboard/main_delivery_team_member_dashboard_show_shipped_orders_page', [MainDeliveryTeamController::class, 'main_delivery_team_member_dashboard_show_shipped_orders_page'])->name('main_delivery_team_member_dashboard_show_shipped_orders_page')->middleware('deliveryTeamMemberAuth');
route::get('/order_mark_as_shipped_from_delivery_team_member/{id}', [MainDeliveryTeamController::class, 'order_mark_as_shipped_from_delivery_team_member'])->name('order_mark_as_shipped_from_delivery_team_member')->middleware('deliveryTeamMemberAuth');

Route::get('/send_otp_to_customer_for_verification/{id}', [MainDeliveryTeamController::class, 'send_otp_to_customer_for_verification'])->name('send_otp_to_customer_for_verification');
Route::post('/verifying_customer_otp_for_delivery_form_submission/{customer_id}/{order_id}', [MainDeliveryTeamController::class, 'verifying_customer_otp_for_delivery_form_submission'])->name('verifying_customer_otp_for_delivery_form_submission');

Route::get('/main_delivery_team_member_dashboard/main_delivery_team_member_dashboard_show_completed_orders_page', [MainDeliveryTeamController::class, 'main_delivery_team_member_dashboard_show_completed_orders_page'])->name('main_delivery_team_member_dashboard_show_completed_orders_page')->middleware('deliveryTeamMemberAuth');

Route::get('/delivery_team_member_feedback_page', [DeliveryTeamController::class, 'delivery_team_member_feedback_page'])->name('delivery_team_member_feedback_page')->middleware('deliveryTeamMemberAuth');
route::post('/delivery_team_member_feedback_form_submission/{delivery_team_member_id}', [DeliveryTeamController::class, 'delivery_team_member_feedback_form_submission'])->name('delivery_team_member_feedback_form_submission')->middleware('deliveryTeamMemberAuth');

// ================================================= delivery team member account (show, update, delete account) (start) =================================================
Route::get('/delivery_team_member_account/{delivery_team_member_id}', [MainDeliveryTeamController::class, 'delivery_team_member_account'])->name('delivery_team_member_account')->middleware('deliveryTeamMemberAuth');
route::post('/updating_delivery_team_member_user_record_from_delivery_team_member_page_form_submission/{id}', [MainDeliveryTeamController::class, 'updating_delivery_team_member_user_record_from_delivery_team_member_page_form_submission'])->name('updating_delivery_team_member_user_record_from_delivery_team_member_page_form_submission')->middleware('deliveryTeamMemberAuth');
Route::get('/sending_email_for_verify_delivery_team_member_user/{delivery_team_member_id}', [MainDeliveryTeamController::class, 'sending_email_for_verify_delivery_team_member_user'])->name('sending_email_for_verify_delivery_team_member_user')->middleware('deliveryTeamMemberAuth');
route::post('/verifying_delivery_team_member_email_verification_code_form_submission/{id}', [MainDeliveryTeamController::class, 'verifying_delivery_team_member_email_verification_code_form_submission'])->name('verifying_delivery_team_member_email_verification_code_form_submission')->middleware('deliveryTeamMemberAuth');
route::get('/deleting_delivery_team_member_account_from_delivery_team_member/{id}', [MainDeliveryTeamController::class, 'deleting_delivery_team_member_account_from_delivery_team_member'])->name('deleting_delivery_team_member_account_from_delivery_team_member')->middleware('deliveryTeamMemberAuth');
route::get('/showing_proof_of_bank_account_ownership_to_delivery_team_member_for_account/{id}', [MainDeliveryTeamController::class, 'showing_proof_of_bank_account_ownership_to_delivery_team_member_for_account'])->name('showing_proof_of_bank_account_ownership_to_delivery_team_member_for_account')->middleware('deliveryTeamMemberAuth');
route::get('/showing_photo_to_delivery_team_member_for_account/{id}', [MainDeliveryTeamController::class, 'showing_photo_to_delivery_team_member_for_account'])->name('showing_photo_to_delivery_team_member_for_account')->middleware('deliveryTeamMemberAuth');
route::get('/showing_aadharcard_to_delivery_team_member_for_account/{id}', [MainDeliveryTeamController::class, 'showing_aadharcard_to_delivery_team_member_for_account'])->name('showing_aadharcard_to_delivery_team_member_for_account')->middleware('deliveryTeamMemberAuth');
route::get('/showing_rc_book_to_delivery_team_member_for_account/{id}', [MainDeliveryTeamController::class, 'showing_rc_book_to_delivery_team_member_for_account'])->name('showing_rc_book_to_delivery_team_member_for_account')->middleware('deliveryTeamMemberAuth');
route::get('/showing_puc_to_delivery_team_member_for_account/{id}', [MainDeliveryTeamController::class, 'showing_puc_to_delivery_team_member_for_account'])->name('showing_puc_to_delivery_team_member_for_account')->middleware('deliveryTeamMemberAuth');
route::get('/showing_licence_to_delivery_team_member_for_account/{id}', [MainDeliveryTeamController::class, 'showing_licence_to_delivery_team_member_for_account'])->name('showing_licence_to_delivery_team_member_for_account')->middleware('deliveryTeamMemberAuth');
route::get('/showing_INSURANCE_to_delivery_team_member_for_account/{id}', [MainDeliveryTeamController::class, 'showing_INSURANCE_to_delivery_team_member_for_account'])->name('showing_INSURANCE_to_delivery_team_member_for_account')->middleware('deliveryTeamMemberAuth');
// ================================================= delivery team member account (show, update, delete account) (end) =================================================
