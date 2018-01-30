<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cards;
use App\Attempt;
use Session;

class AttemptController extends Controller
{
    public function store (Request $request, Cards $card)
    {
        $this->validate($request, ['answer' => 'required|boolean']);
        
    	//  look up an attempt for this card and user
        $attempt = $this->createOrUpdateAttempt($card);

        $this->updateAttemptForCorrect($attempt, $request);

		$this->checkForProficiency($attempt);

        // Session info for the game
        $answers = Session::get('answers');
        $answers[] = $request->answer;
        Session::put('answers', $answers);

    	// return response()->json('good job');
    }

    private function createOrUpdateAttempt(Cards $card)
    {
        $attempt = Attempt::where('user_id', auth()->user()->id)->where('card_id', $card->id)->first();

        if (empty($attempt)) {  
            // create a new attempt
            $attempt = Attempt::create([
                'user_id' => auth()->user()->id,
                'card_id' => $card->id,
                'attempts' => 1,
                'times_correct' => 0,
                'correct_streak' => 0,
            ]);

        } else {
            // update the record
            $attempt->increment('attempts');
            $attempt->save();
        }

        return $attempt;
    }

    private function updateAttemptForCorrect(Attempt $attempt, $request)
    {
        // check to see if correct
        if ($request->answer === 1) {
            // if yes
            // increment times correct
            $attempt->increment('times_correct');
            // increment correct_streak
            $attempt->increment('correct_streak');
            // check to see if proficient
        } else {
            // if no
            $attempt->update(['correct_streak' => 0]);
        }
    }

    private function checkForProficiency(Attempt $attempt)
    {
        // get a fresh version from the database
        $attempt->fresh();

        // compare to rule
            // have they previously been marked proficient?
            // did they get it right 5 times in a row?
        if (is_null($attempt->proficient_at) && $attempt->correct_streak >= 5) {    
            $attempt->update(['proficient_at' => now()]);
        }
    }
}
