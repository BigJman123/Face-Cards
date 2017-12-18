<?php

namespace App\Http\Controllers;
use App\Cards;

use Illuminate\Http\Request;
use Session;

class PlayController extends Controller
{
    public function index()
    {
        if (! Session::has('answers')) {
            Session::put('answers', []);
            $answers = [];
        } else {
            $answers = Session::get('answers');
        }

        $count = count($answers);

        if ($count >= 10) {
            // Session::flush();
            return redirect('results');
        }

    	$possible = array_rand(array_flip(range(1, Cards::count())),4);
    	$id = $possible[array_rand($possible)];

        $cards = Cards::whereIn('id', $possible)->get();
        $selected = Cards::find($id);

        return view('layouts.game', compact('selected', 'cards', 'possible', 'id', 'count'));    
    }

    public function store(Request $request) 
    {
        $this->validate($request, ['answer' => 'required|boolean']);
        
        $answers = Session::get('answers');
        $answers[] = $request->answer;
        Session::put('answers', $answers);

        return $answers;
    }
}
