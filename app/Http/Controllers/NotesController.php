<?php

namespace App\Http\Controllers;

use App\Card;
use App\Note;
use Illuminate\Http\Request;

use App\Http\Requests;

class NotesController extends Controller
{
    public function store(Request $request, Card $card) {
    	/* Options to save a new record in the database*/

    	// $note = new Note;
    	// $note->body = $request->body;
    	// $card->notes()->save($note);
    	/* ============== OR ==============*/
    	// $note = new Note(['body' => $request->body]);
    	// $card->notes()->save($note);
    	/* ============== OR ==============*/
    	// $card->notes()->save(
    	// 	new Note(['body' => $request->body])
    	// );
    	/* ============== OR ==============*/
    	// $card->notes()->create([
    	// 	'body' => $request->body
    	// ]);
    	/* ============== OR ==============*/
    	// $card->notes()->create($request->all());
    	/* ============== OR ==============*/

    	$this->validate($request, [
    		'body' => 'required|min:10'
    	]);

    	$note = new Note($request->all());

    	$card->addNote($note, 1); // The 1 is the user_id that was currently logged in

    	return back();
    }

    public function edit(Note $note) {
    	return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note) {

    	$note->update($request->all());
    	
    	return back();
    }


}
