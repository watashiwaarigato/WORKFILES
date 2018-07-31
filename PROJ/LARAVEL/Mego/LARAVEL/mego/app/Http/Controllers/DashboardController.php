<?php

namespace App\Http\Controllers;

//added
use View;

class DashboardController extends Controller
{
	public function index(){
		
		
		
		return View::make('dashboard');
	}
}
