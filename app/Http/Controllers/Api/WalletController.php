<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankAccount;
use App\Models\PaymentRequest;
use App\Models\ActivityLog;
use App\Models\Order;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class WalletController extends Controller
{
    public function add_wallet_balance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }
    
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $amountInPaise = $request->amount * 100;
    
        try {
            // 2. Create Razorpay Order
            $razorpayOrder = $api->order->create([
                'receipt'  => 'rcpt_' . time(),
                'amount'   => $amountInPaise,
                'currency' => 'INR',
            ]);
    
            $order = Order::create([
                'user_id'           => auth()->id(),
                'razorpay_order_id' => $razorpayOrder['id'],
                'transaction_title' => 'Wallet Top Up',
                'amount'            => $amountInPaise,
                'status'            => 'Pending',
                'type'              => 'credit',
                'method'            => $request->method ?? 'razorpay'
            ]);
    
            // 4. Return clean JSON for the Frontend
            return response()->json([
                'success'      => true,
                'razorpay_key' => env('RAZORPAY_KEY'),
                'order_id'     => $razorpayOrder['id'],
                'amount'       => $amountInPaise,
                'currency'     => 'INR',
                'user'         => [
                    'name'  => auth()->user()->first,
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone,
                ]
            ], 200);
    
        } catch (\Exception $e) {
            \Log::error("Razorpay Order Creation Failed: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unable to create order. Please try again later.'
            ], 500);
        }
    }
    public function withdrawl_requests(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount'    => 'required|numeric|min:1',
            'bank_id'   => 'required|exists:bank_accounts,id', 
            'notes'     => 'nullable|string|max:255',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
    
        $user   = auth()->user();
        $wallet = $user->wallet;
        $amount = $request->amount;
    
        if ($wallet->balance < $amount) {
            return response()->json([
                'success' => false, 
                'message' => 'Insufficient balance in wallet.'
            ], 400);
        }
    
        try {
            return DB::transaction(function () use ($user, $wallet, $amount, $request) {
                
                // 3. Create Payment Request
                $paymentRequest = PaymentRequest::create([
                    'user_id'    => $user->id,
                    'type'       => 'withdrawal',
                    'amount'     => $amount * 100, // Storing in Paise
                    'account_id' => $request->bank_id,
                    'status'     => 'Pending',
                    'user_note'  => $request->notes
                ]);
    
                $wallet->decrement('balance', $amount);
    
                ActivityLog::create([
                    'user_id'      => $user->id,
                    'type'         => 'withdrawal_request',
                    'title'        => 'Withdrawal Requested',
                    'description'  => "Requested ₹{$amount}",
                    'status_label' => 'Pending',
                    'metadata'     => json_encode(['amount' => $amount])
                ]);
    
                $order = Order::create([
                    'user_id'           => $user->id,
                    'type'              => 'debit',
                    'amount'            => $amount * 100,
                    'status'            => 'Pending',
                    'transaction_title' => 'Withdrawal Request',
                    'description'       => "Withdrawal Request for Rs {$amount}",
                ]);
    
                return response()->json([
                    'success' => true,
                    'message' => 'Withdrawal request submitted successfully.',
                    'data'    => [
                        'request_id' => $paymentRequest->id,
                        'new_balance' => $wallet->balance
                    ]
                ], 200);
            });
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function wallet_bank_accounts_store(Request $request){
    $request->validate([
            'bank_name'      => 'required|string',
            'account_number' => 'required|numeric|unique:bank_accounts,account_number',
            'ifsc'           => 'required|string',
            'holder_name'    => 'required|string', // Added this
        ]);
    $bank = new BankAccount();
    $bank->user_id = auth()->id();
    $bank->bank_name = $request->bank_name;
    $bank->account_holder_name = $request->holder_name;
    $bank->account_number = $request->account_number;
    $bank->ifsc_code = $request->ifsc;
    $bank->save();

    return response()->json([
        'data' => [
            'success' => true,
            'message'=>'Bank details stored successfully',
            'banks'=> $bank,
            ],
            ],200);
    }
    public function get_bank_data(){
        $id = Auth::id();
        $banks = BankAccount::where('user_id',$id)->get();
        
        if(!$banks){
            return response()->json([
                'data'=>[
                    'success'=>false,
                    'message'=>"Bank account not found",
                    ],
                ],404);
        }
        else{
              return response()->json([
                'data'=>[
                    'success'=>true,
                    'message'=>"Bank account data fatch successfully",
                    'banks'=>$banks
                    ],
                ],200);
        }
        
        
    }
}
