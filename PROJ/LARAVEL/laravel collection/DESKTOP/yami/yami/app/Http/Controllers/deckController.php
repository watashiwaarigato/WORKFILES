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

class deckController extends Controller
{
	public function index()
	{
		$cards_list = cardsModel::orderBy('id', 'asc')->get();
		return View::make('deck', compact('cards_list'));
	}
	
	public function save()
	{
		$user_id = Request::input('user_id');
		$user_name = Request::input('user_name');
		$deck_name = Request::input('deck_name');
		$card = "";
		
		if($deck_name == ""){
			return 'title';
		}
		else {
			$ctr = deckModel::where('user_id', $user_id)->where('deck_name', $deck_name)->count();
			if($ctr >= 1){
				deckModel::where('user_id', $user_id)->where('deck_name', $deck_name)->delete();
			}
			
			for($i=0; $i<=50; $i++){
				$temp = 'deck.'.$i;
				$temp = Request::input($temp);
				if($temp != ""){
					$data = new deckModel;
					$data->user_id = $user_id;
					$data->username = $user_name;
					$data->deck_name = $deck_name;
					$data->card_id = $temp;
					$data->save();
				}
			}
			return 'saved';
			
		}
	}
	
	public function edit($deck_name){
		$user_id = session('user_id');
		$user_name = session('user_name');
		
		$cards_list = cardsModel::orderBy('id', 'asc')->get();
		return View::make('deck', compact('cards_list','deck_name'));
	}
	
	public function delete($deck_name){
		$user_id = session('user_id');
		$user_name = session('user_name');

		deckModel::where('user_id', $user_id)->where('deck_name', $deck_name)->delete();
		return redirect('/home');
	}

}
