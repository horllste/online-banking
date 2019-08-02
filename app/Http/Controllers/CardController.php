<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Card;

class CardController extends Controller
{
    
    public function index(Request $request){
        $cards = Card::with('currency','card_type')
        ->where('user_id',Auth::id())->paginate(10);
        return view('pages.cards', compact('cards'));
    }

}
