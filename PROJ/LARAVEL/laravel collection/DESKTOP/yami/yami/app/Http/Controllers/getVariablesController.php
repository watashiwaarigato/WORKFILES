<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

//added
use View;
use Session;
use Request;
use Redirect;
use Validator;

//model
use App\Http\Model\cardsModel;
use App\Http\Model\deckModel;

class getVariablesController extends Controller
{
	public function index()
	{
		$data = cardsModel::orderBy('id', 'asc')->get();
		return View::make('get_variables')->with('cards_list', $data);
	}
	public function deck($deck_name, $user_id){
		$data = deckModel::where('user_id', $user_id)->where('deck_name', $deck_name)->get();
		return View::make('get_deck')->with('cards_list', $data);
	}
}
