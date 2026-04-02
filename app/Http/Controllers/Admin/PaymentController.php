<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
        public function editPaymentRequest(Request $request)
        {
            if ($request->isMethod('post')) {
                $request->validate([
                    'status' => 'required|in:Pending,Paid,Rejected,Approved',
                    'admin_note' => 'nullable', // Note: Made nullable unless status is Paid
                ], [
                    'status.required' => 'Status required',
                ]);
        
                $id = Crypt::decrypt($request->paymentrequest);
                // Added 'bank' relationship to the with() to prevent "The name field is required" error
                $PaymentRequest = PaymentRequest::with(['user.wallet', 'bank'])->findOrFail($id);
        
                if ($PaymentRequest->status === 'Paid') {
                    session()->flash('error', 'This request has already been processed as Paid.');
                    return redirect()->route('admin.manage_payment_requests');
                }
        
                if ($request->status == 'Approved') {
                    $wallet = $PaymentRequest->user->wallet;
        
                    // FIX: If amount in DB is already in paise, don't divide by 100. 
                    // If it's in INR, compare directly.
                    if ($wallet->balance < $PaymentRequest->amount/100) {
                        session()->flash('error', 'Insufficient Balance in User Account!');
                        return redirect()->back();
                    }
        
                    try {
                        // FIXED: Removed ...$auth unpacking to prevent "Traversables" error
                        $key = env('RAZORPAY_KEY');
                        $secret = env('RAZORPAY_SECRET');
        
                        // 1. Create Contact
                        $contactResponse = Http::withBasicAuth($key, $secret)->post('https://api.razorpay.com/v1/contacts', [
                            "name" => $PaymentRequest->user->first . ' ' . $PaymentRequest->user->last,
                            "email" => $PaymentRequest->user->email,
                            "contact" => $PaymentRequest->user->phone,
                            "type" => "vendor",
                            "reference_id" => "USER_" . $PaymentRequest->user->id,
                        ]);
        
                        if (!$contactResponse->successful()) throw new \Exception("Contact Creation Failed: " . $contactResponse->body());
                        $contactId = $contactResponse->json()['id'];
        
                        // 2. Create Fund Account
                        // FIX: Ensure $PaymentRequest->bank->name is actually populated
                        $fundResponse = Http::withBasicAuth($key, $secret)->post('https://api.razorpay.com/v1/fund_accounts', [
                            "contact_id" => $contactId,
                            "account_type" => "bank_account",
                            "bank_account" => [
                                "name" => $PaymentRequest->bank->account_holder_name ?? ($PaymentRequest->user->first . ' ' . $PaymentRequest->user->last),
                                "ifsc" => $PaymentRequest->bank->ifsc_code,
                                "account_number" => $PaymentRequest->bank->account_number,
                            ]
                        ]);
        
                        if (!$fundResponse->successful()) throw new \Exception("Fund Account Failed: " . $fundResponse->body());
                        $fundAccountId = $fundResponse->json()['id'];
        
                        // 3. Create Payout
                        $payoutResponse = Http::withBasicAuth($key, $secret)->post('https://api.razorpay.com/v1/payouts', [
                            "account_number" => env('RAZORPAY_X_ACCOUNT_NUMBER'),
                            "fund_account_id" => $fundAccountId,
                            "amount" => $PaymentRequest->amount, // we have already stored in paisas
                            "currency" => "INR",
                            "mode" => "IMPS",
                            "purpose" => "payout",
                            "queue_if_low_balance" => true,
                            "reference_id" => "REQ_" . $PaymentRequest->id,
                        ]);
        
                        if ($payoutResponse->successful()) {
                            $PaymentRequest->update([
                                'status' => 'processing',
                                'payout_id' => $payoutResponse->json()['id'],
                                'admin_note' => $request->admin_note
                            ]);
                            session()->flash('success', 'Payout initiated! Bank confirmation pending.');
                            return redirect()->route('admin.manage_payment_requests');
                        } else {
                            throw new \Exception('Razorpay Payout Error: ' . ($payoutResponse->json()['error']['description'] ?? 'Unknown Error'));
                        }
        
                    } catch (\Exception $e) {
                        session()->flash('error', $e->getMessage());
                        return redirect()->back();
                    }
                } 
                
                // Handle Other Statuses (Rejected, Pending, etc.)
                $PaymentRequest->status = $request->status;
                $PaymentRequest->admin_note = $request->admin_note;
                $PaymentRequest->save();
        
                session()->flash('success', 'Request updated successfully.');
                return redirect()->route('admin.manage_payment_requests');
        
            } else {
                $id = Crypt::decrypt($request->paymentrequest);
                $paymentRequest = PaymentRequest::with(['user', 'bank'])->findOrFail($id);
                $paymentRequest->encrypted_id = $request->paymentrequest;
                return view('admin.payment_request-ops', ["paymentRequest" => $paymentRequest, "currentPage" => "manage_payment_requests"]);
            }
        }

    
     
         
    public function paymentRequests(){
         $payments = PaymentRequest::select('id', 'amount', 'status','user_id')->with('user:id,username')->get();
        foreach ($payments as $payment) {
            $payment->encrypted_id = Crypt::encrypt($payment->id);
        }

        $model = Crypt::encrypt('PaymentRequest');
        $currentPage = "manage_payment_requests";
        return view('admin.manage_payment_requests', ['paymentRequestData' => $payments, 'model' => $model, "currentPage" => $currentPage]);
    }
}
