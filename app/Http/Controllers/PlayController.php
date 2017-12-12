<?php

namespace App\Http\Controllers;
use App\Cards;

use Illuminate\Http\Request;

class PlayController extends Controller
{
    public function index()
    {
    	$possible = array_rand(array_flip(range(1, Cards::count())),4);
    	$id = $possible[array_rand($possible)];

        $cards = Cards::whereIn('id', $possible)->get();
        $selected = Cards::find($id);

        return view('layouts.game', compact('selected', 'cards', 'possible', 'id'));    
    }
}
