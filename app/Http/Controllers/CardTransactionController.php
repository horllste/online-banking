<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\CardTransaction;
use App\Models\Card;
use Auth;


class CardTransactionController extends Controller
{
    //

    public function show(Request $request, $id){
        
        $card = Card::where('id', $id)
        ->where('user_id', Auth::id())
        ->first();

        

        if(!empty($card)){

            $cardTransactions = CardTransaction::with('card.card_type','card.currency')
            ->where('user_id',Auth::id())
            ->where('card_id',$id)
            ->paginate(20);

            return view('pages.card_transactions', compact('cardTransactions'));

        }else{

            return redirect()->route('cards')->with('error', 'Card Can\'t Be Found. Please Try Again.');    

        }

    }





}
