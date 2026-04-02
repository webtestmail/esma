<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankAccount;

class WalletController extends Controller
{
    public function wallet_bank_accounts_store(Request $request){
        $request->validate([
        'bank_name' => 'required|string',
        'account_number' => 'required|numeric|unique:bank_accounts,account_number',
        'ifsc' => 'required|string',
    ]);
    $bank = new BankAccount();
    $bank->user_id = auth()->id();
    $bank->bank_name = $request->bank_name;
    $bank->account_holder_name = $request->holder_name;
    $bank->account_number = $request->account_number;
    $bank->ifsc_code = $request->ifsc;
    $bank->save();

    return response()->json(['success' => true]);
    }
}
