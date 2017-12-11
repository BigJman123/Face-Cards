<?php

namespace App\Http\Controllers;

use App\Cards;

class CardsController extends Controller
{
    public function index()
    {
        return view('layouts.index');
    }
}
