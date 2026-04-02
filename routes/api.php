<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\MessageController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);



// Logout MUST be inside the protected group
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
    return $request->user();
    });
    Route::get('/wallet/balance', [AuthController::class, 'get_wallet_balance']);
    Route::post('/wallet/update', [AuthController::class, 'update_wallet_balance']);
    Route::post('/add-wallet-balance', [WalletController::class, 'add_wallet_balance']);
    
    Route::get('/campaigns',[CampaignController::class,'get_campaign_data']);
    Route::post('/create/campaigns',[CampaignController::class,'campaigns_create']);
    
    Route::post('/withdrawl-request',[WalletController::class,'withdrawl_requests']);

    Route::get('/banks', [WalletController::class, 'get_bank_data']);
    Route::post('/create-bank-account',[WalletController::class,'wallet_bank_accounts_store']);
    
    Route::get('/plans', [SubscriptionController::class, 'get_plan_data']);
    Route::post('/razorpay-create-subscription',[SubscriptionController::class,'razorpay_create_subscription']);
    Route::post('/razorpay-verify-subscription',[SubscriptionController::class,'verifySubscription']);
    
    Route::get('/messages', [MessageController::class, 'get_messages']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
});