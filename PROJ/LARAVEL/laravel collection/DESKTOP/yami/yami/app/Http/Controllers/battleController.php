<?php

namespace App\Http\Controllers;

//added
use View;
use Session;
use Request;
use Redirect;

//model
//use App\Http\Model\chatboxModel;

class battleController extends Controller
{
	public function index(){
		return View::make('battle');
	}
}
