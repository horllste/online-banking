<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Auth,DB;
use App\Models\BankTransaction;
USE Carbon\Carbon;



class BankAccountController extends Controller
{

    public function index(){
        
        $bankAccounts = BankAccount::withTrashed()->with('bank','bank_location')
        ->orderBy('id','DESC')
        ->where('user_id',Auth::id())->paginate(9);

        if(Auth::user()->can('view-all-accounts')){
            $bankAccounts = BankAccount::withTrashed()->with('bank','bank_location')
            ->orderBy('id','DESC')->paginate(9);
        }

        return view('pages.accounts', compact('bankAccounts'));

    }

    public function transactions(Request $request,$id){
        
        $bankAccount = BankAccount::with('bank_location.currency')->withTrashed()
        ->where('id',$id)
        ->where('user_id',Auth::id())
        ->first();

        if(Auth::user()->can('view-bank-transactions')){

            $bankAccount = BankAccount::with('bank_location.currency')->withTrashed()
            ->find($id);

        }


        if(!empty($bankAccount)){

            $bankTransactions = BankTransaction::where('user_id',Auth::id())
            ->where('bank_account_id',$id)
            ->orderBy('id','DESC')
            ->paginate(20);

            if(Auth::user()->can('view-bank-transactions')){

                $bankTransactions = BankTransaction::where('bank_account_id',$id)
                ->orderBy('id','DESC')
                ->paginate(20);

    
            }


            return view('pages.transactions', compact('bankAccount', 'bankTransactions'));

        }else{

            return redirect()->route('accounts')->with('error', 'Bank Account Transaction Can\'t Be Found. Please Try Again.');    

        }

    }


    public function all_transactions(Request $request){

        $bankTransactions = BankTransaction::with('bank_account','bank_account.bank','bank_account.bank_location')
        ->where('user_id',Auth::id())
        ->orderBy('id','DESC')
        ->paginate(20);

        if(Auth::user()->can('view-all-transactions')){

            $bankTransactions = BankTransaction::with('bank_account','bank_account.bank','bank_account.bank_location')
            ->orderBy('id','DESC')
            ->paginate(20);

        }

        
        
        return view('pages.all_transactions', compact('bankTransactions'));

    }


    function storeTransaction(Request $request){

        DB::beginTransaction();
        try{
            
            $bankAccount = BankAccount::withTrashed()->find($request->bank_account_id);

            if($request->type == "credit"){

                if($request->balance == "ledger_balance"){
                    $bankAccount->ledger_balance = $bankAccount->ledger_balance + $request->amount;
                }else{
                    $bankAccount->available_balance = $bankAccount->available_balance + $request->amount;
                }

            }else{

                if($request->balance == "ledger_balance"){
                    $bankAccount->ledger_balance = $bankAccount->ledger_balance - $request->amount;
                }else{
                    $bankAccount->available_balance = $bankAccount->available_balance - $request->amount;
                }

            }

            $bankAccount->save();

            $bankTransaction = new BankTransaction();
            $bankTransaction->transaction_code = $request->transaction_code;
            $bankTransaction->narration = $request->narration;
            $bankTransaction->amount = $request->amount;
            $bankTransaction->type = $request->type;
            $bankTransaction->bank_account_id = $request->bank_account_id;
            $bankTransaction->status = $request->status;
            $bankTransaction->user_id = $bankAccount->user_id;
            $bankTransaction->created_at = Carbon::parse($request->date);
            $bankTransaction->updated_at = Carbon::parse($request->date);
            $bankTransaction->save();

            DB::commit();
            
            return redirect()->route('account_history', $bankAccount->id)->with('success', 'Bank Transaction Addition Successfully.'); 

        }catch(\Exception $ex){

            DB::rollBack();
            return redirect()->route('account_history', $bankAccount->id)->with('error', 'Bank Transaction Addition Failed. Please Try Again Later'); 

        }

    
    }


}
