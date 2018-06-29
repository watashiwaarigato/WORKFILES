<?php

namespace App\Http\Controllers;

//added
use View;
use Session;
use Request;
use Redirect;

//model
use App\Http\Model\usersModel;
use App\Http\Model\deckModel;

class loginController extends Controller
{
	public function index(){
		if(Session::has('user_id')){
			return redirect('/home');
		}
		else {
			return View::make('login');
		}
	}
	public function auth(){
		$username = Request::input('username');
		$password = Request::input('password');
		
		$ctr = usersModel::where('username', $username)->where('password', $password)->count();

		if($ctr >= 1){
			$data = usersModel::where('username', $username)->where('password', $password)->first();
			Session(['user_id' => $data['id']]);
			Session(['user_name' => $data['username']]);
			return Redirect('/home');
		}
		else {
			$array = ['Incorrect Username or Password!'];
			return Redirect::to('/')->withErrors($array);
		}
	}
	
	public function home(){
		$user_id = session('user_id');
		$user_name = session('user_name');
		$data = deckModel::where('user_id', $user_id)->groupBy('deck_name')->get();
		
		$i = 0;
		foreach ($data as $deck) {
			$ctr[$i] = deckModel::where('deck_name', $deck['deck_name'])->where('user_id', $deck['user_id'])->count();
			$i++;
		}
		
		//location
		$user_ctr = usersModel::where('username', $user_name)->count();
		if($user_ctr >= 1){
			$user_data = usersModel::where('username', $user_name)->first();
			$user_data->loc = "/home";
			$user_data->save();
		}
	
		return View::make('home', compact('data','user_name','ctr'));
	}
	
	public function logout(){
		//forget 1 session
		Session()->forget('user_id');
		//forget all sessions
		Session()->flush();

		return redirect('/');
	}
}
