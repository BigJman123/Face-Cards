<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ResultsController extends Controller
{
    public function show() {
		$answers = Session::get('answers');

		$right = count(array_filter($answers));

		$total = count($answers);

    	Session::flush();

		return view('layouts.results', compact('answers', 'total', 'right'));

    }
}
