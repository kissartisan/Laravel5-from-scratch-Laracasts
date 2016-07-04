<?php

namespace App\Http\Controllers;

use DB;
use App\Card;
use App\Http\Requests;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index() {
    	$cards = Card::all();

    	return view('cards.index', compact('cards'));
    }

    // Using route-model binding
    // variable $card should be equal to the value
    // in the routes.php {card}
    public function show(Card $card) { // Typehinting a card = route-model binding

    	// return $card;
    	// $card = Card::find($id);

        // Eager loading for notes and users table
        // $card = Card::with('notes.user')->find(1);
        $card->load('notes.user');


    	return view('cards.show', compact('card'));
    }
}
 