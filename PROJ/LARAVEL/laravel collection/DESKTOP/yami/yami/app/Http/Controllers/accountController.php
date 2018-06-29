<?php

namespace App\Http\Controllers;

//added
use View;
use Session;
use Request;
use Redirect;
use File;

use Illuminate\Support\Facades\Input;

//model
use App\Http\Model\usersModel;

class accountController extends Controller
{
	public function index(){
		$user_id = session('user_id');
		$data = usersModel::where('id', $user_id)->first();

		return View::make('account')->with('data', $data);
	}
	
	public function save_pic(){
		$user_id = session('user_id');
		$username = session('user_name');
		$destinationPath = '';
		$filename = '';
		
		if (Input::hasFile('file')) {
			$file = Input::file('file');
			$destinationPath = 'public/common/uploads/'.$user_id."/";
			$success = File::cleanDirectory($destinationPath);
			$filename = str_random(6) . '_' . $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
		}
		
		
		$user_ctr = usersModel::where('username', $username)->count();
		if($user_ctr >= 1){
			$user_data = usersModel::where('username', $username)->first();
			$user_data->avatar = "/".$destinationPath.$filename;
			$user_data->save();
		}
		
		$data = usersModel::where('id', $user_id)->first();
		return View::make('account')->with('data', $data);
	}
	
	public function change_name(){
		$user_id = session('user_id');
		$chatname = Request::input('chatname');
		$user_data = usersModel::where('id', $user_id)->first();
		$user_data->nickname = $chatname;
		$user_data->save();
		
		$data = usersModel::where('id', $user_id)->first();
		return View::make('account')->with('data', $data);
	}
}
