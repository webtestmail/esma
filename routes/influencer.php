<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\Member;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\MemberProfileController;


Route::middleware(['auth',Member::class])->group(function(){
   Route::get('/my-dashboard',[AuthController::class,'my_dashboard'])->name('my-dashboard');
   Route::get('/edit-profile',[MemberController::class,'edit_profile'])->name('edit-profile');
   Route::get('/events',[MemberController::class,'events'])->name('events');
   Route::get('liberary',[MemberController::class,'library'])->name('library');
   Route::get('/users',[MemberController::class,'users'])->name('users');
   Route::get('/member-help-center',[MemberController::class,'help_center'])->name('member-help-center');
   Route::post('/member-company-detials',[MemberProfileController::class,'company_detail_update'])->name('member.company.details');


   // Route::get('/settings',[AuthController::class,'complete_profile'])->name('settings');
   // Route::get('/find-campagins',[InfluencerController::class,'find_campagins'])->name('find-campagins');
   // Route::get('/influencer-campaign-detail/{slug}',[InfluencerController::class,'influencer_campaign_detail'])->name('influencer-campaign-detail');
   // Route::post('/campaign/apply',[ApplicationController::class, 'storeApplication']);
   // Route::get('/campaign/influencer/check-agreement/{campaginId}', [ApplicationController::class, 'checkAgreementInfluencerStatus']);
   
   // Route::post('/campaign/influencer/sign-agreement', [ApplicationController::class, 'signAgreementInfluencer']);
   // Route::post('/work/submit/send', [CampaignController::class, 'work_submit_send']);
   
   // Route::get('/messages',[MessageController::class,'message_box_view'])->name('messages');
   
   Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});