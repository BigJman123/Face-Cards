<?php

namespace App\Http\Controllers;
use App\Cards;

use Illuminate\Http\Request;

class PlayController extends Controller
{
    public function index()
    {
    	// $possible = array_rand(range(0, Cards::count()), 4);
    	// $id = array_rand($possible);
    	
        $id = random_int(1, Cards::count());

        $card = Cards::all()->find($id);

        $name = Cards::pluck('name');


        return view('layouts.game', compact('card', 'name'));
    }
}
