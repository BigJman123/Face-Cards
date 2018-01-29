<?php

namespace App\Http\Controllers;
use App\Cards;

use Illuminate\Http\Request;
use Session;

class PlayController extends Controller
{
    public function index()
    {
        // If the session doesn't have any answers then set answers and the answers variable to an empty array
        // Else set the answers variable to Session::get('answers')
        if (! Session::has('answers')) {
            Session::put('answers', []);
            $answers = [];
        } else {
            $answers = Session::get('answers');
        }
        

        // This sets the $count variable to count($answers)
        // count($answers) gets the number of answers in the session
        $count = count($answers);

        // If $count is greater than or equel to 10 then redirect to the results page
        if ($count >= 10) {
            // Session::flush();
            // return $answers;
            return redirect('results');
        }

        // $possible is getting the range between 1 and however
        // many cards there are and randomly picks 4 from that range
    	$possible = array_rand(array_flip(range(1, Cards::count())),4);

        // $id is getting the id of one of the four random cards from $possible
    	$id = $possible[array_rand($possible)];

        // $card is setting id to the 4 randomly chosen cards from $possible and getting them
        $cards = Cards::whereIn('id', $possible)->get();

        // $selected is getting the card associated with the id from $id
        $selected = Cards::find($id);

        // returns the game view and also passes through the selected, cards, possible, id, and count variables.
        return view('layouts.game', compact('selected', 'cards', 'possible', 'id', 'count'));    
    }
}
