<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\auth\AuthController as AdminAuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardFeaturesController;
use App\Http\Controllers\Admin\DeleteController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PlansController;
use App\Http\Controllers\Admin\QuickModulesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\VisibilityController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Middleware\AdminChangeStatusMiddleware;
use App\Http\Middleware\AdminChangeVisibilityMiddleware;
use App\Http\Middleware\AdminDeleteMiddleware;
use App\Http\Middleware\is_admin;

Route::get('/admin-panel', [AdminAuthController::class, 'admin_login_view'])->name('admin.panel');
Route::post('admin_auth', [AdminAuthController::class, 'admin_auth'])->name('admin_auth');
Route::get('/password/request', [ForgotPasswordController::class, 'password_request'])->name('password.request');

Route::match(['get', 'post'], '/change_visibility', [VisibilityController::class, 'index'])->name('change.visibility')->middleware(AdminChangeVisibilityMiddleware::class);
Route::match(['get', 'post'], '/change_status', [StatusController::class, 'index'])->name('change.status')->middleware(AdminChangeStatusMiddleware::class);
Route::match(['get', 'post'], '/delete_item', [DeleteController::class, 'index'])->name('delete.item')->middleware(AdminDeleteMiddleware::class);
Route::match(['get', 'post'], '/change_header_footer_visibility', [VisibilityController::class, 'headerFooterIndex'])->name('change.header.footer.visibility')->middleware(AdminChangeVisibilityMiddleware::class);

