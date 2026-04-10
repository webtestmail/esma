<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\AuthModuleController;
// use App\Http\Controllers\admin\auth\AuthController as AdminAuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\facebookController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CampaignController;
use App\Http\Middleware\is_admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BrandPaymentController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\InstagramSettingController;

use App\Http\Controllers\NotificationSettingsController;
use App\Http\Controllers\SubscriptionController;

// use Illuminate\Support\Facades\Artisan;

// Route::get('/run-artisan', function () {
//     // Artisan::call('migrate:status');
//     Artisan::call('make:mail NewsletterWelcome');
//     // Artisan::call('make:controller NewsletterController');
//     // Artisan::call('make:controller Admin/QuickModulesController');
//     // Artisan::call('make:model Subscribers');
//     // Artisan::call('make:model Admin/QuickModules -m');
//     // Artisan::call('make:migration create_send_message_form_table');
//     // Artisan::call('make:middleware AdminChangeTemplateMiddleware');
//     // Artisan::call('migrate:refresh --path=database/migrations/2025_06_30_132619_create_send_message_form_table.php');
//     return Artisan::output();
// });

Route::get('/clear',function(){
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return view('clear');
})->name('tools.clear-cache');

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/member-directory', [PagesController::class, 'member_directory_view'])->name('member.directory');
Route::get('/events-hub', [PagesController::class, 'events_hub_view'])->name('events.hub'); 
Route::get('/membership', [PagesController::class, 'membership_view'])->name('membership');
Route::get('/help-center', [PagesController::class, 'help_center_view'])->name('help.center');
Route::get('/about', [PagesController::class, 'about_view'])->name('about');
Route::get('/blogs', [PagesController::class, 'blogs_view'])->name('blogs');
Route::get('/blog/{blog_url}', [PagesController::class, 'single_blog_view'])->name('single.blog');
Route::get('/contact', [PagesController::class, 'contact_view'])->name('contact');
Route::get('/pricing', [PagesController::class, 'pricing_view'])->name('pricing');
Route::get('/services', [PagesController::class, 'services_view'])->name('services');
Route::get('/service/{service_url}', [PagesController::class, 'single_service_view'])->name('single.service');
Route::get('/page-not-found', [PagesController::class, 'page_not_found_view'])->name('page.not.found');
Route::get('/help-center', [PagesController::class, 'help_center_view'])->name('help_center');
Route::get('/resources-hub', [PagesController::class, 'resource_hub_view'])->name('resource_hub');
Route::get('/resources-news', [PagesController::class, 'resource_news_view'])->name('resource_news');
Route::get('/news/{slug}', [PagesController::class, 'news_detail_view'])->name('news_detail');
Route::get('/news-detail/search', [PagesController::class, 'searchNews'])->name('news.search');
Route::get('/resouces-reports', [PagesController::class, 'resource_reports_view'])->name('resource_reports');

Route::post('/newsletter-subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/privacy-policy',[PagesController::class,'privacy_policy_page_view'])->name('privacy.policy');
Route::get('/term-and-condition',[PagesController::class,'term_and_condition_page_view'])->name('term.and.condition');
Route::get('/login',[AuthController::class,'login_view'])->name('login');
Route::post('/login/auth',[AuthController::class,'login_auth'])->name('login_auth');
// Route::get('/price',[PagesController::class,'price_view'])->name('price');
Route::get('/sign-up',[AuthController::class,'signup_view'])->name('sign-up');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/email/verify',[AuthController::class,'email_verify_notice'])->name('verification.notice');
Route::post('/application/submit',[AuthController::class,'application_submit'])->name('application.submit');

Route::post('/contact/verify', [ContactController::class, 'sendVerification'])->name('contact.verify');
Route::get('/contact/verify/{token}', [ContactController::class, 'verifyToken'])->name('contact.verify.token');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');



Route::get('/password/request',[ForgotPasswordController::class,'password_request'])->name('password.request'); 

Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::post('/profile.password.update',[AuthController::class,'profile_password_update'])->name('profile.password.update');



//Auth Route  
Route::middleware('auth')->group(function(){
    

Route::get('profile',[AuthModuleController::class, 'profile_page_view'])->name('profile');

Route::put('/update/settings',[AuthController::class,'profile_update'])->name('update.settings');

Route::get('/otp/verify/route',[AuthController::class,'otp_verify_page'])->name('otp.verify.route');

Route::post('/otp/verify',[AuthController::class,'verifyOtp'])->name('otp.verify');

Route::get('/otp/resend',[AuthController::class,'otp_resend'])->name('otp.resend');

Route::get('/sign-out',[AuthController::class,'logout'])->name('sign-out');

// Route::post('/campaigns/initiate-payment',[BrandPaymentController::class,'initiatePayment']);


Route::get('/payment/callback', [BrandPaymentController::class, 'paymentCallback'])
    ->name('payment.callback');
    
Route::post('/wallet/withdraw-request',[BrandPaymentController::class,'withdrawRequest']);

//Bank account

Route::post('/wallet/bank-accounts/store',[WalletController::class,'wallet_bank_accounts_store']);

Route::post('/settings/instagram/update',[InstagramSettingController::class,'settings_instagram_update']);

Route::post('/settings/notification/update',[NotificationSettingsController::class,'settings_notification_update']);



Route::post('/messages/send',[CampaignController::class,'messages_store']);

Route::post('/payments/create-order',[CampaignController::class,'payments_create_order']);

Route::post('/payments/verify',[CampaignController::class,'handlePaymentSuccess']);

Route::get('/get-messages/{encrypted_id}',[CampaignController::class, 'get_messages']);

//Subscription route
Route::post('/razorpay/create-subscription',[SubscriptionController::class,'razorpay_create_subscription']);

Route::post('/razorpay/verify-subscription',[SubscriptionController::class,'verifySubscription']);

Route::get('/subscription-success', function () {
    $user = Auth::user();
    $plan = $user->hasActiveSubscription();
    return view('user-dashboard.subscription-success',compact('plan','user')); // Or 'thank-you' if you create a separate file
})->name('subscription-success');

});


// Admin routes
require __DIR__ . '/admin_web.php';

// Influencer routes
require __DIR__ .'/influencer.php';

// Brand routes
require __DIR__ .'/brand.php';


