<?php

namespace App\Http\Controllers;

//added
use View;
use Session;
use Request;
use Redirect;

//model
use App\Http\Model\roomModel;
use App\Http\Model\chatboxModel;
use App\Http\Model\deckModel;

class roomController extends Controller
{
	public function index(){
	
		//last chat ID
		$last_id = '0';
		$ctr = chatboxModel::where('room_id', 'global')->orderBy('id', 'desc')->count();
		if($ctr != ""){
			$data = chatboxModel::where('room_id', 'global')->orderBy('id', 'desc')->first();
			$last_id = $data->id;
		}
		
		//my deck list
		$user_id = session('user_id');
		$user_name = session('user_name');
		$deck_data = deckModel::where('user_id', $user_id)->groupBy('deck_name')->get();
		
		
		//delete room created
		$user_name = session('user_name');
		roomModel::where('p1_username', $user_name)->delete();

		//leave joined room
		$room_data = roomModel::where('p2_username', $user_name)->first();
		$room_ctr = roomModel::where('p2_username', $user_name)->count();
		if($room_ctr >= 1){
			$room_data->p2_username = '';
			$room_data->p2_deck = '';
			$room_data->save();
		}
		

		return View::make('room', compact('last_id','deck_data'));
	}
	
	public function create(){
		
		$user_id = session('user_id');
		$user_name = session('user_name');
		$deck = Request::input('deck');
		$password = Request::input('password');
		
		//delete
		roomModel::where('p1_username', $user_name)->delete();
		
		$data = new roomModel;
		$data->password = $password;
		$data->p1_username = $user_name;
		$data->p1_deck = $deck;
		$data->save();
		
		//get data
		$room_data = roomModel::where('p1_username', $user_name)->first();
		$room_id = $room_data->id;
		
		//last chat ID
		$last_id = '0';
		$ctr = chatboxModel::where('room_id', $room_id)->orderBy('id', 'desc')->count();
		if($ctr != ""){
			$data = chatboxModel::where('room_id', $room_id)->orderBy('id', 'desc')->first();
			$last_id = $data->id;
		}
		
		return View::make('room_create', compact('room_data','last_id'));
		
	}
	
	public function check_player2($room_id){
		$room_ctr = roomModel::where('id', $room_id)->count();
		
		if($room_ctr >= 1){
			$room_data = roomModel::where('id', $room_id)->first();
			$p2 = $room_data->p2_username;
			
			if($room_data->game_status == "started"){
				return "<script>game_started('$room_id','2000');</script>";
			}
			else {
				return $p2;
			}
			
		}
		else {
			return "<script>location='/room'</script>";
		}
		
	}
	
	public function create_status($room_id){
		
		$room_ctr = roomModel::where('id', $room_id)->count();
		if($room_ctr >= 1){
			$room_data = roomModel::where('id', $room_id)->first();
			$room_data->game_status = 'started';
			$room_data->save();
			
			return 'started';
		}
		else {
			return "<script>location='/room'</script>";
		}
		
	}
	
	public function leave(){
		$user_name = session('user_name');
		
		//delete room created
		roomModel::where('p1_username', $user_name)->delete();

		//leave joined room
		$room_data = roomModel::where('p2_username', $user_name)->first();
		$room_ctr = roomModel::where('p2_username', $user_name)->count();
		if($room_ctr >= 1){
			$room_data->p2_username = '';
			$room_data->p2_deck = '';
			$room_data->save();
		}
		
		return Redirect('/room');
	}
	
	public function get_created_room(){
		$room_data = roomModel::where('game_status', '')->get();
		
		$data = "";
		foreach ($room_data as $row) {
			if($row->p2_username == ""){
				$btn = "<input type='button' value='Join' class='btn btn-primary btnjoin' data-toggle='modal' data-target='#myModal' onclick='get_join_room_id($row->id)'>";
			}
			else {
				$btn = "<input type='button' value='Join' class='btn btn-primary' disabled='disabled'>";
			}
			
			$data = $data."<tr>
			<td>$row->p1_username</td>
			<td>$row->p2_username</td>
			<td>$btn</td>
			</tr>";
		}
		
		return $data;
	}
	
	public function join_room(){
		$user_name = session('user_name');
		$room_id = Request::input('join_room_id');
		$deck = Request::input('deck');
		$password = Request::input('password');
		
		$room_ctr = roomModel::where('id', $room_id)->count();
		if($room_ctr >= 1){
			$room_data1 = roomModel::where('id', $room_id)->first();
			
			if($password != $room_data1->password){
				return Redirect::to('/room')->withErrors(['Incorrect Password!']);
			}
			
			if($room_data1->p2_username != ""){
				if($room_data1->p2_username != $user_name){
					return Redirect::to('/room')->withErrors(['Room is Full!']);
				}
			}
			
			$room_data1->p2_username = $user_name;
			$room_data1->p2_deck = $deck;
			$room_data1->save();
			
			
			
			
			$user_id = session('user_id');
			$user_name = session('user_name');

			//get data
			$room_data = roomModel::where('p2_username', $user_name)->first();
			$room_id = $room_data->id;

			//last chat ID
			$last_id = '0';
			$ctr = chatboxModel::where('room_id', $room_id)->orderBy('id', 'desc')->count();
			if($ctr != ""){
				$data = chatboxModel::where('room_id', $room_id)->orderBy('id', 'desc')->first();
				$last_id = $data->id;
			}

			return View::make('room_create', compact('room_data','last_id'));
			
			
		}
		
	}
	
}
