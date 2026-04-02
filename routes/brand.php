<?php

use App\Http\Middleware\is_brand;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\auth\AuthController;

Route::middleware(['auth',is_brand::class])->group(function(){
   Route::get('/my-dashboard',[AuthController::class,'my_dashboard'])->name('my-dashboard');
   Route::get('/settings',[AuthController::class,'complete_profile'])->name('settings');
   Route::get('/brand-campaigns',[CampaignController::class,'brand_campaigns'])->name('brand-campaigns');
   Route::get('/brand-create-campaign',[CampaignController::class,'brand_create_campaign'])->name('brand-create-campaign');
   Route::post('/campaigns/create',[CampaignController::class,'campaigns_create']);
   Route::get('/brand-campaign-detail/{id}',[CampaignController::class,'brand_campaign_detail']);
   Route::get('/brand-campaign-edit/{id}',[CampaignController::class,'brand_campaign_edit']);
   Route::post('/campaigns/update',[CampaignController::class,'campaigns_update']);
   
  
   
   Route::patch('/applications/{id}/status', [ApplicationController::class, 'applicationUpdateStatus'])->name('applications.updateStatus');
   
   Route::patch('/campagin/{id}/pause', [CampaignController::class, 'campaginPause'])->name('campagin.pause');
   
   Route::patch('/campaign/{id}/start', [CampaignController::class, 'campaginStart'])->name('campagin.start');
   
   Route::get('/campaign/check-agreement/{campaginId}', [ApplicationController::class, 'checkAgreementStatus']);
   
   Route::post('/messages/update-work-status', [CampaignController::class, 'updateWorkStatus']);
   
   Route::post('/campaign/sign-agreement', [ApplicationController::class, 'signAgreement']);
   
   Route::post('/campaign/complete', [CampaignController::class, 'markComplete']);
   
   Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});