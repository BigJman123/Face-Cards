<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Attempt;

class AttemptController extends Controller
{
    public function store (Request $request, Card $card)
    {
    	
    	// make a new attempt or increment it by one

    	//  look up an attempt for this card and user

    	$attempt = Attempt::where('user_id', auth()->user()->id)->where('card_id', $card->id)->get();

    	if (is_null($attempt)) {
    		// create a new attempt
    		$attempt = Attempt::create([
				'user_id' => auth()->user()->id,
				'card_id' => $card->id,
				'attempts' => 1,
				'times_correct' => 1,
				'correct_streak' => 1,
    		]);
    	} else {
    		// update the record
    			// increment the attempts
    			// increment times correct
    			// increment correct_streak
    			// check to see if proficient
    		$attempt->increment('attempts');
    		// check to see if correct

    			// if yes
    			$attempt->increment('times_correct');
    			$attempt->increment('correct_streak');

    			// if no
    			$attempt->update(['correct_streak' => 0]);

			// check to see if proficient

    			// get a fresh version from the database
    			$attempt->fresh();

    			// compare to rule
    				// have they previously been marked proficient?
    				// did they get it right 5 times in a row?
    			if (is_null($attempt->proficient_at) && $attempt->correct_streak >= 5) {
    				$attempt->update(['proficient_at' => now()]);
    			}
    	}

    	return response()->json('good job');
    }
}
