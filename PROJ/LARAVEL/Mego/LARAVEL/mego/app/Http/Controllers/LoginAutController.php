<?php

namespace App\Http\Controllers;

//added
use View;
use Session;
use Request;
use Redirect;

//model
use App\Http\Model\Users;


class LoginAutController extends Controller
{
	public function index()
	{
		if(Session::has('user_id')){
			return redirect('/dashboard');
		}
		else {
			return View::make('login');
		}
	}
	
	public function auth(){
		$email = Request::input('user-id');
		$password = Request::input('user-pw');

		$ctr = Users::where('email', $email)->where('password', $password)->count();
		
		if($ctr >= 1){
			$data = Users::where('email', $email)->where('password', $password)->first();
			Session(['user_id' => $data['email']]);
			Session(['fname' => $data['fname']]);
			return Redirect('/dashboard');
		}
		else {
			$array = ['Incorrect Username or Password!'];
			return Redirect::to('/')->withErrors($array);
		}
	}
	
	public function logout(){
		Session()->forget('user_id');
		Session()->forget('fname');
		Session()->flush();
		return redirect('/');
	}
	
	public function register_get(){
		return View::make('register');
	}
	
	public function register_post(){
		$email = Request::input('user-id');
		$password = Request::input('user-pw');
		$password2 = Request::input('user-pw2');
		$fname = Request::input('fname');
		$lname = Request::input('lname');
		$gender = Request::input('gender');
		$data = Request::all();
		$array = array();
		
		if(strlen($email) < 5){
			$array['email'] = "Invalid email address!";
		}
		if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
			$array['email'] = "Invalid email address!";
		}
		if(strlen($password) < 5){
			$array['password'] = "Please enter atleast 3 characters!";
		}
		if($password != $password2){
			$array['password2'] = "Confirm password not matched!";
		}
		if(strlen($fname) < 1){
			$array['fname'] = "Please specify your first name!";
		}
		if(strlen($lname) < 1){
			$array['lname'] = "Please specify your last name!";
		}
		if(strlen($gender) < 1){
			$array['fname'] = "Please select your gender!";
		}
		
		$ctr = Users::where('email', $email)->count();
		if($ctr >= 1){
			$array['email'] = "Your email address already exist!";
		}
		
		
		if(count($array) >= 1){
			return View::make('register')->with('data', $data)->withErrors($array);
		}
		else {
			
			$user_data = new Users;
			$user_data->email = $email;
			$user_data->fname = $fname;
			$user_data->lname = $lname;
			$user_data->password = $password;
			$user_data->gender = $gender;
			$user_data->save();
			
			$data = Users::where('email', $email)->first();
			
			return View::make('register_success')->with('data', $data);
		}
	}
	
	
	
}