Route::prefix('/admin')->name('admin.')->middleware(['auth:admin', is_admin::class])->group(function () {
    Route::get('/my-dashboard', [AdminAuthController::class, 'my_dashboard'])->name('my-dashboard');
    Route::match(['get', 'post'], '/edit_profile', [AdminAuthController::class, 'editProfile'])->name('edit.profile');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('/features/{role}', [DashboardFeaturesController::class, 'manageFeatures'])->name('features');
    Route::match(['get', 'post'], '/add_feature/{role}', [DashboardFeaturesController::class, 'addFeature'])->name('add.feature');
    Route::match(['get', 'post'], '/edit_feature/{role}/{feature}', [DashboardFeaturesController::class, 'editFeature'])->name('edit.feature');

    Route::get('/quick_modules', [QuickModulesController::class, 'manageQuickModules'])->name('quick_modules');
    // Route::match(['get', 'post'], '/add_quick_module', [QuickModulesController::class, 'addQuickModule'])->name('add.quick_module');
    // Route::match(['get', 'post'], '/edit_quick_module/{quick_module}', [QuickModulesController::class, 'editQuickModule'])->name('edit.quick_module');

    Route::get('/get_pages_page', [PagesController::class, 'getPagesPage'])->name('get.pages.page');
    Route::post('/pages_sequence', [PagesController::class, 'savePagesSequence'])->name('save.pages.sequence');
    Route::get('/check-page-link/{link}/{id?}', [PagesController::class, 'checkPageLink'])->name('check.page.link');
    Route::get('/manage_pages', [PagesController::class, 'managePages'])->name('manage_pages');
    Route::match(['get', 'post'], '/add_page', [PagesController::class, 'addPage'])->name('add.page');
    Route::match(['get', 'post'], '/edit_page/{page}', [PagesController::class, 'editPage'])->name('edit.page');

    Route::get('/get_sections_page/{page}/{section}', [PagesController::class, 'getSectionsPage'])->name('get.sections.page');
    Route::post('/sections_sequence', [PagesController::class, 'saveSectionsSequence'])->name('save.sections.sequence');
    Route::match(['get', 'post'], '/add_page_section/{page}', [PagesController::class, 'addPageSection'])->name('add.page.section');
    Route::match(['get', 'post'], '/edit_page_section/{page}/{section}', [PagesController::class, 'editPageSection'])->name('edit.page.section');
    Route::match(['get', 'post'], '/add_page_subsection/{page}/{section}', [PagesController::class, 'addPageSubSection'])->name('add.page.subsection');
    Route::match(['get', 'post'], '/edit_page_subsection/{page}/{section}/{subsection}', [PagesController::class, 'editPageSubSection'])->name('edit.page.subsection');

    Route::get('/manage_banners', [BannersController::class, 'manageBanners'])->name('manage_banners');
    Route::match(['get', 'post'], '/add_banner', [BannersController::class, 'addBanner'])->name('add.banner');
    Route::match(['get', 'post'], '/edit_banner/{banner}', [BannersController::class, 'editBanner'])->name('edit.banner');
    
    Route::get('/manage_payment_requests', [PaymentController::class, 'paymentRequests'])->name('manage_payment_requests');
    // Route::match(['get', 'post'], '/payment_requests/{paymentrequest}', [PaymentController::class, 'editPaymentRequest'])->name('edit.payment_requests'); 
    
    Route::get('/manage_users', [UserController::class, 'manageUsers'])->name('manage_users');
    Route::get('/users-data', [UserController::class, 'user_data'])->name('users.data');
    Route::match(['get','post'], '/user-edit/{id}', [UserController::class, 'user_edit'])->name('user.edit');
    Route::match(['get','post'],'/add-user', [UserController::class, 'add_user'])->name('add.user');

    Route::get('/manage_applications', [ApplicationController::class, 'manageApplications'])->name('manage_applications');
    Route::get('/applications-data', [ApplicationController::class, 'application_data'])->name('applications.data');
    Route::match(['get','post'], '/application-edit/{id}', [ApplicationController::class, 'application_edit'])->name('application.edit');
    
    Route::get('/manage_campaigns', [CampaignController::class, 'manageCampaigns'])->name('manage_campaigns');
    // Route::get('/campaigns-data', [CampaignController::class, 'campaigns_data'])->name('campaigns.data');
    // Route::get('/campaigns-edit', [CampaignController::class, 'campaigns_edit'])->name('campaign.edit');
    // Route::match(['get', 'post'], '/add_campaign', [CampaignController::class, 'addBanner'])->name('add.campaign');


    Route::get('/get_services_page', [ServicesController::class, 'getServicesPage'])->name('get.services.page');
    Route::post('/services_sequence', [ServicesController::class, 'saveServicesSequence'])->name('save.services.sequence');
    Route::get('/check_service_link/{service_url}/{id?}', [ServicesController::class, 'checkServiceLink'])->name('check.service.link');
    Route::get('/manage_services', [ServicesController::class, 'manageServices'])->name('manage_services');
    Route::match(['get', 'post'], '/add_service', [ServicesController::class, 'addService'])->name('add.service');
    Route::match(['get', 'post'], '/edit_service/{service}', [ServicesController::class, 'editService'])->name('edit.service');
    Route::get('/get_service_contents/{service}', [ServicesController::class, 'getServiceContents'])->name('get.service.contents');
    Route::post('/delete_service_content', [ServicesController::class, 'deleteServiceContent'])->name('delete.service.content');

    Route::get('/check_category_link/{category_url}/{id?}', [CategoriesController::class, 'checkCategoryLink'])->name('check.category.link');
    Route::get('/manage_categories/{type}', [CategoriesController::class, 'manageCategories'])->name('manage_categories');
    Route::match(['get', 'post'], '/add_category/{type}', [CategoriesController::class, 'addCategory'])->name('add.category');
    Route::match(['get', 'post'], '/edit_category/{category}/{type}', [CategoriesController::class, 'editCategory'])->name('edit.category');

    Route::get('/check_blog_link/{blog_url}/{id?}', [BlogsController::class, 'checkBlogLink'])->name('check.blog.link');
    Route::get('/manage_blogs', [BlogsController::class, 'manageBlogs'])->name('manage_blogs');
    Route::match(['get', 'post'], '/add_blog', [BlogsController::class, 'addBlog'])->name('add.blog');
    Route::match(['get', 'post'], '/edit_blog/{blog}', [BlogsController::class, 'editBlog'])->name('edit.blog');
    Route::get('/get_blog_section/{blog}', [BlogsController::class, 'getBlogSection'])->name('get.blog.section');
    Route::match(['get', 'post'], '/delete_blog_section', [BlogsController::class, 'deleteBlogSection'])->name('delete.blog.section');
    Route::match(['get', 'post'], '/change_featured_blog', [BlogsController::class, 'changeFeaturedBlog'])->name('change.featured.blog');

    Route::get('/manage_plans', [PlansController::class, 'managePlans'])->name('manage_plans');
    Route::match(['get', 'post'], '/add_plan', [PlansController::class, 'addPlan'])->name('add.plan');
    Route::match(['get', 'post'], '/edit_plan/{plan}', [PlansController::class, 'editPlan'])->name('edit.plan');

    Route::get('/connect_plans', [PlansController::class, 'manageConnectPlan'])->name('connect_plans');
    Route::match(['get', 'post'], '/add_ConnectfeaturePlan', [PlansController::class, 'addConnectPlan'])->name('add.ConnectfeaturePlan');
    Route::match(['get', 'post'], '/edit_ConnectfeaturePlan/{plan}', [PlansController::class, 'editConnectPlan'])->name('edit.ConnectPlan');

    Route::get('/feature_plans', [PlansController::class, 'featurePlans'])->name('feature_plans');
    Route::match(['get', 'post'], '/add_featurePlan', [PlansController::class, 'addFeaturePlan'])->name('add.featurePlan');
    Route::match(['get', 'post'], '/edit_featurePlan/{plan}', [PlansController::class, 'editFeaturePlan'])->name('edit.featurePlan');

    Route::get('/manage_faqs', [FaqsController::class, 'manageFaqs'])->name('manage_faqs');
    Route::match(['get', 'post'], '/add_faq', [FaqsController::class, 'addFaq'])->name('add.faq');
    Route::match(['get', 'post'], '/edit_faq/{faq}', [FaqsController::class, 'editFaq'])->name('edit.faq');

    Route::get('/manage_faq_category', [FaqsController::class, 'manageFaqCategory'])->name('manage_faqcategory');
    Route::match(['get', 'post'], '/add_faq_catetgory', [FaqsController::class, 'addFaqcategory'])->name('add.faqcategory');
    Route::match(['get', 'post'], '/edit_faq_catetgory/{faqcategory}', [FaqsController::class, 'editFaqcategory'])->name('edit.faqcategory');

    Route::get('/manage_team', [TeamController::class, 'manageTeam'])->name('manage_team');
    Route::match(['get', 'post'], '/add_member', [TeamController::class, 'addMember'])->name('add.member');
    Route::match(['get', 'post'], '/edit_member/{member}', [TeamController::class, 'editMember'])->name('edit.member');

    Route::get('/manage_brands', [BrandsController::class, 'manageBrands'])->name('manage_brands');
    Route::match(['get', 'post'], '/add_brand', [BrandsController::class, 'addBrand'])->name('add.brand');
    Route::match(['get', 'post'], '/edit_brand/{brand}', [BrandsController::class, 'editBrand'])->name('edit.brand');

    Route::get('/manage_testimonials', [TestimonialsController::class, 'manageTestimonials'])->name('manage_testimonials');
    Route::match(['get', 'post'], '/add_testimonial', [TestimonialsController::class, 'addTestimonial'])->name('add.testimonial');
    Route::match(['get', 'post'], '/edit_testimonial/{testimonial}', [TestimonialsController::class, 'editTestimonial'])->name('edit.testimonial');

    Route::get('/manage_company', [CompanyController::class, 'manageCompany'])->name('manage_company');
    Route::post('/edit_company/{company}', [CompanyController::class, 'editCompany'])->name('edit.company');

    Route::get('/manage_contact', [CompanyController::class, 'manageContact'])->name('manage_contact');
    Route::post('/edit_contact/{contact}', [CompanyController::class, 'editContact'])->name('edit.contact');

    Route::get('/manage_socials', [CompanyController::class, 'manageSocials'])->name('manage_socials');
    Route::post('/edit_socials/{socials}', [CompanyController::class, 'editSocials'])->name('edit.socials');

    Route::get('/manage_member_categories', [MasterController::class, 'manageMemberCategories'])->name('manage_member_categories');
    Route::get('/member-category-data', [MasterController::class, 'member_category_data'])->name('member_categories.data');
    Route::match(['get','post'], '/member-category-edit/{id}', [MasterController::class, 'member_category_edit'])->name('member_category.edit');
    Route::match(['get','post'],'/add-member-category', [MasterController::class, 'addMemberCategory'])->name('add.member_category');
    Route::delete('/delete-member-category', [MasterController::class, 'deleteData'])->name('member_category.delete');

    Route::get('/manage_countries', [MasterController::class, 'manageCountry'])->name('manage_countries');
    Route::get('/country-data', [MasterController::class, 'country_data'])->name('countries.data');
    Route::match(['get','post'], '/country-edit/{id}', [MasterController::class, 'country_edit'])->name('country.edit');
    Route::match(['get','post'],'/add-country', [MasterController::class, 'add_country'])->name('add.country');
    Route::delete('/delete-country', [MasterController::class, 'deleteData'])->name('country.delete');

    Route::get('/manage_trade_sectors', [MasterController::class, 'manageTradeSectors'])->name('manage_trade_sectors');
    Route::get('/trade-sector-data', [MasterController::class, 'trade_sector_data'])->name('trade_sectors.data');
    Route::match(['get','post'], '/trade-sector-edit/{id}', [MasterController::class, 'trade_sector_edit'])->name('trade_sectors.edit');
    Route::match(['get','post'],'/add-trade-sector', [MasterController::class, 'add_trade_sector'])->name('add.trade_sector');
        Route::delete('/delete-trade-sector', [MasterController::class, 'deleteData'])->name('trade_sector.delete');

    Route::get('/manage_product_categories', [MasterController::class, 'manageProductCategories'])->name('manage_product_categories');
    Route::get('/product-category-data', [MasterController::class, 'product_category_data'])->name('product_categories.data');
    Route::match(['get','post'], '/product-category-edit/{id}', [MasterController::class, 'product_category_edit'])->name('product_category.edit');
    Route::match(['get','post'],'/add-product-category', [MasterController::class, 'add_product_category'])->name('add.product_category');
    Route::delete('/delete-product-category', [MasterController::class, 'deleteData'])->name('product_category.delete');

    Route::get('/manage_temperature', [MasterController::class, 'manageTemperature'])->name('manage_temperatures');
    Route::get('/temperature-data', [MasterController::class, 'temperature_data'])->name('temperatures.data');
    Route::match(['get','post'], '/temperature-edit/{id}', [MasterController::class, 'temperature_edit'])->name('temperature.edit');
    Route::match(['get','post'],'/add-temperature', [MasterController::class, 'add_temperature'])->name('add.temperature');
    Route::delete('/delete-temperature', [MasterController::class, 'deleteData'])->name('temperature.delete');

    Route::get('/manage_brands', [MasterController::class, 'manageBrands'])->name('manage_brands');
    Route::get('/brands-data', [MasterController::class, 'brands_data'])->name('brands.data');
    Route::match(['get', 'post'], '/add_brand', [MasterController::class, 'addBrand'])->name('add.brand');
    Route::match(['get', 'post'], '/edit_brand/{brand}', [MasterController::class, 'brand_edit'])->name('brand.edit');
    Route::delete('/delete-brand', [MasterController::class, 'deleteData'])->name('brand.delete');

    Route::get('/manage_events', [EventController::class, 'manageEvents'])->name('manage_events');
    Route::get('/events-data', [EventController::class, 'events_data'])->name('events.data');
    Route::match(['get', 'post'], '/add_event', [EventController::class, 'addEvent'])->name('add.event');
    Route::match(['get', 'post'], '/edit_event/{event}', [EventController::class, 'event_edit'])->name('event.edit');
    Route::delete('/delete-event', [EventController::class, 'deleteData'])->name('event.delete');
});
