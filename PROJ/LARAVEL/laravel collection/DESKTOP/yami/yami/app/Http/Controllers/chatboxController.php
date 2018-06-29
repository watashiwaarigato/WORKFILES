<?php

namespace App\Http\Controllers;

//added
use View;
use Session;
use Request;
use Redirect;
use Carbon;

//model
use App\Http\Model\chatboxModel;
use App\Http\Model\usersModel;

class chatboxController extends Controller
{
	public function index(){
		
		$user_id = session('user_id');
		$user_name = session('user_name');
		$msg = Request::input('msg');
		$last_id = Request::input('last_id');
		$room_id = Request::input('room_id');

		$mytime = Carbon\Carbon::now('Asia/Manila');
		$post_time = $mytime->toTimeString();

		if($msg != ""){
			
			$user_pic_ctr = usersModel::where('username', $user_name)->count();
			if($user_pic_ctr >= 1){
				$user_pic = usersModel::where('username', $user_name)->first();
				$avatar = $user_pic->avatar;
			}
			
			$data = new chatboxModel;
			$data->user_id = $user_id;
			$data->room_id = $room_id;
			$data->user_name = $user_name;
			$data->msg = $msg;
			$data->post_time = $post_time;
			$data->avatar = $avatar;
			$data->save();
		}
		
		//location / idle
		$user_ctr = usersModel::where('username', $user_name)->count();
		if($user_ctr >= 1){
			$current = $mytime->format('Y-m-d h:i:s');
			$user_data = usersModel::where('username', $user_name)->first();
			$user_data->loc = "/room/$room_id";
			$user_data->idle = $current;
			$user_data->save();
		}
		
		$chatmsg = chatboxModel::where('room_id', $room_id)
			->where('id','>', $last_id)
			->orderBy('id', 'asc')
			->get();
		
		$content = "";
		foreach ($chatmsg as $msg){
			if($msg->user_name != ''){
				
				$userpic = usersModel::where('id', $msg->user_id)->first();
				if($userpic->avatar == ''){
					$avatar = "<img src='/common/images/pic_default.png'>";
				}
				else {
					$avatar = "<img src='$userpic->avatar'>";
				}
				
				$chatname = $userpic->nickname;
				
				if($msg->user_name == session('user_name')){
					$who = "chatmine";
					$script = "";
				}
				else {
					$who = "chatothers";
					$script = "<script>
						newMsg = 'Continue';
						refreshTitle();
					</script>";
				}
				
				$postmsg = htmlentities($msg->msg);

				$content = $content."<li id='$msg->id'>
					<div class='tbl'>
						<div class='cell pr05 avatar'>
							<div class='pic'>
								$avatar
							</div>
							<div class='name'>
								$chatname
							</div>
						</div>
						<div class='cell'>
							<div class='$who'>
								<div class='msg'>$postmsg</div>
								<div class='time'>$msg->post_time</div>
							</div>
						</div>
					</div>
				</li>$script";
			}
		}
		
		return $content;
	}
	
	public function prev_item(){
		$user_name = session('user_name');
		$last_id = Request::input('last_id');
		$room_id = Request::input('room_id');
		$cache_item = Request::input('cache_item');

		$last_id = $last_id - $cache_item;
		$end_id = $last_id - 2;

		$content = "";

		for($i=$end_id; $i<=$last_id; $i++){
			$chatmsg_ctr = chatboxModel::where('room_id', $room_id)->where('id', $i)->count();
			if($chatmsg_ctr >= 1){
				$msg = chatboxModel::where('room_id', $room_id)->where('id', $i)->first();

				$userpic = usersModel::where('id', $msg->user_id)->first();
				if($userpic->avatar == ''){
					$avatar = "<img src='/common/images/pic_default.png'>";
				}
				else {
					$avatar = "<img src='$userpic->avatar'>";
				}

				$chatname = $userpic->nickname;

				if($msg->user_name == session('user_name')){ $who = "chatmine"; }
				else { $who = "chatothers"; }


				$postmsg = htmlentities($msg->msg);

				$content = $content."<li id='$msg->id' class='prev'>
					<div class='tbl'>
						<div class='cell pr05 avatar'>
							<div class='pic'>
								$avatar
							</div>
							<div class='name'>
								$chatname
							</div>
						</div>
						<div class='cell'>
							<div class='$who'>
								<div class='msg'>$postmsg</div>
								<div class='time'>$msg->post_time</div>
							</div>
						</div>
					</div>
				</li>";

			}
		}
		return $content;
	}
	
	public function online(){
		$location = "/room/".Request::input('room_id');
		$online_list = "";
		
		//location / idle
		$user_ctr = usersModel::where('loc', $location)->count();
		if($user_ctr >= 1){
			$mytime = Carbon\Carbon::now('Asia/Manila');
			$current = $mytime->format('Y-m-d h:i:s');
			
			$user_data = usersModel::where('loc', $location)->get();
			
			foreach ($user_data as $users) {
				//$temp = $temp."-".date('h:i', strtotime($current) - strtotime($user_data->idle));
				$time = strtotime($current) - strtotime($users->idle);
				
				//8 mins
				if($time <= 480){
					
					if($users->avatar != ''){
						$avatar = $users->avatar;
					}
					else {
						$avatar = '/common/images/pic_default.png';
					}
					
					$online_list = $online_list."<li><p><img src='$avatar'></p><p>".$users->username." <span>($users->nickname)</span></p></li>";
				}
			}
			
			return $online_list;
		}
	}
}




