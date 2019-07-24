<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Auth;
use App\Models\BankTransaction;



class BankAccountController extends Controller
{

    public function index(){
        
        $bankAccounts = BankAccount::withTrashed()->with('bank','bank_location')
        ->orderBy('id','DESC')
        ->where('user_id',Auth::id())->paginate(9);

        return view('pages.customer.accounts', compact('bankAccounts'));

    }

    public function transactions(Request $request,$id){
        
        $bankAccount = BankAccount::with('bank_location.currency')->withTrashed()
        ->where('id',$id)
        ->where('user_id',Auth::id())
        ->first();

        if(!empty($bankAccount)){

            $bankTransactions = BankTransaction::where('user_id',Auth::id())
            ->where('bank_account_id',$id)
            ->orderBy('id','DESC')
            ->paginate(20);
            return view('pages.customer.transactions', compact('bankAccount', 'bankTransactions'));

        }else{

            return redirect()->route('accounts')->with('error', 'Bank Account Transaction Can\'t Be Found. Please Try Again.');    

        }

    }


    public function all_transactions(Request $request){

        $bankTransactions = BankTransaction::with('bank_account','bank_account.bank','bank_account.bank_location')
        ->where('user_id',Auth::id())
        ->orderBy('id','DESC')
        ->paginate(20);
        
        return view('pages.customer.all_transactions', compact('bankTransactions'));

    }

}
